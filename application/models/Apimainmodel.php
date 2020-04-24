<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apimainmodel extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }


//#################### Email ####################//




    function sendMail($to,$subject,$htmlContent)
    {

      $sendto = $to;
      $subject=$subject;
      $htmlContent = '
      <html>
      <head>  <title></title>
      </head>
      <body>
      <p style="margin-left:30px;">'.$htmlContent.'</p>
        </body>
      </html>';

      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
      // Additional headers
      $headers .= 'From: m3tnsrlm<info@m3tnsrlm.com>' . "\r\n";
      mail($sendto,$subject,$htmlContent,$headers);
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

         public function sendSMS($Phoneno,$Message){
         $msg=urlencode($Message);
         $curl = curl_init();
             curl_setopt_array($curl, array(
             CURLOPT_URL => "https://api.msg91.com/api/sendhttp.php?mobiles=$Phoneno&authkey=242202ALE69fBMks5bbee06b&route=4&sender=TNSRLM&message=$msg&country=91",
             // CURLOPT_URL => $url,
             CURLOPT_RETURNTRANSFER => true,
             CURLOPT_ENCODING => "",
             CURLOPT_MAXREDIRS => 10,
             CURLOPT_TIMEOUT => 30,
             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
             CURLOPT_CUSTOMREQUEST => "GET",
             CURLOPT_SSL_VERIFYHOST => 0,
             CURLOPT_SSL_VERIFYPEER => 0,
           ));

           $response = curl_exec($curl);
           $err = curl_error($curl);

           curl_close($curl);

           if ($err) {
             echo "cURL Error #:" . $err;
           } else {
             // echo $response;
           }



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
 		$sql = "SELECT * FROM edu_users A, edu_role B WHERE A.user_type = B.id AND A.user_name ='".$username."' and A.user_password = md5('".$password."') and A.status='Active'";
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

          $pia_count="SELECT * FROM edu_pia";
          $pia_count_excution=$this->db->query($pia_count);
          $total_pia_count= $pia_count_excution->num_rows();

					$dashboardData  = array(
							"mobilizer_count" => $mobilizer_count,
							"center_count" => $center_count,
							"student_count" => $student_count,
              "pia_count"=>$total_pia_count
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


					$pia_query = "SELECT * FROM edu_pia WHERE id = '$pia_id'";
					$pia_res = $this->db->query($pia_query);
					$pia_profile = $pia_res->result();
					if($pia_res->num_rows()>0)
						{
							$piaData  = array(
							"pia_profile_id" => $pia_profile[0]->id,
              "scheme_id" => $pia_profile[0]->scheme_id,
							"pia_unique_number" => $pia_profile[0]->pia_unique_number,
							"pia_name" => $pia_profile[0]->pia_name,
							"pia_address" => $pia_profile[0]->pia_address,
							"pia_phone" => $pia_profile[0]->pia_phone,
							"pia_email" => $pia_profile[0]->pia_email,
							);
						}
					$pro_period_query = "SELECT * FROM edu_year_duration WHERE pia_id = '$user_id'";

					$pro_period_res = $this->db->query($pro_period_query);
					$pro_period_result = $pro_period_res->result();
					if($pro_period_res->num_rows()!=0)
						{
							$proPeriod  = array(
								"period_from" => $pro_period_result[0]->period_from,
								"period_to" => $pro_period_result[0]->period_to
							);
						}else{
              $proPeriod  = array(
                "period_from" => "0",
                "period_to" => "0",
              );
            }

					$mob_count = "SELECT * FROM edu_staff_details WHERE pia_id = '$user_id' AND role_type = '5'";
					$mob_count_res = $this->db->query($mob_count);
					$mobilizer_count = $mob_count_res->num_rows();

					$cen_count = "SELECT * FROM edu_center_master WHERE pia_id = '$user_id'";
					$cen_count_res = $this->db->query($cen_count);
					$center_count = $cen_count_res->num_rows();

					$stu_count = "SELECT * FROM edu_student_prospects WHERE pia_id = '$user_id'";
					$stu_count_res = $this->db->query($stu_count);
					$student_count = $mob_count_res->num_rows();

					$ta_count = "SELECT * FROM edu_task WHERE pia_id = '$user_id'";
					$ta_count_res = $this->db->query($ta_count);
					$task_count = $mob_count_res->num_rows();

					$dashboardData  = array(
							"mobilizer_count" => $mobilizer_count,
							"center_count" => $center_count,
							"student_count" => $student_count,
							"task_count" => $task_count,
							"project_period" => $proPeriod
						);
					$response = array("status" => "loggedIn", "msg" => "User loggedIn successfully", "userData" => $userData,"piaProfile" =>$piaData,"dashboardData"=>$dashboardData);
					return $response;
				}
				else if ($user_type==5) {

					   $mobilizer_id = $rows->user_master_id;
            $staff_query = "SELECT t.id, t.pia_id, t.role_type, t.name, t.sex, t.age, t.nationality, t.religion, t.community_class, t.community, t.address, t.email, t.phone, t.profile_pic, t.qualification FROM edu_staff_details AS t WHERE t.id = '$mobilizer_id'";
						$staff_res = $this->db->query($staff_query);
						$staff_profile = $staff_res->result();
						if($staff_res->num_rows()>0)
                        	{
                        	    $staffData  = array(
    							"staff_id" => $staff_profile[0]->id,
								"pia_id" => $staff_profile[0]->pia_id,
								"role_type" => $staff_profile[0]->role_type,
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
			 			$response = array("status" => "error", "msg" => "Invalid username/passsword. Kindly ensure they're correct");
						return $response;
			 }
	}

//#################### Main Login End ####################//


//#################### Admin Dashboard ####################//

    function admin_dashboard($user_id){
      $mob_count = "SELECT * FROM edu_staff_details WHERE role_type = '5'";
      $mob_count_res = $this->db->query($mob_count);
      $mobilizer_count = $mob_count_res->num_rows();

      $cen_count = "SELECT * FROM edu_center_master";
      $cen_count_res = $this->db->query($cen_count);
      $center_count = $cen_count_res->num_rows();

      $stu_count = "SELECT * FROM edu_student_prospects";
      $stu_count_res = $this->db->query($stu_count);
      $student_count = $mob_count_res->num_rows();

      $pia_count="SELECT * FROM edu_pia";
      $pia_count_excution=$this->db->query($pia_count);
      $total_pia_count= $pia_count_excution->num_rows();

      $dashboardData  = array(
          "mobilizer_count" => $mobilizer_count,
          "center_count" => $center_count,
          "student_count" => $student_count,
          "pia_count"=>$total_pia_count
        );
      $response = array("status" => "success", "msg" => "Admin Dashboard details","dashboardData"=>$dashboardData);
      return $response;
    }

//#################### Admin Dashboard ####################//


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

					$pia_query = "SELECT * FROM edu_pia WHERE id  ='$user_master_id' and status='Active'";
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
						  $email = $rows->email;
						  $phone = $rows->phone;
						}
					}
				}

				$digits = 6;
    			$OTP = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);


              	$mobile_message = 'Hi '.$user_name.' your password is reseted successfully try new password to login'.PHP_EOL.'Username : '.$user_name.' '.PHP_EOL.'Password:'.$OTP;
                $this->sendSMS($phone,$mobile_message);


				      $subject = "M3 - Forgot Password";
            	$email_message = 'App login Username:'.$user_name.'<br> Password:'.$OTP.'<br><br>';
	            $this->sendMail($email,$subject,$email_message);

				$update_sql = "UPDATE edu_users SET user_password = md5('$OTP'),updated_date=NOW() WHERE user_id='$user_id'";
				$update_result = $this->db->query($update_sql);

                $response = array("status" => "sucess", "msg" => "Password Updated");
			} else {
				$response = array("status" => "error", "msg" => "Your username doesn't match our records. Please check.");
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


//#################### User Creation ####################//
	public function createUser($user_id,$name,$sex,$dob,$nationality,$religion,$community_class,$community,$address,$email,$sec_email,$phone,$sec_phone,$qualification)
	{
		$select = "SELECT * FROM edu_staff_details Where email='$email' OR phone='$phone'";
		$result=$this->db->query($select);

		if($result->num_rows()>0){
			$response = array("status" => "error", "msg" => "User Already Exist");
         }else{
           $insert = "INSERT INTO edu_staff_details (role_type,name,sex,dob,nationality,religion,community_class,community,address,email,sec_email ,phone,sec_phone,qualification,status,created_by,created_at) VALUES('2','$name','$sex','$dob','$nationality','$religion','$community_class','$community','$address','$email','$sec_email','$phone','$sec_phone','$qualification','Active','$user_id',NOW())";
           $result=$this->db->query($insert);
           $insert_id = $this->db->insert_id();

            $digits = 6;
			$OTP = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
			$md5pwd = md5($OTP);

            $user_table = "INSERT INTO edu_users (name,user_name,user_password,user_type,user_master_id,created_date,status) VALUES('$name','$phone','$md5pwd','2','$insert_id',NOW(),'Active')";
			$result_user=$this->db->query($user_table);
			$profile_id = $this->db->insert_id();

			$mobile_message = 'Username :'.PHP_EOL. $phone .'Password:'.$OTP;
			$this->sendSMS($phone,$mobile_message);

			$subject = "M3 - User Details";
			$email_message = 'Username:'.$phone.'<br>Password:'.$OTP.'<br><br>';
			$this->sendMail($email,$subject,$email_message);

			$response = array("status" => "success", "msg" => "User Created","profile_id"=>$profile_id);
		  }

			return $response;
	}
//#################### User Creation End ####################//


//#################### User List ####################//
	public function userList($user_id)
	{
			$sQuery = "SELECT A.user_id, A.user_master_id,A.name, A.user_name, B.user_type_name, A.status FROM edu_users A, edu_role B WHERE A.user_type = B.id AND A.user_type ='2'";
			$s_res = $this->db->query($sQuery);
			$s_result= $s_res->result();

			if($s_res->num_rows()>0){
			     	$response = array("status" => "success", "msg" => "User List","userList"=>$s_result);
			}else{
			        $response = array("status" => "error", "msg" => "Users Not Found");
			}
			return $response;
	}
//#################### User List End ####################//


//#################### User profile Update ####################//

    function user_profile_update($user_master_id,$role_type,$name,$address,$email,$phone){

      $update="UPDATE edu_staff_details SET name='$name',address='$address',email='$email',phone='$phone',updated_at=NOW(),updated_by='$user_master_id' WHERE role_type='$role_type'";
      $result=$this->db->query($update);

      $update_user="UPDATE edu_users SET name='$name' WHERE user_type='$role_type' AND user_master_id='$user_master_id'";
      $result_user=$this->db->query($update_user);
      if($result_user){
            $response = array("status" => "success", "msg" => "User profile updated!.");
      }else{
              $response = array("status" => "error", "msg" => "Something went wrong!.");
      }
      return $response;
    }

//#################### User profile Update  ####################//

//#################### User profile  ####################//
    function user_profile($user_master_id,$role_type){
      $sQuery="SELECT * FROM edu_staff_details where role_type='$role_type'";
      $s_res = $this->db->query($sQuery);
      $s_result= $s_res->result();

      if($s_res->num_rows()>0){
            $response = array("status" => "success", "msg" => "User profile","userList"=>$s_result);
      }else{
              $response = array("status" => "error", "msg" => "Users Not Found");
      }
      return $response;
    }
//#################### User profile  ####################//
//#################### User Details ####################//
	public function userDetails ($user_master_id)
	{
			$sQuery = "SELECT * FROM edu_staff_details WHERE id = '$user_master_id' AND role_type='2'";
			$s_res = $this->db->query($sQuery);
			$s_result= $s_res->result();

			if($s_res->num_rows()>0){
			     	$response = array("status" => "success", "msg" => "User List","userList"=>$s_result);
			}else{
			        $response = array("status" => "error", "msg" => "Users Not Found");
			}
			return $response;
	}
//#################### User Details End ####################//

//#################### User Update ####################//
	public function updateUser($user_id,$user_master_id,$name,$sex,$dob,$nationality,$religion,$community_class,$community,$address,$email,$sec_email,$phone,$sec_phone,$qualification,$status)
	{
			$sQuery = "SELECT * FROM edu_staff_details WHERE id = '$user_master_id' AND role_type='2'";
			$user_result = $this->db->query($sQuery);
			$ress = $user_result->result();
			if($user_result->num_rows()>0)
			{
				foreach ($user_result->result() as $rows)
				{
					$old_phone = $rows->phone;
				}
			}

			if ($old_phone != $phone){

				$sQuery = "SELECT * FROM edu_staff_details WHERE id != '$user_master_id' AND phone='$phone'";
				$user_result = $this->db->query($sQuery);
				if($user_result->num_rows()>0)
				{
					$response = array("status" => "error", "msg" => "Phone number already exist.");
				} else {
					$update="UPDATE edu_staff_details SET name='$name',sex='$sex',address='$address',email='$email',sec_email='$sec_email',phone='$phone',sec_phone='$sec_phone',dob='$dob',nationality='$nationality',religion='$religion',community_class='$community_class',community='$community',qualification='$qualification',status='$status',updated_at=NOW(),updated_by='$user_id' WHERE id='$user_master_id'";
					$result=$this->db->query($update);

					$update_user="UPDATE edu_users SET user_name = '$phone', name='$name' WHERE user_type='2' AND user_master_id='$user_master_id'";
					$result_user=$this->db->query($update_user);

						$mobile_message = 'Username :'. $phone;
						$this->sendSMS($phone,$mobile_message);

						$subject = "M3 - User Name Update";
						$email_message = 'Username:'.$phone.'<br><br>';
						$this->sendMail($email,$subject,$email_message);

						$response = array("status" => "success", "msg" => "User Updated Successfully");
				}

			} else {

					$update="UPDATE edu_staff_details SET name='$name',sex='$sex',address='$address',email='$email',sec_email='$sec_email',phone='$phone',sec_phone='$sec_phone',dob='$dob',nationality='$nationality',religion='$religion',community_class='$community_class',community='$community',qualification='$qualification',status='$status',updated_at=NOW(),updated_by='$user_id' WHERE id='$user_master_id'";
					$result=$this->db->query($update);

					$update_user="UPDATE edu_users SET name='$name', status='$status' WHERE user_type='2' AND user_master_id='$user_master_id'";
					$result_user=$this->db->query($update_user);

					$response = array("status" => "success", "msg" => "User Updated Successfully");

			}

			return $response;
	}
//#################### User Update End ####################//


//#################### PIA Creation ####################//
	public function createPia($user_id,$unique_number,$name,$address,$phone,$email)
	{
		$select = "SELECT * FROM edu_pia Where pia_unique_number='$unique_number'";
		$result=$this->db->query($select);

		if($result->num_rows()>0){
			$response = array("status" => "error", "msg" => "PIA Already Exist");
         }else{
           $insert = "INSERT INTO edu_pia (pia_unique_number,pia_name,pia_address,pia_phone,pia_email,status,created_by,created_at) VALUES('$unique_number','$name','$address','$phone','$email','Active','$user_id',NOW())";
           $result=$this->db->query($insert);
           $insert_id = $this->db->insert_id();

            $digits = 6;
			$OTP = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
			$md5pwd = md5($OTP);

            $user_table = "INSERT INTO edu_users (name,user_name,user_password,user_type,user_master_id,created_date,status) VALUES('$name','$unique_number','$md5pwd','3','$insert_id',NOW(),'Active')";
			$result_user=$this->db->query($user_table);
			$profile_id = $this->db->insert_id();

			// $mobile_message = 'Username :'. $unique_number .'Password:'.$OTP;
      $mobile_message = 'M3 APP login'.PHP_EOL.'Username:'.$unique_number.PHP_EOL.'Password:'.$OTP.'';
			$this->sendSMS($phone,$mobile_message);

			$subject = "M3 - User Details";
			$email_message = 'Username:'.$unique_number.'<br>Password:'.$OTP.'<br><br>';
			$this->sendMail($email,$subject,$email_message);

			$response = array("status" => "success", "msg" => "User Created","profile_id"=>$profile_id);
		  }

			return $response;
	}
//#################### PIA Creation End ####################//


//#################### PIA List ####################//
	public function piaList($user_id)
	{
			$sQuery = "SELECT A.user_id, A.user_master_id,A.name, A.user_name, B.user_type_name, A.status FROM edu_users A, edu_role B WHERE A.user_type = B.id AND A.user_type ='3'";
			$s_res = $this->db->query($sQuery);
			$s_result= $s_res->result();

			if($s_res->num_rows()>0){
			     	$response = array("status" => "success", "msg" => "User List","userList"=>$s_result);
			}else{
			        $response = array("status" => "error", "msg" => "Users Not Found");
			}
			return $response;
	}
//#################### PIA List End ####################//

//#################### PIA Details ####################//
	public function piaDetails ($user_master_id)
	{
			$sQuery = "SELECT * FROM edu_pia WHERE id = '$user_master_id'";
			$s_res = $this->db->query($sQuery);
			$s_result= $s_res->result();

			if($s_res->num_rows()>0){
			     	$response = array("status" => "success", "msg" => "User List","userList"=>$s_result);
			}else{
			        $response = array("status" => "error", "msg" => "Users Not Found");
			}
			return $response;
	}
//#################### PIA Details End ####################//

//#################### PIA Update ####################//
	public function updatePia($user_id,$pia_id,$unique_number,$name,$address,$phone,$email,$status)
	{
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

			if ($old_unique_number != $unique_number){

				$sQuery = "SELECT * FROM edu_pia WHERE id != '$pia_id' AND pia_unique_number='$unique_number'";
				$user_result = $this->db->query($sQuery);
				if($user_result->num_rows()>0)
				{
					$response = array("status" => "error", "msg" => "Unique number already exist.");
				} else {

					$update="UPDATE edu_pia SET pia_unique_number='$unique_number',pia_name='$name',pia_address='$address',pia_phone='$phone',pia_email='$email',status='$status',updated_at=NOW(),updated_by='$user_id' WHERE id='$pia_id'";
					$result=$this->db->query($update);

					$update_user="UPDATE edu_users SET user_name = '$unique_number', name='$name', status='$status' WHERE user_type='3' AND user_master_id='$pia_id'";
					$result_user=$this->db->query($update_user);


						$mobile_message = 'Username :'. $unique_number;
						$this->sendSMS($phone,$mobile_message);

						$subject = "M3 - User Name Update";
						$email_message = 'Username:'.$unique_number.'<br><br>';
						$this->sendMail($email,$subject,$email_message);

					$response = array("status" => "success", "msg" => "User Updated Successfully");
				}

			} else {

					$update="UPDATE edu_pia SET pia_unique_number='$unique_number',pia_name='$name',pia_address='$address',pia_phone='$phone',pia_email='$email',status='$status',updated_at=NOW(),updated_by='$user_id' WHERE id='$pia_id'";
					$result=$this->db->query($update);

					$update_user="UPDATE edu_users SET name='$name', status='$status' WHERE user_type='3' AND user_master_id='$pia_id'";
					$result_user=$this->db->query($update_user);

					$response = array("status" => "success", "msg" => "User Updated Successfully");

			}

			return $response;
	}
//#################### PIA Update End ####################//

//#################### Plan List ####################//
	public function piaPlanlist($user_id)
	{
			$sQuery = "SELECT
						A.pia_id,
						B.name,
						A.doc_name,
						A.doc_file,
						A.doc_month_year,
						A.created_at
					FROM
						edu_mobilization_plan A,
						edu_users B
					WHERE
						A.pia_id = B.user_id ORDER BY A.created_at DESC";
			$s_res = $this->db->query($sQuery);
			$s_result= $s_res->result();

			if($s_res->num_rows()>0){
				foreach ($s_res->result() as $rows)
				{
				 $planDetails[]  = array(
						"pia_id" => $rows->pia_id,
						"name" => $rows->name,
						"doc_name " => $rows->doc_name,
						"doc_month_year " => $rows->doc_month_year,
						"doc_file" => base_url().'assets/mobilization_plan/'.$rows->doc_file,
						"created_at" => $rows->created_at
				);
			}
			     	$response = array("status" => "success", "msg" => "Plan List","planList"=>$planDetails);
			}else{
			        $response = array("status" => "error", "msg" => "Plans Not Found");
			}
			return $response;
	}
//#################### Plan List End ####################//

//#################### PIA Dashboard ####################//
	public function piaDashboard($pia_id)
	{
			$pro_period_query = "SELECT * FROM edu_year_duration WHERE pia_id = '$pia_id'";
			$pro_period_res = $this->db->query($pro_period_query);
			$pro_period_result = $pro_period_res->result();
			if($pro_period_res->num_rows()>0)
				{
					$proPeriod  = array(
						"period_from" => $pro_period_result[0]->period_from,
						"period_to" => $pro_period_result[0]->period_to
					);
				} else {
					$proPeriod  = array();
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
					"task_count" => $task_count,
					"project_period" => $proPeriod
				);
			$response = array("status" => "Sucess", "msg" => "Pia Dashboard","piaDashboard"=>$dashboardData);
			return $response;
	}
//#################### PIA Dashboard End ####################//

//#################### Center List ####################//
	public function piaCenterlist ($pia_id)
	{
            $sQuery = "SELECT * FROM edu_center_master WHERE pia_id = '$pia_id' AND status = 'Active'";
			$s_res = $this->db->query($sQuery);
			$s_result= $s_res->result();

			if($s_res->num_rows()>0){
			     	$response = array("status" => "success", "msg" => "Center List","centerList"=>$s_result);
			}else{
			        $response = array("status" => "error", "msg" => "Center Not Found");
			}
			return $response;
	}
//#################### Center List End ####################//

//#################### User List ####################//
	public function piaMoblist ($pia_id)
	{
			$sQuery = "SELECT A.user_id, A.user_master_id,A.name, A.user_name, B.user_type_name, A.status FROM edu_users A, edu_role B WHERE A.user_type = B.id AND A.pia_id='$pia_id' AND A.user_type ='5'";
			$s_res = $this->db->query($sQuery);
			$s_result= $s_res->result();

			if($s_res->num_rows()>0){
			     	$response = array("status" => "success", "msg" => "User List","userList"=>$s_result);
			}else{
			        $response = array("status" => "error", "msg" => "Users Not Found");
			}
			return $response;
	}
//#################### User List End ####################//

//#################### User Details ####################//
	public function piaMobdetails ($mob_id)
	{
			$sQuery = "SELECT * FROM edu_staff_details WHERE id = '$mob_id'";
			$s_res = $this->db->query($sQuery);
			$s_result= $s_res->result();

			if($s_res->num_rows()>0){
			     	$response = array("status" => "success", "msg" => "User List","userList"=>$s_result);
			}else{
			        $response = array("status" => "error", "msg" => "Users Not Found");
			}
			return $response;
	}
//#################### User Details End ####################//

//#################### List Students ####################//
	public function listStudents($mob_id)
	{
		 	$student_query = "SELECT name,sex,mobile,email,enrollment,status FROM `edu_student_prospects` WHERE created_by ='$mob_id'";
			$student_res = $this->db->query($student_query);
			$student_result= $student_res->result();
			$student_count = $student_res->num_rows();

			 if($student_res->num_rows()==0){
				 $response = array("status" => "error", "msg" => "Students Not Found");
			}else{
				$response = array("status" => "success", "msg" => "View Events", "count" => $student_count, "studentList"=>$student_result);
			}
			return $response;
	}
//#################### List Students End ####################//

//#################### User Tracking ####################//
	public function mobilizerTracking($mob_id,$track_date)
	{
		    //$track_query = "SELECT etd.user_location AS address,etd.user_lat AS lat ,etd.user_long AS lng FROM edu_users AS eu LEFT JOIN edu_tracking_details AS etd ON eu.user_id=etd.user_id  WHERE eu.user_id='$mob_id'  AND DATE_FORMAT(created_at, '%Y-%m-%d')='$track_date' group by minute(created_at) ORDER BY created_at ASC";
		    $track_query = "SELECT etd.user_location AS address,etd.user_lat AS lat ,etd.user_long AS lng FROM edu_users AS eu LEFT JOIN edu_tracking_details AS etd ON eu.user_id=etd.user_id  WHERE eu.user_id='$mob_id' AND DATE_FORMAT(created_at, '%Y-%m-%d')='$track_date' ORDER BY created_at ASC";
			$track_res = $this->db->query($track_query);
			$track_result= $track_res->result();

			 if($track_res->num_rows()==0){
				 $response = array("status" => "error", "msg" => "Track Not Found");
			}else{

			foreach($track_result as $rows){
				$lat=$rows->lat;
				$lng=$rows->lng;
				$loca=$rows->address;
				$address[] = array ("Latitude" => $lat, "Longitude" => $lng);
             }

			 $km_query="SELECT (6371 * ACOS(
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
                ) )) AS km FROM edu_tracking_details WHERE user_id='$mob_id'  AND DATE_FORMAT(created_at, '%Y-%m-%d')='$track_date'";
				$km_result=$this->db->query($km_query);
				$km_distance_calc= $km_result->result();

				$response = array("status" => "success", "msg" => "Trackinng Details", "trackingDetails"=>$address, "Distance"=>$km_distance_calc);
			}
			return $response;

	}
//#################### User Tracking End ####################//


//#################### List Centers ####################//
	public function Centerlist($user_id)
	{
		 $center_query = "SELECT * FROM edu_center_master WHERE status = 'Active'";
		$center_res = $this->db->query($center_query);
		 if($center_res->num_rows()>0){
			 foreach ($center_res->result() as $rows)
				{
				 $centerDetails[]  = array(
						"center_id" => $rows->id,
						"center_name" => $rows->center_name,
						"center_info " => $rows->center_info,
						"center_address " => $rows->center_address,
						"center_logo" => base_url().'assets/center/logo/'.$rows->center_banner
				);
			}

				$response = array("status" => "success", "msg" => "Center Details","cenerDetails"=>$centerDetails);
		}else{
				$response = array("status" => "error", "msg" => "Centers Not Found");
		}

		return $response;
	}
//#################### List Centers End ####################//

//#################### user_activity  starts ####################//


  function user_activity($user_id,$activity_detail){

    $insert="INSERT INTO user_activity (user_id,activity_date,activity_detail) VALUES('$user_id',NOW(),'$activity_detail')";
    $res_insert = $this->db->query($insert);
    if($res_insert){
      $response = array("status" => "success", "msg" => "User Activity Inserted");
    }else{
        $response = array("status" => "error", "msg" => "Something Went Wrong");
    }
    	return $response;

  }

//#################### user_activity End ####################//


//#################### Admin Graph Details ####################//

        function admin_graph_details(){
          $query="SELECT CONCAT(SUBSTRING(DATE_FORMAT(`created_at`, '%M'),1,3),DATE_FORMAT(`created_at`,'-%Y')) as month, COUNT(*) as stu_count FROM edu_student_prospects WHERE PERIOD_DIFF(DATE_FORMAT(NOW(), '%Y%m'), DATE_FORMAT(`created_at`, '%Y%m'))<12 GROUP BY YEAR(`created_at`), MONTH(`created_at`)";
          $res=$this->db->query($query);
          if($res->num_rows()==0){
              $response = array("status" => "error", "msg" => "Something Went Wrong");
          }else{
            $result=$res->result();
            $response = array("status" => "success", "msg" => "Graph details here","graph_data"=>$result);
          }
          return $response;

         }


//#################### Admin Graph Details ####################//

//#################### Pia  Graph Details ####################//

    function pia_graph_details($pia_id){
  		$query="SELECT CONCAT(SUBSTRING(DATE_FORMAT(`created_at`, '%M'),1,3),DATE_FORMAT(`created_at`,'-%Y')) as month, COUNT(*) as stu_count FROM edu_student_prospects WHERE pia_id = '$pia_id' AND PERIOD_DIFF(DATE_FORMAT(NOW(), '%Y%m'), DATE_FORMAT(`created_at`, '%Y%m'))<12 GROUP BY YEAR(`created_at`), MONTH(`created_at`)";
  		$res=$this->db->query($query);
      if($res->num_rows()==0){
          $response = array("status" => "error", "msg" => "Something Went Wrong");
      }else{
        $result=$res->result();
        $response = array("status" => "success", "msg" => "Graph details here","graph_data"=>$result);
      }
      return $response;
     }
 //#################### Pia Graph Details ####################//




//#################### Document master list ####################//
 function document_master_list($user_id){
   $query="SELECT id,doc_name,doc_type,status FROM document_master WHERE status='Active'";
   $result=$this->db->query($query);
   if($result->num_rows()==0){
       $response = array("status" => "error", "msg" => "Something Went Wrong");
   }else{
     $res=$result->result();
     $response = array("status" => "success", "msg" => "Document list","doc_data"=>$res);
   }
   return $response;
 }
 //#################### Document master list ####################//


 //#################### Prospects Documents status ####################//

     function prospects_document_status($prospect_id){
       $query="SELECT dm.id,IFNULL(dd.prospect_student_id,'0') as selected,dm.doc_name,dm.doc_type from document_master as dm left join document_details as dd on dd.doc_master_id=dm.id and dd.status='Active' and dd.prospect_student_id='$prospect_id' where dm.status='Active'";
       $result=$this->db->query($query);
       if($result->num_rows()==0){
           $response = array("status" => "error", "msg" => "Something Went Wrong");
       }else{
         $res=$result->result();
         $response = array("status" => "success", "msg" => "Document list","doc_status"=>$res);
       }
       return $response;
     }

     //#################### Prospects Documents status ####################//




}
?>
