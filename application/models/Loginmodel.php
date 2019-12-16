<?php
Class Loginmodel extends CI_Model
{

  public function __construct()
  {
      parent::__construct();
		$this->load->model('mailmodel');
		$this->load->model('smsmodel');
  }

	function login($username,$password)
	{
		$chkUser = "SELECT * FROM edu_users WHERE user_name='$username' AND user_password='$password'";
		$res=$this->db->query($chkUser);
		if($res->num_rows()==1){
		   foreach($res->result() as $rows){
			   $status = $rows->status;
		   }
			if ($status = 'Active'){
				 $data = array("status"=>$rows->status,"user_name"  => $rows->user_name,"name"=>$rows->name, "pia_id" => $rows->pia_id,"user_type"=>$rows->user_type,"user_id"=>$rows->user_id,"user_pic"=>$rows->user_pic);
				 return $data;
			 } else {
				  $data= array("status" => "Inactive");
				  return $data;
			 }
		} else{
					  $data= array("status" => "Error");
					  return $data;
		} 
	}

	function getuser($user_id){
		$query="SELECT ep.*,eu.* From edu_users as eu left join edu_pia as ep on eu.user_master_id=ep.id AND eu.user_type='3' WHERE eu.user_id='$user_id'";
		$resultset=$this->db->query($query);
		return $resultset->result();
	}

	function getadminuser($user_id){
	   $query="SELECT
				es.*,
				eu.*
			FROM
				edu_users eu,
				edu_staff_details es
			WHERE
				eu.user_id = '$user_id' AND eu.user_master_id = es.id";
		 $resultset=$this->db->query($query);
		 return $resultset->result();
	}

	function password_update($new_password,$user_id){
		$pwd = md5($new_password);
		$query="UPDATE edu_users SET user_password='$pwd', updated_date=NOW() WHERE user_id='$user_id'";
		$ex = $this->db->query($query);
		
		if ($ex) {
		  $datas = array("status" => "success");
		} else {
		  $datas = array("status" => "failed");
		}
		 return $datas;
	}

       function profile_update($pia_name,$pia_phone,$pia_email,$pia_address,$pia_state,$pia_id,$user_id,$staff_prof_pic){
		
         $pia_id=base64_decode($pia_id)/98765;
		 $user_type=$this->session->userdata('user_type');
		 
         $query="UPDATE edu_pia SET pia_address='$pia_address',pia_state = '$pia_state',pia_name='$pia_name',pia_phone='$pia_phone',pia_email='$pia_email',profile_pic = '$staff_prof_pic' WHERE id='$pia_id'";
         $ex = $this->db->query($query);
		 
		 $update_user="UPDATE edu_users SET name='$pia_name',user_pic ='$staff_prof_pic' WHERE user_id='$user_id' AND user_type = '$user_type'";
		 $result_user=$this->db->query($update_user);

			 if ($result_user) {
				$data = array("status" => "success");
			} else {
				$data = array("status" => "failed");
			}
			return $data;
       }

       function checkemail_edit($email,$staff_id){
         $select="SELECT * FROM edu_pia Where pia_email='$email' AND id!='$staff_id'";
         $result=$this->db->query($select);
		 
         if($result->num_rows()>0){
				echo "false";
           }else{
				echo "true";
         }
       }
	   
       function checkmobile_edit($mobile,$staff_id){
		$select="SELECT * FROM edu_pia Where pia_phone='$mobile' AND id!='$staff_id'";
		$result=$this->db->query($select);
         if($result->num_rows()>0){
				echo "false";
           }else{
				echo "true";
         }
       }

       function check_password_match($old_password,$user_id){
         $pwd=md5($old_password);
         $select="SELECT * FROM edu_users Where user_password='$pwd' AND user_id='$user_id'";
         $result=$this->db->query($select);
           if($result->num_rows()==0){
				echo "false";
             }else{
				echo "true";
           }
       }

       function forgot_email($user_name){
		   
         $query="SELECT * FROM edu_users WHERE user_name='$user_name'";
         $result=$this->db->query($query);
         if($result->num_rows()>0){
			 foreach($result->result() as $row){
				 $name = $row->name;
				 $user_id = $row->user_id;
				 $user_type = $row->user_type;
				 $user_master_id = $row->user_master_id;
				}
				
			 $digits = 6;
			 $OTP = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
			 $reset_pwd = md5($OTP);
			 
			if ($user_type =='3'){
				
				$squery = "SELECT * FROM edu_pia WHERE id ='$user_master_id'";
				$results = $this->db->query($squery);
				if($results->num_rows()>0){
					foreach($results->result() as $rows){
						 $to_email = $rows->pia_email;
					}
				}
				 $reset="UPDATE edu_users SET user_password='$reset_pwd' WHERE user_type='3' AND user_id='$user_id'";
				 $result_pwd=$this->db->query($reset);
			} else {
				
				$squery = "SELECT * FROM edu_staff_details WHERE id ='$user_master_id'";
				$results = $this->db->query($squery);
				if($results->num_rows()>0){
					foreach($results->result() as $rows){
						 $to_email = $rows->email;
						 $to_phone = $rows->phone;
					}
				}
				 $reset="UPDATE edu_users SET user_password='$reset_pwd' WHERE user_type!='3' AND user_id='$user_id'";
				 $result_pwd=$this->db->query($reset);
			}			

			 $subject = 'M3 - Password Reset';
             $htmlContent = '<html>
               <head><title></title>
               </head>
               <body>
               <p>Hi  '.$name.'</p>
               <p>Your Account Password is Reset. Please Use Below Password to login</p>
			   <p>Password: '.$OTP.'</p>
			   <p></p>
			   <p><a href="'.base_url() .'">Click here to Login</a></p>
               </body>
               </html>';
			   
			$smsContent = 'Hi  '.$name.' Your Account Password is Reset. Please Use this '.$OTP.' to login';
			
			$this->mailmodel->sendEmail($to_email,$subject,$htmlContent);
			$this->smsmodel->sendSMS($to_phone,$smsContent);
			
			echo "success";
         }else{
			echo "error";
		 }
     }


		function piaDashboard($pia_id){
			
			$mob_count = "SELECT * FROM edu_staff_details WHERE pia_id = '$pia_id' AND role_type = '5'";
			$mob_count_res = $this->db->query($mob_count);
			$mobilizer_count = $mob_count_res->num_rows();
									
			$cen_count = "SELECT * FROM edu_center_master WHERE pia_id = '$pia_id'";
			$cen_count_res = $this->db->query($cen_count);
			$center_count = $cen_count_res->num_rows();
			
			$trad_count = "SELECT * FROM edu_trade WHERE pia_id = '$pia_id'";
			$trad_count_res = $this->db->query($trad_count);
			$trade_count = $trad_count_res->num_rows();
			
			$stu_count = "SELECT * FROM edu_student_prospects WHERE pia_id = '$pia_id'";
			$stu_count_res = $this->db->query($stu_count);
			$student_count = $stu_count_res->num_rows();
			
			$result  = array(
					"pia_id" => $pia_id,
					"mobilizer_count" => $mobilizer_count,
					"center_count" => $center_count,
					"student_count" => $student_count,
					"trade_count" => $trade_count,
				);
					
			return $result;
	}

	function dashMobilizer($pia_id){
		$select="SELECT e.user_id, e.name, (SELECT count(*) FROM edu_student_prospects d WHERE d.created_by = e.user_id) AS stud_count FROM edu_users e WHERE e.user_type = '5' AND e.pia_id = '$pia_id' ORDER BY stud_count DESC LIMIT 5";
		$result=$this->db->query($select);
		return $result->result();
	}
	
	function dashTasks($pia_id){
		$select="SELECT A.task_title, B.name, B.user_type, C.user_type_name FROM edu_task A, edu_users B, edu_role C WHERE A.user_id = B.user_id AND B.user_type=C.id AND A.pia_id = '$pia_id' ORDER BY A.id DESC LIMIT 5";
		$result=$this->db->query($select);
		return $result->result();
	}
	
	function dashTrades($pia_id){
		$select="SELECT * FROM `edu_trade` WHERE pia_id = '$pia_id' ORDER BY id DESC LIMIT 5";
		$result=$this->db->query($select);
		return $result->result();
	}
	
	function dashStudents($pia_id){
		$select="SELECT * FROM `edu_student_prospects` WHERE pia_id = '$pia_id' ORDER BY id DESC LIMIT 5";
		$result=$this->db->query($select);
		return $result->result();
	}
}
?>
