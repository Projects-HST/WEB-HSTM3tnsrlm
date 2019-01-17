<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apimainmodel extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }


//#################### Email ####################//

	public function sendMail($to,$subject,$htmlContent)
	{
		// Set content-type header for sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		// Additional headers
		$headers .= 'From: happysanz<info@happysanz.com>' . "\r\n";
		mail($to,$subject,$htmlContent,$headers);
	}

//#################### Email End ####################//


//#################### Email ####################//

	public function sendNotification($gcm_key,$Title,$Message)
	{

			require_once 'assets/notification/Firebase.php';
            require_once 'assets/notification/Push.php'; 
            
            $device_token = explode(",", $gcm_key);
            $push = null; 
        
//        //first check if the push has an image with it
		    $push = new Push(
					$Title,
					$Message
					//'http://heylaapp.com/notification/images/events.jpg'
				);

// 			//if the push don't have an image give null in place of image
 			// $push = new Push(
 			// 		'HEYLA',
 			// 		'Hi Testing from maran',
 			// 		null
 			// 	);

    		//getting the push from push object
    		$mPushNotification = $push->getPush(); 
    
    		//creating firebase class object 
    		$firebase = new Firebase(); 

    	foreach($device_token as $token) {
    		 $firebase->send(array($token),$mPushNotification);
    	}


/*
	        $gcm_key = array($gcm_key);
			$data = array
			(
				'message' 	=> $Message,
				'title'		=> $Title,
				'vibrate'	=> 1,
				'sound'		=> 1
		//		'largeIcon'	=> 'http://happysanz.net/testing/assets/students/profile/236832.png'
		//		'smallIcon'	=> 'small_icon'
			);

			// Insert real GCM API key from the Google APIs Console
			$apiKey = 'AAAA6yBHF1A:APA91bFXzcbF706WANlD0KCfodQc03NOqtia90irkEZTuE8_xrC6mYQVI-yyuW-oSbg_GnpR2w5NlcPDlWy7i0TkhYuvBQgx3j3TGyVCR8n9TUvECxZ7WGizzBQ9q5iLBC2r_ay-oYHo';
			// Set POST request body
			$post = array(
						'registration_ids'  => $gcm_key,
						'data'              => $data,
						 );
			// Set CURL request headers
			$headers = array(
						'Authorization: key=' . $apiKey,
						'Content-Type: application/json'
							);
			// Initialize curl handle
			$ch = curl_init();
			// Set URL to GCM push endpoint
			curl_setopt($ch, CURLOPT_URL, 'https://gcm-http.googleapis.com/gcm/send');
			// Set request method to POST
			curl_setopt($ch, CURLOPT_POST, true);
			// Set custom request headers
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			// Get the response back as string instead of printing it
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// Set JSON post data
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));
			// Actually send the request
			$result = curl_exec($ch);


			// Handle errors
			if (curl_errno($ch)) {
				//echo 'GCM error: ' . curl_error($ch);
			}
			// Close curl handle
			curl_close($ch);

			// Debug GCM response
			//echo $result;
*/


	}

//#################### Notification End ####################//


//#################### SMS ####################//

	public function sendSMS($Phoneno,$Message)
	{
		$textmsg = urlencode($Message);
		$smsGatewayUrl = 'http://173.45.76.227/send.aspx?';
		$api_element = 'username=kvmhss&pass=kvmhss123&route=trans1&senderid=KVMHSS';
		$api_params = $api_element.'&numbers='.$Phoneno.'&message='.$textmsg;
		$smsgatewaydata = $smsGatewayUrl.$api_params;
		$url = $smsgatewaydata;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$output = curl_exec($ch);
		curl_close($ch);
	}

//#################### SMS End ####################//


//#################### Current Year ####################//

	public function getYear()
	{
		$sqlYear = "SELECT * FROM edu_academic_year WHERE NOW() >= from_month AND NOW() <= to_month AND status = 'Active'";
		$year_result = $this->db->query($sqlYear);
		$ress_year = $year_result->result();

		if($year_result->num_rows()==1)
		{
			foreach ($year_result->result() as $rows)
			{
			    $year_id = $rows->year_id;
			}
			return $year_id;
		}
	}
//#################### Current Year End ####################//



//#################### Login ####################//

	public function Login($username,$password,$gcmkey,$mobiletype)
	{

 		$sql = "SELECT * FROM edu_users A, edu_role B  WHERE A.user_type = B.id AND A.user_name ='".$username."' and A.user_password = md5('".$password."') and A.status='Active'";
		$user_result = $this->db->query($sql);
		$ress = $user_result->result();

		if($user_result->num_rows()>0)
		{
			foreach ($user_result->result() as $rows)
			{
				  $user_id = $rows->user_id;
				  $login_count = $rows->login_count+1;
				  $user_type = $rows->user_type;
				  $user_pic = $rows->user_pic;
				  if ($user_pic!="") {
				      $user_picurl = base_url().'assets/profile/'.$user_pic;
				  } else {
				      $user_picurl = "";
				  }
				  $update_sql = "UPDATE edu_users SET last_login_date=NOW(),login_count='$login_count' WHERE user_id='$user_id'";
				  $update_result = $this->db->query($update_sql);
			}

				$userData  = array(
							"user_id" => $ress[0]->user_id,
							"name" => $ress[0]->name,
							"user_name" => $ress[0]->user_name,
							"user_pic" => $user_picurl,
							"user_type_name" => $ress[0]->user_type_name,							
							"user_type" => $ress[0]->user_type,
							"password_status" => $ress[0]->password_status
						);

				$gcmQuery = "SELECT * FROM edu_notification WHERE gcm_key like '%" .$gcmkey. "%' LIMIT 1";
				$gcm_result = $this->db->query($gcmQuery);
				$gcm_ress = $gcm_result->result();

				if($gcm_result->num_rows()==0)
				{
					$sQuery = "INSERT INTO edu_notification (user_id,gcm_key,mobile_type) VALUES ('". $user_id . "','". $gcmkey . "','". $mobiletype . "')";
					$update_gcm = $this->db->query($sQuery);
				}

				if ($user_type==1)  {
					
					$mob_count = "SELECT * FROM edu_staff_details WHERE role_type = '5'";
					$mob_count_res = $this->db->query($mob_count);
					$mobilizer_count = $mob_count_res->num_rows();
										
					$cen_count = "SELECT * FROM edu_center_master";
					$cen_count_res = $this->db->query($cen_count);
					$center_count = $cen_count_res->num_rows();
					
					$stu_count = "SELECT * FROM edu_student_prospects";
					$stu_count_res = $this->db->query($stu_count);
					$student_count = $mob_count_res->num_rows();
					
					$dashboardData  = array(
							"mobilizer_count" => $mobilizer_count,
							"center_count" => $center_count,
							"student_count" => $student_count
						);
					$response = array("status" => "loggedIn", "msg" => "User loggedIn successfully", "userData" => $userData,"dashboardData"=>$dashboardData);
					return $response;
				}
				else if ($user_type==2)  {
					
					$staff_id = $rows->user_master_id;

					$staff_query = "SELECT * FROM edu_staff_details WHERE id = '$staff_id'";
					$staff_res = $this->db->query($staff_query);
					$staff_profile = $staff_res->result();
					if($staff_res->num_rows()>0)
						{
							$staffData  = array(
							"staff_profile_id" => $staff_profile[0]->id,
							"name" => $staff_profile[0]->name,
							"sex" => $staff_profile[0]->sex,
							"age" => $staff_profile[0]->age,
							"nationality" => $staff_profile[0]->nationality,
							"religion" => $staff_profile[0]->religion,
							"community_class" => $staff_profile[0]->community_class,
							"community" => $staff_profile[0]->community,
							"address" => $staff_profile[0]->address,
							"email" => $staff_profile[0]->email,
							"phone" => $staff_profile[0]->phone,
							"qualification" => $staff_profile[0]->qualification
							);
						}
						
					$mob_count = "SELECT * FROM edu_staff_details WHERE role_type = '5'";
					$mob_count_res = $this->db->query($mob_count);
					$mobilizer_count = $mob_count_res->num_rows();
										
					$cen_count = "SELECT * FROM edu_center_master";
					$cen_count_res = $this->db->query($cen_count);
					$center_count = $cen_count_res->num_rows();
					
					$stu_count = "SELECT * FROM edu_student_prospects";
					$stu_count_res = $this->db->query($stu_count);
					$student_count = $mob_count_res->num_rows();
					
					$dashboardData  = array(
							"mobilizer_count" => $mobilizer_count,
							"center_count" => $center_count,
							"student_count" => $student_count
						);
						
					$response = array("status" => "loggedIn", "msg" => "User loggedIn successfully", "userData" => $userData,"staffProfile" =>$staffData,"dashboardData"=>$dashboardData);
					return $response;
				}
				else if ($user_type==3)  {
					
					$pia_id = $rows->user_master_id;

					$pia_query = "SELECT * FROM pia_table WHERE id = '$pia_id'";
					$pia_res = $this->db->query($pia_query);
					$pia_profile = $pia_res->result();
					if($pia_res->num_rows()>0)
						{
							$piaData  = array(
							"pia_profile_id" => $pia_profile[0]->id,
							"pia_unique_number" => $pia_profile[0]->pia_unique_number,
							"pia_name" => $pia_profile[0]->pia_name,
							"pia_address" => $pia_profile[0]->pia_address,
							"pia_phone" => $pia_profile[0]->pia_phone,
							"pia_email" => $pia_profile[0]->pia_email,
							);
						}
						

					$mob_count = "SELECT * FROM edu_staff_details WHERE pia_id = '$pia_id' AND role_type = '5'";
					$mob_count_res = $this->db->query($mob_count);
					$mobilizer_count = $mob_count_res->num_rows();
					
					$cen_count = "SELECT * FROM edu_center_master WHERE pia_id = '$pia_id'";
					$cen_count_res = $this->db->query($cen_count);
					$center_count = $cen_count_res->num_rows();
					
					$stu_count = "SELECT * FROM edu_student_prospects WHERE pia_id = '$pia_id'";
					$stu_count_res = $this->db->query($stu_count);
					$student_count = $mob_count_res->num_rows();
					
					$ta_count = "SELECT * FROM edu_task WHERE pia_id = '$pia_id'";
					$ta_count_res = $this->db->query($ta_count);
					$task_count = $mob_count_res->num_rows();
					
					$dashboardData  = array(
							"mobilizer_count" => $mobilizer_count,
							"center_count" => $center_count,
							"student_count" => $student_count,
							"task_count" => $task_count
						);
					
					$response = array("status" => "loggedIn", "msg" => "User loggedIn successfully", "userData" => $userData,"piaProfile" =>$piaData,"dashboardData"=>$dashboardData);
					return $response;
				}
				else if ($user_type==5) {

						$mobilizer_id = $rows->user_master_id;

                        $staff_query = "SELECT t.id, t.name, t.sex, t.age, t.nationality, t.religion, t.community_class, t.community, t.address, t.email, t.phone, t.profile_pic, t.qualification FROM edu_staff_details AS t WHERE t.id = '$mobilizer_id'";
						$staff_res = $this->db->query($staff_query);
						$staff_profile = $staff_res->result();
						if($staff_res->num_rows()>0)
                        	{
                        	    $staffData  = array(
    							"staff_id" => $staff_profile[0]->id,
    							"name" => $staff_profile[0]->name,
    							"sex" => $staff_profile[0]->sex,
    							"age" => $staff_profile[0]->age,
    							"nationality" => $staff_profile[0]->nationality,
    							"religion" => $staff_profile[0]->religion,
    							"community_class" => $staff_profile[0]->community_class,
    							"community" => $staff_profile[0]->community,
    							"address" => $staff_profile[0]->address,
    							"email" => $staff_profile[0]->email,
    							"phone" => $staff_profile[0]->phone,
    							"qualification" => $staff_profile[0]->qualification
						        );
                        	}

						$response = array("status" => "loggedIn", "msg" => "User loggedIn successfully", "userData" => $userData,"staffProfile" =>$staffData);
						return $response;
				  }
		} else {
			 			$response = array("status" => "error", "msg" => "Invalid login");
						return $response;
			 }
	}

//#################### Main Login End ####################//

//#################### Profile Pic Update ####################//
	public function updateProfilepic($user_id,$userFileName)
	{
            $update_sql= "UPDATE edu_users SET user_pic='$userFileName', updated_date=NOW() WHERE user_id='$user_id'";
			$update_result = $this->db->query($update_sql);

			$response = array("status" => "success", "msg" => "Profile Picture Updated","user_picture"=>$userFileName);
			return $response;
	}
//#################### Profile Pic Update End ####################//


//#################### Change Password ####################//
	public function forgotPassword($user_name)
	{
			$user_query = "SELECT * FROM edu_users WHERE user_name  ='$user_name' and status='Active'";
			$user_res = $this->db->query($user_query);
			$user_result= $user_res->result();

			if($user_res->num_rows()==1)
			{
				foreach ($user_result as $rows)
				{
				  $user_id = $rows->user_id;
				  $user_master_id = $rows->user_master_id;
				  $user_type = $rows->user_type;
				}

				if ($user_type==3) {

					$pia_query = "SELECT * FROM pia_table WHERE id  ='$user_master_id' and status='Active'";
					$pia_res = $this->db->query($pia_query);
					$pia_result= $pia_res->result();

					if($pia_res->num_rows()==1)
					{
						foreach ($pia_result as $rows)
						{
						  $phone = $rows->pia_phone;
						  $email = $rows->pia_email;
						}
					}
				} else {
					
					$staff_query = "SELECT * FROM edu_staff_details WHERE id  ='$user_master_id' and status='Active'";
					$staff_res = $this->db->query($staff_query);
					$staff_result= $staff_res->result();

					if($staff_res->num_rows()==1)
					{
						foreach ($staff_result as $rows)
						{
						  $phone = $rows->email;
						  $email = $rows->phone;
						}
					}
				}

				$digits = 4;
    			$OTP = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
				
				$mobile_message = 'Verify OTP :'. $OTP;
                $this->sendSMS($phone,$mobile_message);
				
				
				$subject = "M3 - Forgot Password";
            	$email_message = 'Username:'.$user_name.'<br>Password:'.$OTP.'<br><br>';
	            $this->sendMail($email,$subject,$email_message);
				
				$update_sql = "UPDATE edu_users SET user_password = md5('$OTP'),updated_date=NOW() WHERE user_id='$user_id'";
				$update_result = $this->db->query($update_sql);
				
                $response = array("status" => "sucess", "msg" => "Password Updated");
			} else {
				$response = array("status" => "error", "msg" => "User-name is wrong.");
			}

			return $response;
	}
//#################### Change Password End ####################//

//#################### Change Password ####################//
	public function changePassword($user_id,$old_password,$password)
	{
			$user_query = "SELECT * FROM edu_users WHERE user_id ='$user_id' and user_password= md5('$old_password') and status='Active'";
			$user_res = $this->db->query($user_query);
			$user_result= $user_res->result();

			if($user_res->num_rows()==1)
			{
				$update_sql = "UPDATE edu_users SET user_password = md5('$password'),updated_date=NOW() WHERE user_id='$user_id'";
				$update_result = $this->db->query($update_sql);

                $response = array("status" => "sucess", "msg" => "Password Updated");
			} else {
				$response = array("status" => "error", "msg" => "Entered Current Password is wrong.");
			}

			return $response;
	}
//#################### Change Password End ####################//

}
?>
