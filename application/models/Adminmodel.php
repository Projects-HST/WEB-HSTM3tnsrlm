<?php

Class Adminmodel extends CI_Model
{

public function __construct()
{
  parent::__construct();

}

	function mobilization_plan($user_id){
		$query="SELECT * FROM edu_mobilization_plan A, edu_users B  WHERE A.pia_id = B.user_id ORDER BY A.id desc";
		$res=$this->db->query($query);
		$result=$res->result();
		return $result;
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
	   
	function password_update($new_password,$user_id){
		$pwd=md5($new_password);
		$query="UPDATE edu_users SET user_password='$pwd',	updated_date=NOW() WHERE user_id='$user_id'";
		$ex=$this->db->query($query);
		if($ex){
			echo "success";
		}else{
			echo "failed";
		}
	}

     function checkemail($email){
		$select="SELECT * FROM edu_staff_details Where email='$email'";
		$result=$this->db->query($select);
		if($result->num_rows()>0){
			echo "false";
        }else{
			echo "true";
      }
    }

    function checkmobile($mobile){
		$select="SELECT * FROM edu_staff_details Where phone='$mobile'";
		$result=$this->db->query($select);
		if($result->num_rows()>0){
			echo "false";
        }else{
			echo "true";
      }
    }

	function create_staff_details($select_role,$name,$address,$email,$class_tutor,$mobile,$sec_phone,$sex,$dob,$nationality,$religion,$community_class,$community,$qualification,$status,$staff_prof_pic,$user_id){

      $select="SELECT * FROM edu_staff_details Where email='$email' AND phone='$mobile'";
       $result=$this->db->query($select);
       if($result->num_rows()>0){
         $data = array(
             "status" => "already"
         );
         return $data;
         }else{
           $insert="INSERT INTO edu_staff_details (role_type,name,sex,dob,nationality,religion,community_class,community,address,email,phone,sec_phone,profile_pic,trade_batch_id,qualification,status,created_by,created_at) VALUES('$select_role','$name','$sex','$dob','$nationality','$religion','$community_class','$community','$address','$email','$mobile','$sec_phone','$staff_prof_pic','$class_tutor','$qualification','$status','$user_id',NOW())";
            $result=$this->db->query($insert);
            $insert_id = $this->db->insert_id();
            $digits = 6;
        	$OTP = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
        	$md5pwd=md5($OTP);
            $user_name=$mobile;
            
            $user_table="INSERT INTO edu_users (name,user_name,user_password,user_type,user_master_id,created_date,status) VALUES('$name','$user_name','$md5pwd','$select_role','$insert_id',NOW(),'Active')";
              $result_user=$this->db->query($user_table);
              $to =$email;
              $subject ='"Welcome Message"';
              $htmlContent = '
              <html>
              <head>  <title></title>
              </head>
              <body style="background-color:beige;">
              <table cellspacing="0" style=" width: 300px; height: 200px;">
              <tr>
              <th>Email:</th><td>'.$email.'</td>
              </tr>
              <tr>
              <th>Username :</th><td>'.$user_name.'</td>
              </tr>
              <tr>
              <th>Password:</th><td>'.$OTP.'</td>
              </tr>
              <tr>
              <th></th><td><a href="'.base_url() .'">Click here  to Login</a></td>
              </tr>
              </table>
              </body>
              </html>';
              // Set content-type header for sending HTML email
              $headers = "MIME-Version: 1.0" . "\r\n";
              $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
              // Additional headers
              $headers .= 'From: info<info@tnsrlm.com>' . "\r\n";
              mail($to,$subject,$htmlContent,$headers);
            if ($result_user) {
                $data = array(
                    "status" => "success"
                );
                return $data;
            } else {
                $data = array(
                    "status" => "failed"
                );
                return $data;
            }
       }
    }

	function get_all_staff_details($user_id){
      $select="SELECT * FROM edu_staff_details WHERE role_type='2' ORDER BY id desc";
      $result=$this->db->query($select);
      return $result->result();
    }
	
	function get_staff_details_by_id($staff_id){
      $id=base64_decode($staff_id)/98765;
      $select="SELECT * FROM edu_staff_details WHERE id='$id'";
      $result=$this->db->query($select);
      return $result->result();
    }
	
	
    function checkemail_edit($email,$staff_id){
      $select="SELECT * FROM edu_staff_details Where email='$email' AND id!='$staff_id'";
      $result=$this->db->query($select);
      if($result->num_rows()>0){
			echo "false";
        }else{
			echo "true";
      }
    }
    function checkmobile_edit($mobile,$staff_id){
		$select="SELECT * FROM edu_staff_details Where phone='$mobile' AND id!='$staff_id'";
		$result=$this->db->query($select);
		if($result->num_rows()>0){
			echo "false";
        }else{
			echo "true";
      }
    }  

   function update_staff_details_id($select_role,$name,$address,$email,$class_tutor,$mobile,$sec_phone,$sex,$dob,$nationality,$religion,$community_class,$community,$qualification,$status,$staff_prof_pic,$user_id,$staff_id){

   
			$sQuery = "SELECT * FROM edu_staff_details WHERE id = '$staff_id'";
			$user_result = $this->db->query($sQuery);
			$ress = $user_result->result();
			if($user_result->num_rows()>0)
			{
				foreach ($user_result->result() as $rows)
				{
					$old_phone_number = $rows->phone;
				}
			}
			
		$update = "UPDATE edu_staff_details SET role_type='$select_role',name='$name',sex='$sex',address='$address',email='$email',trade_batch_id='$class_tutor',phone='$mobile',sec_phone='$sec_phone',dob='$dob',nationality='$nationality',religion='$religion',community_class='$community',community='$community',qualification='$qualification',status='$status',profile_pic='$staff_prof_pic',updated_at=NOW(),updated_by='$user_id' WHERE id='$staff_id'";
		$result=$this->db->query($update);
	  
		/* $update_user="UPDATE edu_users SET name='$name' WHERE user_master_id='$staff_id' AND user_type = '2'";
		$result_user=$this->db->query($update_user); */
		
		if ($old_phone_number != $mobile){
			$update_user="UPDATE edu_users SET user_name='$mobile',name='$name',status='$status' WHERE user_master_id='$staff_id' AND user_type = '2'";
			$result_user=$this->db->query($update_user);
		}else {
			$update_user="UPDATE edu_users SET name='$name',status='$status' WHERE user_master_id='$staff_id' AND user_type = '2'";
			$result_user=$this->db->query($update_user);
		}
		
		if ($result_user) {
		  $data = array(
			  "status" => "success"
		  );
		  return $data;
		} else {
		  $data = array(
			  "status" => "failed"
		  );
		  return $data;
		}

    }

     function checkuniquenumber($unique_number){
		$select="SELECT * FROM edu_pia Where pia_unique_number='$unique_number'";
		$result=$this->db->query($select);
		  if($result->num_rows()>0){
				echo "false";
			}else{
				echo "true";
		  }
    }  

	function create_pia_details($unique_number,$name,$mobile,$email,$address,$status,$staff_prof_pic,$user_id){

      $select="SELECT * FROM edu_pia Where pia_unique_number='$unique_number'";
       $result=$this->db->query($select);
       if($result->num_rows()>0){
         $data = array(
             "status" => "already"
         );
         return $data;
         }else{
           $insert="INSERT INTO edu_pia (pia_unique_number,pia_name,pia_address,pia_phone,pia_email,profile_pic,status,created_by,created_at) VALUES('$unique_number','$name','$address','$mobile','$email','$staff_prof_pic','$status','$user_id',NOW())";
            $result=$this->db->query($insert);
            $insert_id = $this->db->insert_id();
            $digits = 6;
        	$OTP = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
        	$md5pwd=md5($OTP);
            $user_name=$unique_number;
            
            $user_table="INSERT INTO edu_users (name,user_name,user_password,user_type,user_master_id,created_date,status) VALUES('$name','$user_name','$md5pwd','3','$insert_id',NOW(),'Active')";
              $result_user=$this->db->query($user_table);
              $to =$email;
              $subject ='"Welcome Message"';
              $htmlContent = '
              <html>
              <head>  <title></title>
              </head>
              <body style="background-color:beige;">
              <table cellspacing="0" style=" width: 300px; height: 200px;">
              <tr>
              <th>Email:</th><td>'.$email.'</td>
              </tr>
              <tr>
              <th>Username :</th><td>'.$user_name.'</td>
              </tr>
              <tr>
              <th>Password:</th><td>'.$OTP.'</td>
              </tr>
              <tr>
              <th></th><td><a href="'.base_url() .'">Click here  to Login</a></td>
              </tr>
              </table>
              </body>
              </html>';
              // Set content-type header for sending HTML email
              $headers = "MIME-Version: 1.0" . "\r\n";
              $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
              // Additional headers
              $headers .= 'From: info<info@tnsrlm.com>' . "\r\n";
             mail($to,$subject,$htmlContent,$headers);
            if ($result_user) {
                $data = array(
                    "status" => "success"
                );
                return $data;
            } else {
                $data = array(
                    "status" => "failed"
                );
                return $data;
            }
       }
    }

	function get_all_pia_details($user_id){
      $select="SELECT * FROM edu_pia A, edu_users B WHERE B.user_master_id = A.id AND B.user_type='3' ORDER BY id desc";
      $result=$this->db->query($select);
      return $result->result();
    }
	
	function get_pia_details_by_id($pia_id){
      $id=base64_decode($pia_id)/98765;
      $select="SELECT * FROM edu_pia WHERE id='$id'";
      $result=$this->db->query($select);
      return $result->result();
    }
	
	 function check_uniquenumber_edit($unique_number,$pia_id){
		$select="SELECT * FROM edu_pia Where pia_unique_number='$unique_number' AND id!='$pia_id'";
		$result=$this->db->query($select);
		if($result->num_rows()>0){
			echo "false";
        }else{
			echo "true";
      }
    }  
	
	function update_pia_details_id($unique_number,$name,$mobile,$email,$address,$status,$staff_prof_pic,$user_id,$pia_id){

			$sQuery = "SELECT * FROM edu_pia WHERE id = '$pia_id'";
			$user_result = $this->db->query($sQuery);
			$ress = $user_result->result();
			if($user_result->num_rows()>0)
			{
				foreach ($user_result->result() as $rows)
				{
					$old_unique_number = $rows->pia_unique_number;
				}
			}
	
	$update = "UPDATE edu_pia SET pia_unique_number='$unique_number',pia_name='$name',pia_email ='$email',pia_phone ='$mobile',pia_address ='$address',status='$status',profile_pic = '$staff_prof_pic', updated_at=NOW(),updated_by='$user_id' WHERE id='$pia_id'";
	$result=$this->db->query($update);
		
	if ($old_unique_number != $unique_number){
		$update_user="UPDATE edu_users SET user_name='$unique_number',name='$name',status='$status' WHERE user_master_id='$pia_id' AND user_type = '3'";
		$result_user=$this->db->query($update_user);
	}else {
		$update_user="UPDATE edu_users SET name='$name',status='$status' WHERE user_master_id='$pia_id' AND user_type = '3'";
		$result_user=$this->db->query($update_user);
	}
		if ($result_user) {
		  $data = array(
			  "status" => "success"
		  );
		  return $data;
		} else {
		  $data = array(
			  "status" => "failed"
		  );
		  return $data;
		}

    }

	function piaDashboard($pia_id){
			 $mob_count = "SELECT * FROM edu_staff_details WHERE pia_id = '$pia_id' AND role_type = '5'";
			$mob_count_res = $this->db->query($mob_count);
			$mobilizer_count = $mob_count_res->num_rows();
									
				$cen_count = "SELECT * FROM edu_center_master WHERE pia_id = '$pia_id'";
				$cen_count_res = $this->db->query($cen_count);
				$center_count = $cen_count_res->num_rows();
				
				$stu_count = "SELECT * FROM edu_student_prospects WHERE pia_id = '$pia_id'";
				$stu_count_res = $this->db->query($stu_count);
				$student_count = $mob_count_res->num_rows();
				
				$result_count  = array(
						"mobilizer_count" => $mobilizer_count,
						"center_count" => $center_count,
						"student_count" => $student_count
					);
			return $result_count;
	}
}
?>
