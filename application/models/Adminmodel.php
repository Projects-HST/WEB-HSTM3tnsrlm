<?php

Class Adminmodel extends CI_Model
{

public function __construct()
{
  parent::__construct();

}

	function adminDashboard(){
			
			$pia_count = "SELECT * FROM edu_users WHERE user_type = '3'";
			$pia_count_res = $this->db->query($pia_count);
			$pias_count = $pia_count_res->num_rows();
									
			$staff_count = "SELECT * FROM edu_users WHERE user_type = '2'";
			$staff_count_res = $this->db->query($staff_count);
			$staffs_count = $staff_count_res->num_rows();
			
			$mob_count = "SELECT * FROM edu_users WHERE user_type = '5'";
			$mob_count_res = $this->db->query($mob_count);
			$mobilizer_count = $mob_count_res->num_rows();
			
			$stu_count = "SELECT * FROM edu_student_prospects";
			$stu_count_res = $this->db->query($stu_count);
			$student_count = $stu_count_res->num_rows();
			
			$result  = array(
					"pia_count" => $pias_count,
					"staff_count" => $staffs_count,
					"mobilizer_count" => $mobilizer_count,
					"student_count" => $student_count
				);
					
			return $result;
	}
	
	
	
	function pia_list(){
      $select="SELECT * FROM edu_pia A, edu_users B WHERE B.user_master_id = A.id AND B.user_type='3' ORDER BY id desc LIMIT 5";
      $result=$this->db->query($select);
      return $result->result();
    }
	
	function mobilizer_list(){
		$select="SELECT
					esd.id,
						eu.pia_id,
						eu.name AS mob_name,
						es.name AS pia_name
					FROM
						edu_users AS eu
					LEFT JOIN edu_staff_details AS esd
					ON
						eu.user_master_id = esd.id
					LEFT JOIN edu_users AS es
					ON
						es.user_id = esd.pia_id
					WHERE
						eu.status = 'Active' AND eu.user_type = 5 ORDER BY esd.id desc LIMIT 4";
		$result=$this->db->query($select);
		return $result->result();
    }
	
	function students_list(){
      $select="SELECT A.name as student_name, A.city, B.name as pia_name FROM edu_student_prospects A, edu_users B WHERE A.pia_id = B.user_id ORDER BY A.id desc LIMIT 5 ";
      $result=$this->db->query($select);
      return $result->result();
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
			$data = array("status" => "already");
			return $data;
		
		}else{
			$insert="INSERT INTO edu_staff_details (role_type,name,sex,dob,nationality,religion,community_class,community,address,email,phone,sec_phone,profile_pic,trade_batch_id,qualification,status,created_by,created_at) VALUES('$select_role','$name','$sex','$dob','$nationality','$religion','$community_class','$community','$address','$email','$mobile','$sec_phone','$staff_prof_pic','$class_tutor','$qualification','$status','$user_id',NOW())";
			$result=$this->db->query($insert);
			$insert_id = $this->db->insert_id();
			
			$digits = 6;
			$OTP = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
			$md5pwd=md5($OTP);
			$user_name=$mobile;

			$user_table="INSERT INTO edu_users (name,user_name,user_password,user_pic,user_type,user_master_id,created_date,status) VALUES('$name','$user_name','$md5pwd','$staff_prof_pic','$select_role','$insert_id',NOW(),'Active')";
			$result_user=$this->db->query($user_table);
	
			$subject ='M3 - Staff Login Details';
			$htmlContent = '<html>
							<head> <title></title>
							</head>
							<body>
							<p>Hi  '.$name.'</p>
							<p>Staff Login Details</p>
							<p>Username: '.$user_name.'</p>
							<p>Password: '.$OTP.'</p>
							<p></p>
							<p><a href="'.base_url() .'">Click here to Login</a></p>
							</body>
							</html>';
			// Set content-type header for sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			// Additional headers
			$headers .= 'From: info<info@happysanz.com>' . "\r\n";
			mail($email,$subject,$htmlContent,$headers);

			if ($result_user) {
				$data = array("status" => "success");
			} else {
				$data = array("status" => "failed");
			}
			return $data;
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
		
		if ($old_phone_number != $mobile){
			$update_user="UPDATE edu_users SET user_name='$mobile',name='$name',user_pic ='$staff_prof_pic',status='$status' WHERE user_master_id='$staff_id' AND user_type = '2'";
			$result_user=$this->db->query($update_user);
			
			$subject ='M3 - Staff Login - Username Updated';
			$htmlContent = '<html>
							<head> <title></title>
							</head>
							<body>
							<p>Hi  '.$name.'</p>
							<p>PIA Login Details</p>
							<p>Username: '.$mobile.'</p>
							<p></p>
							<p><a href="'.base_url() .'">Click here to Login</a></p>
							</body>
							</html>';
			// Set content-type header for sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			// Additional headers
			$headers .= 'From: info<info@happysanz.com>' . "\r\n";
			mail($email,$subject,$htmlContent,$headers);
			
		}else {
			 $update_user="UPDATE edu_users SET name='$name',user_pic ='$staff_prof_pic',status='$status' WHERE user_master_id='$staff_id' AND user_type = '2'";
			$result_user=$this->db->query($update_user);
		}

			if ($result_user) {
			  $data = array("status" => "success");
			} else {
			  $data = array("status" => "failed");
			}
			  return $data;
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

	function create_pia_details($unique_number,$name,$mobile,$email,$state,$address,$status,$staff_prof_pic,$user_id){

		$select = "SELECT * FROM edu_pia Where pia_unique_number='$unique_number'";
		$result=$this->db->query($select);
		if($result->num_rows()>0){
			$data = array("status" => "already");
			return $data;
		}else{
			$insert="INSERT INTO edu_pia (pia_unique_number,pia_name,pia_address,pia_phone,pia_email,pia_state,profile_pic,status,created_by,created_at) VALUES('$unique_number','$name','$address','$mobile','$email','$state','$staff_prof_pic','$status','$user_id',NOW())";
			$result=$this->db->query($insert);
			$insert_id = $this->db->insert_id();

			$digits = 6;
			$OTP = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
			$md5pwd=md5($OTP);
			$user_name=$unique_number;

			$user_table = "INSERT INTO edu_users (name,user_name,user_password,user_pic,user_type,user_master_id,created_date,status) VALUES('$name','$user_name','$md5pwd','$staff_prof_pic','3','$insert_id',NOW(),'Active')";
			$result_user=$this->db->query($user_table);


			$subject ='M3 - PIA Login Details';
			$htmlContent = '<html>
							<head> <title></title>
							</head>
							<body>
							<p>Hi  '.$name.'</p>
							<p>PIA Login Details</p>
							<p>Username: '.$user_name.'</p>
							<p>Password: '.$OTP.'</p>
							<p></p>
							<p><a href="'.base_url() .'">Click here to Login</a></p>
							</body>
							</html>';
			// Set content-type header for sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			// Additional headers
			$headers .= 'From: info<info@happysanz.com>' . "\r\n";
			mail($email,$subject,$htmlContent,$headers);

			if ($result_user) {
			$data = array("status" => "success");
			} else {
			$data = array("status" => "failed");
			}
			return $data;
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
	
	function update_pia_details_id($unique_number,$name,$mobile,$email,$state,$address,$status,$staff_prof_pic,$user_id,$pia_id){

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
	
		 $update = "UPDATE edu_pia SET pia_unique_number='$unique_number',pia_name='$name',pia_email ='$email',pia_phone ='$mobile',pia_state='$state',pia_address ='$address',status='$status',profile_pic = '$staff_prof_pic', updated_at=NOW(),updated_by='$user_id' WHERE id='$pia_id'";
		$result=$this->db->query($update);
		
		if ($old_unique_number != $unique_number){
			$update_user="UPDATE edu_users SET user_name='$unique_number',name='$name',user_pic='$staff_prof_pic',status='$status' WHERE user_master_id='$pia_id' AND user_type = '3'";
			$result_user=$this->db->query($update_user);
			
			$subject ='M3 - PIA Username Updated';
			$htmlContent = '<html>
							<head> <title></title>
							</head>
							<body>
							<p>Hi  '.$name.'</p>
							<p>PIA Username Updated</p>
							<p>Username: '.$unique_number.'</p>
							<p></p>
							<p></p>
							<p><a href="'.base_url() .'">Click here to Login</a></p>
							</body>
							</html>';
			// Set content-type header for sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			// Additional headers
			$headers .= 'From: info<info@happysanz.com>' . "\r\n";
			mail($email,$subject,$htmlContent,$headers);
			
		}else {
			$update_user="UPDATE edu_users SET name='$name',user_pic='$staff_prof_pic',status='$status' WHERE user_master_id='$pia_id' AND user_type = '3'";
			$result_user=$this->db->query($update_user);
		}
		
		if ($result_user) {
			$data = array( "status" => "success");
		} else {
			$data = array("status" => "failed");
		}
			return $data;

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
	
	function piaDetails($pia_id){
		$select="SELECT * FROM edu_users A, edu_pia B WHERE A.user_type = '3' AND A.user_id = '$pia_id' AND A.user_master_id = B.id ";
		$result=$this->db->query($select);
		return $result->result();
	}
	
	
	function piaCenterlist($pia_id){
		$select="SELECT * FROM edu_center_master WHERE pia_id = '$pia_id'";
		$result=$this->db->query($select);
		return $result->result();
	}
	
	function piaMobilizerlist($pia_id){
		$select="SELECT * FROM edu_users A, edu_staff_details B WHERE A.user_type = '5' AND A.user_master_id = B.id AND B.pia_id = '$pia_id' ";
		$result=$this->db->query($select);
		return $result->result();
	}
	
	function piaStudentlist($pia_id){
		$select="SELECT * FROM edu_student_prospects WHERE pia_id = '$pia_id'";
		$result=$this->db->query($select);
		return $result->result();
	}
	
	function dashMobilizer($pia_id){
		$select="SELECT e.user_id, e.name, (SELECT count(*) FROM edu_student_prospects d WHERE d.created_by = e.user_id) AS stud_count FROM edu_users e WHERE e.user_type = '5' AND e.pia_id = '$pia_id' ORDER BY stud_count DESC LIMIT 5";
		$result=$this->db->query($select);
		return $result->result();
	}
	
	function dashTasks($pia_id){
		$select="SELECT A.task_title, B.name, B.user_type, C.user_type_name FROM edu_task A, edu_users B, edu_role C WHERE A.user_id = B.user_id AND B.user_type=c.id AND A.pia_id = '$pia_id' ORDER BY A.id DESC LIMIT 5 ";
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
	
	
	function kms_using_lat($mob_id,$selected_date){
          $select="SELECT (6371 * ACOS(
                COS( RADIANS(to_lat) )
              * COS( RADIANS( user_lat ) )
              * COS( RADIANS( user_long ) - RADIANS(to_long) )
              + SIN( RADIANS(to_lat) )
              * SIN( RADIANS( user_lat ) )
                ) ) AS distance,SUM((6371 * ACOS(
                COS( RADIANS(to_lat) )
              * COS( RADIANS( user_lat ) )
              * COS( RADIANS( user_long ) - RADIANS(to_long) )
              + SIN( RADIANS(to_lat) )
              * SIN( RADIANS( user_lat ) )
                ) )) AS km FROM edu_tracking_details WHERE user_id='$mob_id'  AND DATE_FORMAT(created_at, '%Y-%m-%d')='$selected_date'";
          $get_result=$this->db->query($select);
          return $get_result->result();

        }
		
	function testing_map($mob_id,$selected_date){
		$select="SELECT etd.user_location AS address,etd.user_lat AS lat ,etd.user_long AS lng FROM edu_users AS eu LEFT JOIN edu_tracking_details AS etd ON eu.user_id=etd.user_id  WHERE eu.user_id='$mob_id'  AND DATE_FORMAT(created_at, '%Y-%m-%d')='$selected_date' group by minute(created_at) ORDER BY created_at ASC ";
		$get_result=$this->db->query($select);
		$get_res=$get_result->result();

		if($get_result->num_rows()==0){
			$address[] = array ("Geometry"  => array("Latitude" => "no records", "Longitude" => "no records","select_date" => "$selected_date"));
		}else{
		foreach($get_res as $rows){
			$lat=$rows->lat;
			$lng=$rows->lng;
			$loca=$rows->address;
			$address[] = array ("Geometry"  => array("Latitude" => $lat, "Longitude" => $lng,"select_date" => "$selected_date"));
			}
		}
			return $address;
		}
		
	function only_lat_long($mob_id,$selected_date){
		$select="SELECT etd.user_location AS address,etd.user_lat AS lat ,etd.user_long AS lng FROM edu_users AS eu LEFT JOIN edu_tracking_details AS etd ON eu.user_id=etd.user_id  WHERE eu.user_id='$mob_id'  AND DATE_FORMAT(created_at, '%Y-%m-%d')='$selected_date'  ORDER BY created_at ASC ";
	$get_result=$this->db->query($select);
		return $get_result->result();

        }
		
	function profile_update($name,$address,$email,$class_tutor,$mobile,$sec_phone,$sex,$dob,$nationality,$religion,$community_class,$community,$qualification,$staff_prof_pic,$user_id,$staff_id){

   	$user_type=$this->session->userdata('user_type');
	
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
			
		 $update = "UPDATE edu_staff_details SET name='$name',sex='$sex',address='$address',email='$email',trade_batch_id='$class_tutor',phone='$mobile',sec_phone='$sec_phone',dob='$dob',nationality='$nationality',religion='$religion',community_class='$community',community='$community',qualification='$qualification',profile_pic='$staff_prof_pic',updated_at=NOW(),updated_by='$user_id' WHERE id='$staff_id'";
		$result=$this->db->query($update);


		
		if ($old_phone_number != $mobile){
			 if ($user_type =='2'){
				$update_user="UPDATE edu_users SET user_name='$mobile',name='$name',user_pic ='$staff_prof_pic' WHERE user_master_id='$staff_id' AND user_type = '$user_type' ";
			 } else {
				 $update_user="UPDATE edu_users SET name='$name',user_pic ='$staff_prof_pic' WHERE user_master_id='$staff_id' AND user_type = '$user_type' ";
			 }
			 $result_user=$this->db->query($update_user);
		}else {
			 $update_user="UPDATE edu_users SET name='$name',user_pic ='$staff_prof_pic' WHERE user_master_id='$staff_id' AND user_type = '$user_type'";
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
}
?>
