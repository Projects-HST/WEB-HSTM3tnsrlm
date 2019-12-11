<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apimobilizermodel extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }


//#################### Email ####################//

	/* public function sendMail($to,$subject,$htmlContent)
	{
		// Set content-type header for sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		// Additional headers
		$headers .= 'From: happysanz<info@happysanz.com>' . "\r\n";
		mail($to,$subject,$htmlContent,$headers);
	} */

//#################### Email End ####################//


//#################### Email ####################//

	/* public function sendNotification($gcm_key,$Title,$Message)
	{

			require_once 'assets/notification/Firebase.php';
            require_once 'assets/notification/Push.php';

            $device_token = explode(",", $gcm_key);
            $push = null;

//        //first check if the push has an image with it
		    $push = new Push(
					$Title,
					$Message,
					'http://heylaapp.com/notification/images/events.jpg'
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



	} */

//#################### Notification End ####################//


//#################### SMS ####################//

	/* public function sendSMS($Phoneno,$Message)
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
	} */

//#################### SMS End ####################//


//#################### Current Year ####################//

	/* public function getYear()
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
	} */
//#################### Current Year End ####################//



//#################### Login ####################//

	/* public function Login($username,$password,$gcmkey,$mobiletype)
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
				      $user_picurl = base_url().'assets/staff/profile/'.$user_pic;
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

				 	 	$response = array("status" => "loggedIn", "msg" => "User loggedIn successfully", "userData" => $userData);
						return $response;
				  }
				  else if ($user_type==4) {

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
	} */

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
	/* public function changePassword($user_id,$old_password,$password)
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
	} */
//#################### Change Password End ####################//



    function user_profile($user_id){
      $sQuery = "SELECT es.*,eu.user_pic FROM edu_users as eu
      left join edu_staff_details  as es on es.id=eu.user_master_id where eu.user_type=5 and eu.user_id='$user_id'";
      $s_res = $this->db->query($sQuery);
      $s_result= $s_res->result();

      if($s_res->num_rows()>0){
              foreach($s_result as $rows){}
                if(empty($rows->user_pic)){
                  $url='';

                }else{
                  $url=base_url().'assets/staff/profile/'.$rows->user_pic;
                }
                $user_profile=array(
                  "id"=>$rows->id,
                  "name"=>$rows->name,
                  "address"=>$rows->address,
                  "phone"=>$rows->phone,
                  "email"=>$rows->email,
                  "profile_pic"=>$url,
                );
            $response = array("status" => "success", "msg" => "User profile","userprofile"=>$user_profile);
      }else{
              $response = array("status" => "error", "msg" => "Users Not Found");
      }
      return $response;
    }




    function user_profile_update($id,$address,$email){
      $update="UPDATE edu_staff_details SET address='$address',email='$email',updated_by='$id',updated_at=NOW() WHERE id='$id'";
      $s_res = $this->db->query($update);
      if($s_res){
            $response = array("status" => "success", "msg" => "User profile updated successfully");
      }else{
              $response = array("status" => "error", "msg" => "Something Went wrong");
      }
      return $response;
    }

//#################### Select Trade ####################//
	public function Selecttrade($user_id,$pia_id)
	{
	        $trade_query = "SELECT id,trade_name from edu_trade WHERE pia_id='$pia_id' AND status = 'Active'";
			$trade_res = $this->db->query($trade_query);

			 if($trade_res->num_rows()>0){
			     	$trade_result= $trade_res->result();
			     	$response = array("status" => "success", "msg" => "View Trades","Trades"=>$trade_result);

			}else{
			        $response = array("status" => "error", "msg" => "Trade not found");
			}

			return $response;
	}
//#################### Select Trade End ####################//

//#################### Select Batch ####################//
	public function Selectbatch($trade_id,$pia_id)
	{
	        $batch_query = "SELECT A.id,B.batch_name from edu_trade_batch A, edu_batch B WHERE A.trade_id = '$trade_id' AND A.batch_id = B.id AND A.pia_id = '$pia_id' AND A.status = 'Active'";
			$batch_res = $this->db->query($batch_query);

			 if($batch_res->num_rows()>0){
			     	$batch_result= $batch_res->result();
			     	$response = array("status" => "success", "msg" => "View Batches","Batches"=>$batch_result);

			}else{
			        $response = array("status" => "error", "msg" => "Batches not found");
			}

			return $response;
	}
//#################### Select Trade End ####################//

//#################### Select Timing ####################//
	public function Selecttimings($user_id)
	{
	        $time_query = "SELECT id,session_name,from_time,to_time from edu_timing WHERE status = 'Active'";
			$time_res = $this->db->query($time_query);

			 if($time_res->num_rows()>0){
			     	$time_result= $time_res->result();
			     	$response = array("status" => "success", "msg" => "View Timings","Timings"=>$time_result);

			}else{
			        $response = array("status" => "error", "msg" => "Timings not found");
			}

			return $response;
	}
//#################### Select Timing End ####################//

//#################### Select Blood group ####################//
	public function Selectbloodgroup($user_id)
	{
	        $bgroup_query = "SELECT id,blood_group_name from edu_blood_group WHERE status = 'Active'";
			$bgroup_res = $this->db->query($bgroup_query);

			 if($bgroup_res->num_rows()>0){
			     	$bgroup_result= $bgroup_res->result();
			     	$response = array("status" => "success", "msg" => "View Trades","Bloodgroup"=>$bgroup_result);

			}else{
			        $response = array("status" => "error", "msg" => "Blood group not found");
			}

			return $response;
	}
//#################### Select Blood group End ####################//


//#################### Add Student ####################//
	public function addStudent ($pia_id,$have_aadhaar_card,$aadhaar_card_number,$name,$sex,$dob,$age,$nationality,$religion,$community_class,$community,$father_name,$mother_name,$mobile,$sec_mobile,$email,$state,$city,$address,$mother_tongue,$disability,$blood_group,$admission_date,$admission_location,$admission_latitude,$admission_longitude,$preferred_trade,$preferred_timing,$last_institute,$last_studied,$qualified_promotion,$transfer_certificate,$status,$created_by,$created_at)
	{
	        $chk_query = "SELECT * from edu_student_prospects WHERE aadhaar_card_number = '$aadhaar_card_number'";
			$chk_res = $this->db->query($chk_query);

			 if($chk_res->num_rows()>0){
			     	$response = array("status" => "error", "msg" => "Already Exist");

			}else{
			        $student_query = "INSERT INTO edu_student_prospects (pia_id,have_aadhaar_card, aadhaar_card_number, name, sex, dob, age, nationality, religion, community_class, community, father_name, mother_name, mobile, sec_mobile, email, state, city, address, mother_tongue, disability, blood_group, admission_date, admission_location, admission_latitude, admission_longitude, preferred_trade, preferred_timing, last_institute, last_studied, qualified_promotion, transfer_certificate, status, created_by, created_at) VALUES ('$pia_id','$have_aadhaar_card', '$aadhaar_card_number', '$name', '$sex', '$dob', '$age', '$nationality', '$religion', '$community_class', '$community', '$father_name', '$mother_name', '$mobile', '$sec_mobile', '$email', '$state', '$city', '$address', '$mother_tongue', '$disability', '$blood_group', '$admission_date', '$admission_location', '$admission_latitude', '$admission_longitude', '$preferred_trade', '$preferred_timing', '$last_institute', '$last_studied', '$qualified_promotion', '$transfer_certificate', '$status', '$created_by', '$created_at')";
	                $student_res = $this->db->query($student_query);
                    $admission_id = $this->db->insert_id();

                	if($student_res) {
        			    $response = array("status" => "success", "msg" => "Student Added", "admission_id"=>$admission_id);
        			} else {
        			    $response = array("status" => "error");
        			}
			}
			return $response;
	}
//#################### Add Student End ####################//


//#################### Student Pic Update ####################//
	public function studentPic($admission_id,$userFileName)
	{
            $update_sql= "UPDATE edu_student_prospects SET student_pic ='$userFileName', updated_at =NOW() WHERE id='$admission_id'";
			$update_result = $this->db->query($update_sql);

			$response = array("status" => "success", "msg" => "Student Picture Updated","student_picture"=>$userFileName);
			return $response;
	}
//#################### Student Pic Update End ####################//


//#################### List Students ####################//
	public function listStudents($user_id)
	{
		 	$student_query = "SELECT id,name,sex,mobile,email,enrollment,status,student_pic FROM edu_student_prospects WHERE created_by  ='$user_id'";
			$student_res = $this->db->query($student_query);
			$query_result= $student_res->result();
			$student_count = $student_res->num_rows();

			 if($student_res->num_rows()==0){
				 $response = array("status" => "error", "msg" => "Students Not Found");
			}else{
        foreach($query_result as $rows_list){
          if(empty($rows_list->student_pic)){
            $student_pic='';
          }else{
            $student_pic=base_url().'assets/students/'.$rows_list->student_pic;
          }

          $student_result[]=array(
            "id"=>$rows_list->id,
            "name"=>$rows_list->name,
            "sex"=>$rows_list->sex,
            "mobile"=>$rows_list->mobile,
            "email"=>$rows_list->email,
            "enrollment"=>$rows_list->enrollment,
            "status"=>$rows_list->status,
            "student_pic"=>$student_pic,


          );
        }
				$response = array("status" => "success", "msg" => "View student list", "count" => $student_count, "studentList"=>$student_result);
			}
			return $response;
	}
//#################### List Students End ####################//


//#################### List Students ####################//
	public function listStudentsStatus($user_id,$status)
	{
		 	$student_query = "SELECT id,name,sex,mobile,email,enrollment,status,student_pic FROM edu_student_prospects WHERE created_by = '$user_id' AND status = '$status'";
			$student_res = $this->db->query($student_query);
			$query_result= $student_res->result();
			$student_count = $student_res->num_rows();

			 if($student_res->num_rows()==0){
				 $response = array("status" => "error", "msg" => "Students Not Found");
			}else{

        foreach($query_result as $rows_list){
          if(empty($rows_list->student_pic)){
            $student_pic='';
          }else{
            $student_pic=base_url().'assets/students/'.$rows_list->student_pic;
          }

          $student_result[]=array(
            "id"=>$rows_list->id,
            "name"=>$rows_list->name,
            "sex"=>$rows_list->sex,
            "mobile"=>$rows_list->mobile,
            "email"=>$rows_list->email,
            "enrollment"=>$rows_list->enrollment,
            "status"=>$rows_list->status,
            "student_pic"=>$student_pic,


          );
        }
				$response = array("status" => "success", "msg" => "View student list", "count" => $student_count, "studentList"=>$student_result);
			}
			return $response;
	}
//#################### List Students End ####################//


//#################### View Student ####################//
	public function viewStudent($admission_id)
	{
		 	$student_query = "SELECT * FROM edu_student_prospects WHERE id ='$admission_id'";
			$student_res = $this->db->query($student_query);
			$student_result= $student_res->result();

			 if($student_res->num_rows()==0){
				 $response = array("status" => "error", "msg" => "Students Not Found");
			}else{
				$response = array("status" => "success", "msg" => "View Events", "studentDetails"=>$student_result);
			}

			return $response;
	}
//#################### View Student End ####################//

//#################### Update Student ####################//
	public function updateStudent($admission_id,$have_aadhaar_card,$aadhaar_card_number,$name,$sex,$dob,$age,$nationality,$religion,$community_class,$community,$father_name,$mother_name,$mobile,$sec_mobile,$email,$state,$city,$address,$mother_tongue,$disability,$blood_group,$admission_date,$admission_location,$admission_latitude,$admission_longitude,$preferred_trade,$preferred_timing,$last_institute,$last_studied,$qualified_promotion,$transfer_certificate,$status,$updated_by,$updated_at)
	{
		 	$student_query = "UPDATE edu_student_prospects SET have_aadhaar_card='$have_aadhaar_card',aadhaar_card_number='$aadhaar_card_number',name='$name',sex='$sex',dob='$dob',age='$age',nationality='$nationality',religion='$religion',community_class='$community_class',community='$community',father_name='$father_name',mother_name='$mother_name',mobile='$mobile',sec_mobile='$sec_mobile',email='$email',state='$state',city='$city',address='$address',mother_tongue='$mother_tongue',disability='$disability',blood_group='$blood_group',admission_date='$admission_date',admission_location='$admission_location',admission_latitude='$admission_latitude',admission_longitude='$admission_longitude',preferred_trade='$preferred_trade',preferred_timing='$preferred_timing',last_institute='$last_institute',last_studied='$last_studied',qualified_promotion='$qualified_promotion',transfer_certificate='$transfer_certificate',status='$status',updated_by='$updated_by',updated_at='$updated_at' WHERE id ='$admission_id'";
			$student_res = $this->db->query($student_query);

			if($student_res) {
			    $response = array("status" => "success", "msg" => "Student Details Updated");
			}else{
				$response = array("status" => "error");
			}

			return $response;
	}
//#################### Update Student End ####################//


//#################### View Center ####################//
	public function centerDetails($user_id,$pia_id)
	{
		 	$center_query = "SELECT * FROM edu_center_master WHERE pia_id = '$pia_id'";
			$center_res = $this->db->query($center_query);
			$center_result= $center_res->result();

			if($center_res->num_rows()>0)
			    {
			        foreach($center_result as $rows){
						$center_id = $rows->id;
					}

    				$centerData  = array(
    					"center_id" => $center_result[0]->id,
    					"center_name" => $center_result[0]->center_name,
    					"center_banner" => base_url().'assets/center/logo/'.$center_result[0]->center_banner,
    					"center_info" => $center_result[0]->center_info,
    					//"center_info" => strip_tags($center_result[0]->center_info,"<b><strong><em>"),
    					"center_address" => $center_result[0]->center_address
    				);

            		$photo_query = "SELECT center_photos FROM edu_center_photos WHERE center_id = '$center_id'  AND status  ='Active' ORDER BY id DESC LIMIT 4 ";
        			$photo_res = $this->db->query($photo_query);
        				if($photo_res->num_rows()>0){
            			    foreach ($photo_res->result() as $rows)
        			        {
        				        $photo_result[]  = array(
        						   "center_photos" => base_url().'assets/center/gallery/'.$rows->center_photos
        				        );
        			         }
        				} else {
        				    $photo_result = array();
        				}

        			$video_query = "SELECT video_title,center_videos FROM edu_center_videos WHERE center_id = '$center_id'  AND status  ='Active' ORDER BY id DESC LIMIT 4 ";
        			$video_res = $this->db->query($video_query);
        				if($video_res->num_rows()>0){
            			    foreach ($video_res->result() as $rows)
        			        {
        				        $video_result[]  = array(
        						   "video_title" => $rows->video_title,
        						   "video_url" => $rows->center_videos
        				        );
        			         }
        				} else {
        				    $video_result = array();
        				}

        			$staff_query = "SELECT name,profile_pic FROM edu_staff_details WHERE role_type ='4' AND pia_id='$pia_id'  AND status ='Active' ORDER BY id DESC LIMIT 4 ";
        			$staff_res = $this->db->query($staff_query);
        				if($staff_res->num_rows()>0){
            			    foreach ($staff_res->result() as $rows)
        			        {
        				        $staff_result[]  = array(
        						   "name" => $rows->name,
        						   "profile_pic" => base_url().'assets/staff/'.$rows->profile_pic
        				        );
        			         }
        				} else {
        				    $staff_result = array();
        				}

        			$trade_query = "SELECT trade_name FROM edu_trade WHERE pia_id='$pia_id' AND status  ='Active' ORDER BY id DESC LIMIT 4 ";
        			$trade_res = $this->db->query($trade_query);
        			    if($trade_res->num_rows()>0){
            			    foreach ($trade_res->result() as $rows)
        			        {
        				        $trade_result[]  = array(
        						   "trade_name" => $rows->trade_name
        				        );
        			         }
        				} else {
        				    $trade_result = array();
        				}

        			$sstory_query = "SELECT details,story_video FROM edu_success_stories WHERE center_id = '$center_id' AND status  ='Active' ORDER BY id DESC LIMIT 4 ";
        			$sstory_res = $this->db->query($sstory_query);
        			    if($sstory_res->num_rows()>0){
            			    foreach ($sstory_res->result() as $rows)
        			        {
        				        $sstory_result[]  = array(
        						   "storydetails" => $rows->details,
        						    "storyvideo" => $rows->story_video
        				        );
        			         }
        				} else {
        				    $sstory_result = array();
        				}

    		        $response = array("status" => "Sucess", "msg" => "Center Details", "centerData" => $centerData,"Photo" => $photo_result,"video" => $video_result,"trainer" => $staff_result,"trade" => $trade_result,"stories" => $sstory_result);

			    } else {
			        $response = array("status" => "error", "msg" => "Center not found.");
			    }

			return $response;
	}
//#################### View Center Details End ####################//


//#################### View Center Images ####################//
	public function centerImages($center_id)
	{
            $photo_query = "SELECT center_photos FROM edu_center_photos WHERE center_id = '$center_id'  AND status  ='Active' ORDER BY id DESC";
            $photo_res = $this->db->query($photo_query);
            	if($photo_res->num_rows()>0){
            	    foreach ($photo_res->result() as $rows)
                    {
            	        $photo_result[]  = array(
            			   "center_photos" => base_url().'assets/center/gallery/'.$rows->center_photos
            	        );
                     }
                     $response = array("status" => "Sucess", "msg" => "Center Details", "Photo" => $photo_result);
            	} else {
            	   $response = array("status" => "error", "msg" => "Center not found.");
            	}

			return $response;
	}
//#################### View Center Images End ####################//


//#################### View Center Videos ####################//
	public function centerVideos($center_id)
	{
			$video_query = "SELECT video_title,center_videos FROM edu_center_videos WHERE center_id = '$center_id'  AND status  ='Active' ORDER BY id DESC";
			$video_res = $this->db->query($video_query);
				if($video_res->num_rows()>0){
    			    foreach ($video_res->result() as $rows)
			        {
				        $video_result[]  = array(
						   "video_title" => $rows->video_title,
						   "video_url" => $rows->center_videos
				        );
			         }
			         $response = array("status" => "Sucess", "msg" => "Center Videos", "Videos" => $video_result);
				} else {
				    $response = array("status" => "error", "msg" => "Videos not found.");
				}

			return $response;
	}
//#################### View Center Videos End ####################//

//#################### View Trainers ####################//
	public function viewTrainers($center_id)
	{
            $staff_query = "SELECT name,sex,dob,nationality,religion,community_class,address,email,sec_email,phone,profile_pic,trade_batch_id,qualification FROM edu_staff_details WHERE role_type ='3'  AND status  ='Active' ORDER BY id";
    		$staff_res = $this->db->query($staff_query);
    			if($staff_res->num_rows()>0){
    			    foreach ($staff_res->result() as $rows)
    		        {
    			        $staff_result[]  = array(
    					   "name" => $rows->name,
    					   "sex" => $rows->sex,
    					   "dob" => $rows->dob,
    					   "nationality" => $rows->nationality,
    					   "religion" => $rows->religion,
    					   "community_class" => $rows->community_class,
    					   "address" => $rows->address,
    					   "email" => $rows->email,
    					   "sec_email" => $rows->sec_email,
    					   "phone" => $rows->phone,
    					   "trade_batch_id" => $rows->trade_batch_id,
    					   "qualification" => $rows->qualification,
    					   "profile_pic" => base_url().'assets/staff/'.$rows->profile_pic
    			        );
    		         }
    		          $response = array("status" => "Sucess", "msg" => "Trainer Details", "Trainerdetails" => $staff_result);
    			} else {
    			    $response = array("status" => "error", "msg" => "Trainers not found.");
    			}

			return $response;
	}
//#################### View Trainers End ####################//

//#################### View Sucess Strories ####################//
	public function viewSucessstory($center_id)
	{
            $sstory_query = "SELECT details,story_video FROM edu_success_stories WHERE center_id = '$center_id' AND status  ='Active' ORDER BY id DESC";
            $sstory_res = $this->db->query($sstory_query);
            	    if($sstory_res->num_rows()>0){
            		    foreach ($sstory_res->result() as $rows)
            	        {
            		        $sstory_result[]  = array(
            				   "storydetails" => $rows->details,
            				    "storyvideo" => $rows->story_video
            		        );
            	         }
            	        $response = array("status" => "Sucess", "msg" => "Sucess Story Details", "Storydetails" => $sstory_result);
            		} else {
            		     $response = array("status" => "error", "msg" => "Sucess Story not found.");
            		}
            return $response;
	}
//#################### View Sucess Strories End ####################//



//#################### Circular for All ####################//
	public function dispCircular($user_id)
	{
			$year_id = $this->getYear();

			 $circular_query = "SELECT
                                A.circular_type,
                                B.circular_title,
                                B.circular_description,
                                A.circular_date
                            FROM
                                edu_circular A,
                                edu_circular_master B
                            WHERE
                                A.user_id = '$user_id' AND B.academic_year_id = '$year_id' AND A.circular_master_id = B.id AND A.status = 'Active'";

			$circular_res = $this->db->query($circular_query);
			$circular_result= $circular_res->result();

			 if($circular_res->num_rows()==0){
				 $response = array("status" => "error", "msg" => "Circular Not Found");
			}else{
				$response = array("status" => "success", "msg" => "View Circular", "circularDetails"=>$circular_result);
			}
			return $response;
	}
//#################### Circular End ####################//


//#################### Add Task ####################//
	public function addTask ($user_id,$pia_id,$task_title,$task_description,$task_date,$status)
	{
            $task_query = "INSERT INTO edu_task (user_id, task_title, task_description, task_date, pia_id, status, created_by, created_at) VALUES ('$user_id', '$task_title', '$task_description', '$task_date', '$pia_id', '$status', '$user_id', now())";
	        $task_res = $this->db->query($task_query);
            $task_id = $this->db->insert_id();

			if($task_res) {
			    $response = array("status" => "success", "msg" => "Task Added", "task_id"=>$task_id);
			} else {
			    $response = array("status" => "error");
			}
			return $response;
	}
//#################### Add Task End ####################//

//#################### List Task ####################//
	public function listTask ($user_id)
	{
            $task_query = "SELECT * FROM edu_task WHERE user_id  ='$user_id'";
			$task_res = $this->db->query($task_query);
			$task_result= $task_res->result();

			 if($task_res->num_rows()==0){
				 $response = array("status" => "error", "msg" => "Task Not Found");
			}else{
				$response = array("status" => "success", "msg" => "List Task", "taskDetails"=>$task_result);
			}

			return $response;
	}
//#################### Add List End ####################//

//#################### List Task ####################//
	public function viewTask ($task_id)
	{

            $task_query = "SELECT * FROM edu_task WHERE id  ='$task_id'";
			$task_res = $this->db->query($task_query);
			$task_result= $task_res->result();

			 if($task_res->num_rows()==0){
				 $response = array("status" => "error", "msg" => "Task Not Found");
			}else{
				$response = array("status" => "success", "msg" => "View Task", "taskDetails"=>$task_result);
			}

			return $response;
	}
//#################### Add List End ####################//

//#################### Update Task ####################//
	public function updateTask($task_id,$user_id,$task_title,$task_description,$task_date,$status,$updated_by,$updated_at)
	{
		 	$task_query = "UPDATE edu_task SET task_title='$task_title',task_description='$task_description',task_date='$task_date',status='$status',updated_by='$updated_by',updated_at='$updated_at' WHERE id ='$task_id'";
			$task_res = $this->db->query($task_query);

			if($task_res) {
			    $response = array("status" => "success", "msg" => "Task Details Updated");
			}else{
				$response = array("status" => "error");
			}

			return $response;
	}
//#################### Update Task End ####################//


//#################### Task Pic Add ####################//
	public function taskPic($task_id,$task_pic)
	{
           $task_query = "INSERT INTO edu_task_photos (task_id, task_image) VALUES ('$task_id','$task_pic')";
	        $task_res = $this->db->query($task_query);
            $task_id = $this->db->insert_id();

			$response = array("status" => "success", "msg" => "Task Picture Added","task_picture"=>$task_pic);
			return $response;
	}
//#################### Task Pic Add End ####################//


//#################### Task Pic List  ####################//
	public function listTaskpic($task_id)
	{
           $pic_query = "SELECT * FROM edu_task_photos WHERE task_id = '$task_id' ORDER BY id DESC";
           $pic_res = $this->db->query($pic_query);
        	    if($pic_res->num_rows()>0){
        		    foreach ($pic_res->result() as $rows)
        	        {
        		        $pic_result[]  = array(
        				    "id" => $rows->id,
        				    "task_id" => $rows->task_id,
        				    "task_image" => base_url().'assets/task/'.$rows->task_image,
        		        );
        	         }
        	        $response = array("status" => "Sucess", "msg" => "Task Pictures", "Taskpictures" => $pic_result);
        		} else {
        		     $response = array("status" => "error", "msg" => "Task Pictures not found.");
        		}
            return $response;
	}
//#################### Task Pic List End ####################//

//#################### Task Pic Delete ####################//
	public function deleteTaskpic($pic_id)
	{
           $pic_query = "SELECT * FROM edu_task_photos WHERE id = '$pic_id' LIMIT 1";
           $pic_res = $this->db->query($pic_query);
        	    if($pic_res->num_rows()>0){
    	            foreach ($pic_res->result() as $rows)
		            {
			            $task_image = $rows->task_image;
	        	    }

        	        if (file_exists('./assets/task/'.$task_image)) {
                        unlink('./assets/task/'.$task_image);
                    }

                	$sQuery = "DELETE FROM edu_task_photos WHERE id  = '" .$pic_id. "'";
			        $delete_pic = $this->db->query($sQuery);

        	        $response = array("status" => "Sucess", "msg" => "Task Picture Deleted");
        		} else {
        		     $response = array("status" => "error", "msg" => "Task Pictures not found.");
        		}
            return $response;
	}
//#################### Task Pic Delete End ####################//

//#################### Add Mobilizer Location ####################//
	/* public function addMobilocation($user_id,$latitude,$longitude,$location,$location_datetime)
	{
            $location_query = "INSERT INTO edu_tracking_details (user_id,user_lat,user_long,user_location,created_at) VALUES ('$user_id','$latitude','$longitude','$location','$location_datetime')";
	        $location_res = $this->db->query($location_query);
            $location_id = $this->db->insert_id();

			if($location_res) {
			    $response = array("status" => "success", "msg" => "Location Added", "location_id"=>$location_id);
			} else {
			    $response = array("status" => "error");
			}
			return $response;
	} */
//#################### Mobilizer Location End ####################//

//#################### Add Mobilizer Location ####################//
	public function addMobilocation($user_id,$latitude,$longitude,$location,$miles,$location_datetime,$pia_id)
	{
            $dt = strtotime($location_datetime); //make timestamp with datetime string
            $chk_date = date("Y-m-d", $dt); //echo the year of the datestamp just created

	       $user_query = "SELECT * FROM edu_tracking_details WHERE user_id = '$user_id' AND date(created_at) = '$chk_date' ORDER BY id DESC LIMIT 1";
           $user_result = $this->db->query($user_query);
           $user_res = $user_result->result();

        	    if($user_result->num_rows()>0){
        		   foreach($user_res as $rows){
						$to_latitude = $rows->to_lat;
						$to_longitude = $rows->to_long;
					}

        	        $location_query = "INSERT INTO edu_tracking_details (user_id,user_lat,user_long,user_location,to_lat,to_long,miles,created_at,pia_id) VALUES ('$user_id','$to_latitude','$to_longitude','$location','$latitude','$longitude','$miles','$location_datetime','$pia_id')";
	                $location_res = $this->db->query($location_query);
        	        $response = array("status" => "Sucess", "msg" => "Location Added");
        		} else {

        		    $location_query = "INSERT INTO edu_tracking_details (user_id,user_lat,user_long,user_location,to_lat,to_long,miles,created_at,pia_id) VALUES ('$user_id','$latitude','$longitude','$location','$latitude','$longitude','$miles','$location_datetime','$pia_id')";
	                $location_res = $this->db->query($location_query);
        		    $response = array("status" => "Sucess", "msg" => "Location Added");
        		}

			return $response;
	}
//#################### Mobilizer Location End ####################//


}
?>
