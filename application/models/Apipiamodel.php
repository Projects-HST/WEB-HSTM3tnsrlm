<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apipiamodel extends CI_Model {

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


//#################### Scheme ####################//
	public function listScheme ($pia_id)
	{
		$scheme_query = "SELECT * FROM edu_scheme_details WHERE status = 'Active'";
		$scheme_res = $this->db->query($scheme_query);
		 if($scheme_res->num_rows()>0){
			 foreach ($scheme_res->result() as $rows)
				{
				 $schemeDetails[]  = array(
						"scheme_id" => $rows->id,
						"scheme_name" => $rows->scheme_name,
						"scheme_info" => $rows->scheme_info,
						"scheme_video" => $rows->scheme_video,
				);
			}
				$response = array("status" => "success", "msg" => "Scheme Details","schemeDetails"=>$schemeDetails);
		}else{
				$response = array("status" => "error", "msg" => "Schemes Not Found");
		}
		
		return $response;
	}
//#################### Scheme End ####################//


//#################### Project Period ####################//
	public function projectPeriod($pia_id,$period_from,$period_to)
	{
            $sQuery = "INSERT INTO edu_year_duration (period_from,period_to,pia_id,status,created_by,created_at ) VALUES ('". $period_from . "','". $period_to . "','". $pia_id . "','Active','". $pia_id . "',now())";
			$period_create = $this->db->query($sQuery);

			$response = array("status" => "success", "msg" => "Project Period Created");
			return $response;
	}
//#################### Project Period End ####################//


//#################### Trade Creation ####################//
	public function createTrade($pia_id,$trade_name)
	{
            $sQuery = "INSERT INTO edu_trade (trade_name,pia_id,status,created_by,created_at ) VALUES ('". $trade_name . "','". $pia_id . "','Active','". $pia_id . "',now())";
			$trade_create = $this->db->query($sQuery);

			$response = array("status" => "success", "msg" => "Trade Created");
			return $response;
	}
//#################### Trade Creation End ####################//


//#################### Trade List ####################//
	public function listTrade ($pia_id)
	{
            $sQuery = "SELECT * FROM edu_trade WHERE pia_id = '$pia_id' AND status = 'Active'";
			$s_res = $this->db->query($sQuery);
			$s_result= $s_res->result();

			if($s_res->num_rows()>0){
			     	$response = array("status" => "success", "msg" => "Trade List","tradeList"=>$s_result);
			}else{
			        $response = array("status" => "error", "msg" => "Trade Not Found");
			}
			return $response;
	}
//#################### Trade List End ####################//


//#################### Center Creation ####################//
	public function createCenter($center_name,$center_info,$center_address,$pia_id)
	{
            $sQuery = "INSERT INTO edu_center_master (center_name,center_info,center_address,pia_id,status,created_by,created_at ) VALUES ('". $center_name . "','". $center_info . "','". $center_address . "','". $pia_id . "','Active','". $pia_id . "',now())";
			$center_create = $this->db->query($sQuery);
			$center_id = $this->db->insert_id();
			
			$response = array("status" => "success", "msg" => "Center Created","center_id"=>$center_id);
			return $response;
	}
//#################### Center Creation End ####################//



//#################### Center banner Update ####################//
	public function updateCenterBanner($center_id,$bannerName)
	{
            $update_sql= "UPDATE edu_center_master SET center_banner='$bannerName' WHERE id='$center_id'";
			$update_result = $this->db->query($update_sql);
			
			if ($this->db->affected_rows() > 0)
            {
                $response = array("status" => "success", "msg" => "Center Logo Updated","center_logo"=>$bannerName);
            } else {
                $response = array("status" => "error", "msg" => "Center Logo Not Updated");
            }

			return $response;
	}
//#################### Center banner Update End ####################//


//#################### Center photo Add ####################//
	public function addCenterPhotos ($center_id,$pia_id,$photoName)
	{
            $sQuery = "INSERT INTO edu_center_photos (center_id,pia_id,center_photos,status,created_by,created_at) VALUES ('". $center_id . "','". $pia_id . "','". $photoName . "','Active','". $pia_id . "',NOW())";
			$update_gcm = $this->db->query($sQuery);
			
			$response = array("status" => "success", "msg" => "Center Picture Added");
			return $response;
	}
//#################### Center photo Add End ####################//


//#################### Center Videos Add ####################//
	public function addCenterVideos ($center_id,$pia_id,$video_title,$video_link)
	{
            $sQuery = "INSERT INTO edu_center_videos (center_id,pia_id,video_title,center_videos,status,created_by,created_at) VALUES ('". $center_id . "','". $pia_id . "','". $video_title . "','". $video_link . "','Active','". $pia_id . "',NOW())";
			$update_gcm = $this->db->query($sQuery);
			
			$response = array("status" => "success", "msg" => "Center Video Added");
			return $response;
	}
//#################### Center Videos Add End ####################//

//#################### Center List ####################//
	public function centerList ($pia_id)
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

//#################### Center Details ####################//
	public function centerDetails ($pia_id,$center_id)
	{
		$center_query = "SELECT * FROM edu_center_master WHERE pia_id = '$pia_id' AND id='$center_id' AND status = 'Active'";
		$center_res = $this->db->query($center_query);
		 if($center_res->num_rows()>0){
			 foreach ($center_res->result() as $rows)
				{
				 $centerDetails[]  = array(
						"center_id" => $rows->id,
						"center_name" => $rows->center_name,
						"center_info" => $rows->center_info,
						"center_address" => $rows->center_address,
						"center_logo" => base_url().'assets/center/logo/'.$rows->center_banner,
				);
			}

				$response = array("status" => "success", "msg" => "Center Details","cenerDetails"=>$centerDetails);
		}else{
				$response = array("status" => "error", "msg" => "Centers Not Found");
		}
		
		return $response;
	}
//#################### Center Details End ####################//

//#################### Center Gallery ####################//
	public function centerGallery ($pia_id,$center_id)
	{
		$center_query = "SELECT * FROM edu_center_photos WHERE pia_id = '$pia_id' AND center_id='$center_id' AND status = 'Active'";
		$center_res = $this->db->query($center_query);
		 if($center_res->num_rows()>0){
			 foreach ($center_res->result() as $rows)
				{
				 $centerGallery[]  = array(
						"gallery_id" => $rows->id,
						"center_photo" => base_url().'assets/center/gallery/'.$rows->center_photos
				);
			}
				$response = array("status" => "success", "msg" => "Center Gallery","centerGallery"=>$centerGallery);
		}else{
				$response = array("status" => "error", "msg" => "Centers Not Found");
		}
		
		return $response;
	}
//#################### Center Gallery End ####################//

//#################### Center Gallery ####################//
	public function centerVideos ($pia_id,$center_id)
	{
		$center_query = "SELECT * FROM edu_center_videos WHERE pia_id = '$pia_id' AND center_id='$center_id' AND status = 'Active'";
		$center_res = $this->db->query($center_query);
		 if($center_res->num_rows()>0){
			 foreach ($center_res->result() as $rows)
				{
				 $centerVideos[]  = array(
						"video_id" => $rows->id,
						"video_title" => $rows->video_title,
						"video_url" => $rows->center_videos
				);
			}
				$response = array("status" => "success", "msg" => "Center Videos","centerVideos"=>$centerVideos);
		}else{
				$response = array("status" => "error", "msg" => "Videos Not Found");
		}
		
		return $response;
	}
	
//#################### Center Gallery End ####################//


//#################### Session Creation ####################//
	public function createSession($pia_id,$session_name,$from_time,$to_time)
	{
            $sQuery = "INSERT INTO edu_timing (session_name,from_time,to_time,pia_id,status,created_by,created_at ) VALUES ('". $session_name . "','". $from_time . "','". $to_time . "','". $pia_id . "','Active','". $pia_id . "',now())";
			$session_create = $this->db->query($sQuery);

			$response = array("status" => "success", "msg" => "Session Created");
			return $response;
	}
//#################### Session Creation End ####################//


//#################### Session List ####################//
	public function listSession ($pia_id)
	{
            $sQuery = "SELECT * FROM edu_timing WHERE pia_id = '$pia_id' AND status = 'Active'";
			$s_res = $this->db->query($sQuery);
			$s_result= $s_res->result();

			if($s_res->num_rows()>0){
			     	$response = array("status" => "success", "msg" => "Session List","sessionList"=>$s_result);
			}else{
			        $response = array("status" => "error", "msg" => "Session Not Found");
			}
			return $response;
	}
//#################### Session List End ####################//

//#################### Trade Batch Management ####################//
	public function tradeBatch($pia_id,$trade_id,$batch_id)
	{
            $sQuery = "INSERT INTO edu_trade_batch (trade_id,batch_id,pia_id,status,created_by,created_at ) VALUES ('". $trade_id . "','". $batch_id . "','". $pia_id . "','Active','". $pia_id . "',now())";
			$session_create = $this->db->query($sQuery);

			$response = array("status" => "success", "msg" => "Trade Batch Linked");
			return $response;
	}
//#################### Trade Batch Management End ####################//

//#################### Mobilization Plan ####################//
	public function mobilizationPlan($pia_id,$doc_name,$doc_month_year)
	{
            $sQuery = "INSERT INTO edu_mobilization_plan (doc_name,doc_month_year,pia_id,created_by,created_at,status) VALUES ('". $doc_name . "','". $doc_month_year . "','". $pia_id . "','". $pia_id . "',now(),'Active')";
			$plan_create = $this->db->query($sQuery);
			$plan_id = $this->db->insert_id();
			
			$response = array("status" => "success", "msg" => "Plan Added","plan_id"=>$plan_id);
			return $response;
	}
//#################### Mobilization Plan End ####################//


//#################### Mobilization Plan ####################//
	public function updatePlanDoc($plan_id,$docName)
	{
            $update_sql= "UPDATE edu_mobilization_plan SET doc_file ='$docName' WHERE id='$plan_id'";
			$update_result = $this->db->query($update_sql);
			
			$response = array("status" => "success", "msg" => "Document Upload","plan_doc"=>$docName);
			return $response;
	}
//#################### Mobilization Plan Update End ####################//


//#################### Plan List ####################//
	public function mobilizationPlanlist ($pia_id)
	{
		$plan_query = "SELECT * FROM edu_mobilization_plan WHERE pia_id = '$pia_id'";
		$plan_res = $this->db->query($plan_query);
		 if($plan_res->num_rows()>0){
			 foreach ($plan_res->result() as $rows)
				{
				 $planList[]  = array(
						"plan_id" => $rows->id,
						"doc_name" => $rows->doc_name,
						"doc_month_year" => $rows->doc_month_year,
						"doc_url" => base_url().'assets/mobilization_plan/'.$rows->doc_file 
				);
			}
				$response = array("status" => "success", "msg" => "Mobilization Plan","planDetails"=>$planList);
		}else{
				$response = array("status" => "error", "msg" => "Plans Not Found");
		}
		
		return $response;
	}
//#################### Plan List End ####################//

//#################### User Creation ####################//
	public function createUser($pia_id,$select_role,$name,$sex,$dob,$nationality,$religion,$community_class,$community,$address,$email,$sec_email,$phone,$sec_phone,$qualification)
	{
		$select = "SELECT * FROM edu_staff_details Where email='$email' OR phone='$phone'";
		$result=$this->db->query($select);
	   
		if($result->num_rows()>0){
			$response = array("status" => "error", "msg" => "User Already Exist");
         }else{
           $insert = "INSERT INTO edu_staff_details (pia_id,role_type,name,sex,dob,nationality,religion,community_class,community,address,email,sec_email ,phone,sec_phone,qualification,status,created_by,created_at) VALUES('$pia_id','$select_role','$name','$sex','$dob','$nationality','$religion','$community_class','$community','$address','$email','$sec_email','$phone','$sec_phone','$qualification','Active','$pia_id',NOW())";
           $result=$this->db->query($insert);
           $insert_id = $this->db->insert_id();
			
            $digits = 6;
			$OTP = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
			$md5pwd = md5($OTP);

			
            $user_table = "INSERT INTO edu_users (name,user_name,user_password,user_type,user_master_id,created_date,pia_id,status) VALUES('$name','$phone','$md5pwd','$select_role','$insert_id',NOW(),'$pia_id','Active')";
			$result_user=$this->db->query($user_table);
			$profile_id = $this->db->insert_id();

			if ($select_role == '5'){
				$mobile_message = 'Username :'. $phone .'Password:'.$OTP;
				$this->sendSMS($phone,$mobile_message);

				$subject = "M3 - User Details";
				$email_message = 'Username:'.$phone.'<br>Password:'.$OTP.'<br><br>';
				$this->sendMail($email,$subject,$email_message);
			}
			
			$response = array("status" => "success", "msg" => "User Created","profile_id"=>$profile_id);
		  }
			
			return $response;
	}
//#################### User Creation End ####################//

//#################### Profile Pic Update ####################//
	public function updateProfilepic($profile_id,$userFileName)
	{
            $update_sql= "UPDATE edu_users SET user_pic='$userFileName', updated_date=NOW() WHERE user_id='$profile_id'";
			$update_result = $this->db->query($update_sql);

			$response = array("status" => "success", "msg" => "Profile Picture Updated","user_picture"=>$userFileName);
			return $response;
	}
//#################### Profile Pic Update End ####################//


//#################### User List ####################//
	public function userList ($pia_id)
	{
			$sQuery = "SELECT A.user_id, A.user_master_id,A.name, A.user_name, B.user_type_name, A.status FROM edu_users A, edu_role B WHERE A.user_type = B.id AND A.pia_id='$pia_id'";
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

//#################### User List ####################//
	public function userListstaff ($pia_id)
	{
			$sQuery = "SELECT A.user_id, A.user_master_id,A.name, A.user_name, B.user_type_name, A.status FROM edu_users A, edu_role B WHERE A.user_type = B.id AND A.pia_id='$pia_id' AND A.user_type ='4'";
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

//#################### User List ####################//
	public function userListmobilizer ($pia_id)
	{
			$sQuery = "SELECT A.user_id, A.user_master_id,A.name, A.user_name, B.user_type_name, A.status FROM edu_users A, edu_role B WHERE A.user_type = B.id AND A.pia_id='$pia_id' AND A.user_type ='4'";
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
	public function userDetails ($pia_id,$user_master_id)
	{
			$sQuery = "SELECT * FROM edu_staff_details WHERE id = '$user_master_id' AND A.pia_id='$pia_id'";
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
	public function updateUser($pia_id,$user_master_id,$select_role,$name,$sex,$dob,$nationality,$religion,$community_class,$community,$address,$email,$sec_email,$phone,$sec_phone,$qualification,$status)
	{
			$sQuery = "SELECT * FROM edu_staff_details WHERE id = '$user_master_id' AND pia_id='$pia_id'";
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
					$update="UPDATE edu_staff_details SET name='$name',sex='$sex',address='$address',email='$email',sec_email='$sec_email',phone='$phone',sec_phone='$sec_phone',dob='$dob',nationality='$nationality',religion='$religion',community_class='$community_class',community='$community',
			qualification='$qualification',status='$status',updated_at=NOW(),updated_by='$pia_id' WHERE id='$user_master_id'";
					$result=$this->db->query($update);
					
					$update_user="UPDATE edu_users SET user_name = '$phone', name='$name' WHERE user_type='$select_role' AND user_master_id='$user_master_id'";
					$result_user=$this->db->query($update_user);
					
					if ($select_role == '5'){
						$mobile_message = 'Username :'. $phone;
						$this->sendSMS($phone,$mobile_message);

						$subject = "M3 - User Name Update";
						$email_message = 'Username:'.$phone.'<br><br>';
						$this->sendMail($email,$subject,$email_message);
					}
					$response = array("status" => "success", "msg" => "User Updated Successfully");
				}	
			
			} else {
				
					$update="UPDATE edu_staff_details SET name='$name',sex='$sex',address='$address',email='$email',sec_email='$sec_email',phone='$phone',sec_phone='$sec_phone',dob='$dob',nationality='$nationality',religion='$religion',community_class='$community_class',community='$community',
			qualification='$qualification',status='$status',updated_at=NOW(),updated_by='$pia_id' WHERE id='$user_master_id'";
					$result=$this->db->query($update);
			
					$update_user="UPDATE edu_users SET name='$name' WHERE user_type='$select_role' AND user_master_id='$user_master_id'";
					$result_user=$this->db->query($update_user);
					
					$response = array("status" => "success", "msg" => "User Updated Successfully");
			
			}
					
			return $response;
	}
//#################### User Update End ####################//

//#################### Add Student ####################//
	public function addStudent ($pia_id,$have_aadhaar_card,$aadhaar_card_number,$name,$sex,$dob,$age,$nationality,$religion,$community_class,$community,$father_name,$mother_name,$mobile,$sec_mobile,$email,$state,$city,$address,$mother_tongue,$disability,$blood_group,$admission_date,$admission_location,$admission_latitude,$admission_longitude,$preferred_trade,$preferred_timing,$last_institute,$last_studied,$qualified_promotion,$transfer_certificate,$status)
	{
        $chk_query = "SELECT * from edu_student_prospects WHERE aadhaar_card_number = '$aadhaar_card_number'";
		$chk_res = $this->db->query($chk_query);

			 if($chk_res->num_rows()>0){
			     	$response = array("status" => "error", "msg" => "Already Exist");
				 
			}else{
			        $student_query = "INSERT INTO `edu_student_prospects` (`pia_id `,`have_aadhaar_card`, `aadhaar_card_number`, `name`, `sex`, `dob`, `age`, `nationality`, `religion`, `community_class`, `community`, `father_name`, `mother_name`, `mobile`, `sec_mobile`, `email`, `state`, `city`, `address`, `mother_tongue`, `disability`, `blood_group`, `admission_date`, `admission_location`, `admission_latitude`, `admission_longitude`, `preferred_trade`, `preferred_timing`, `last_institute`, `last_studied`, `qualified_promotion`, `transfer_certificate`, `status`, `created_by`, `created_at`) VALUES ('$pia_id','$have_aadhaar_card', '$aadhaar_card_number', '$name', '$sex', '$dob', '$age', '$nationality', '$religion', '$community_class', '$community', '$father_name', '$mother_name', '$mobile', '$sec_mobile', '$email', '$state', '$city', '$address', '$mother_tongue', '$disability', '$blood_group', '$admission_date', '$admission_location', '$admission_latitude', '$admission_longitude', '$preferred_trade', '$preferred_timing', '$last_institute', '$last_studied', '$qualified_promotion', '$transfer_certificate', '$status', '$pia_id', now())";
	                $student_res = $this->db->query($student_query);
                    $student_id = $this->db->insert_id();
                    
                	if($student_res) {
        			    $response = array("status" => "success", "msg" => "Student Added", "admission_id"=>$student_id);
        			} else {
        			    $response = array("status" => "error");
        			}
			}  
			return $response;
	}
//#################### Add Student End ####################//


//#################### Student Pic Update ####################//
	public function studentPic($student_id,$userFileName)
	{
            $update_sql= "UPDATE edu_student_prospects SET student_pic ='$userFileName' WHERE id='$student_id'";
			$update_result = $this->db->query($update_sql);

			$response = array("status" => "success", "msg" => "Student Picture Updated","student_picture"=>$userFileName);
			return $response;
	}
//#################### Student Pic Update End ####################//

//#################### List Students ####################//
	public function listStudents($pia_id)
	{
		 	$student_query = "SELECT id,name,sex,mobile,email,enrollment,status FROM `edu_student_prospects` WHERE pia_id  ='$pia_id'";
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


//#################### List Students ####################//
	public function listStudentsStatus($pia_id,$status)
	{
		 	$student_query = "SELECT id,name,sex,mobile,email,enrollment,status FROM `edu_student_prospects` WHERE pia_id = '$pia_id' AND status = '$status'";
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

//#################### View Student ####################//
	public function viewStudent($student_id)
	{
		 	$student_query = "SELECT * FROM `edu_student_prospects` WHERE id ='$student_id'";
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
	public function updateStudent($student_id,$pia_id,$have_aadhaar_card,$aadhaar_card_number,$name,$sex,$dob,$age,$nationality,$religion,$community_class,$community,$father_name,$mother_name,$mobile,$sec_mobile,$email,$state,$city,$address,$mother_tongue,$disability,$blood_group,$admission_date,$admission_location,$admission_latitude,$admission_longitude,$preferred_trade,$preferred_timing,$last_institute,$last_studied,$qualified_promotion,$transfer_certificate,$status,$updated_by,$updated_at)
	{
		 	$student_query = "UPDATE `edu_student_prospects` SET `have_aadhaar_card`='$have_aadhaar_card',`aadhaar_card_number`='$aadhaar_card_number',`name`='$name',`sex`='$sex',`dob`='$dob',`age`='$age',`nationality`='$nationality',`religion`='$religion',`community_class`='$community_class',`community`='$community',`father_name`='$father_name',`mother_name`='$mother_name',`mobile`='$mobile',`sec_mobile`='$sec_mobile',`email`='$email',`state`='$state',`city`='$city',`address`='$address',`mother_tongue`='$mother_tongue',`disability`='$disability',`blood_group`='$blood_group',`admission_date`='$admission_date',`admission_location`='$admission_location',`admission_latitude`='$admission_latitude',`admission_longitude`='$admission_longitude',`preferred_trade`='$preferred_trade',`preferred_timing`='$preferred_timing',`last_institute`='$last_institute',`last_studied`='$last_studied',`qualified_promotion`='$qualified_promotion',`transfer_certificate`='$transfer_certificate',`status`='$status',`updated_by`='$pia_id',`updated_at`=now() WHERE id ='$student_id'";
			$student_res = $this->db->query($student_query);
			
			if($student_res) {
			    $response = array("status" => "success", "msg" => "Student Details Updated");
			}else{
				$response = array("status" => "error");
			}

			return $response;
	}
//#################### Update Student End ####################//

//#################### Add Task ####################//
	public function addTask ($user_master_id,$task_title,$task_description,$task_date,$pia_id)
	{
            $task_query = "INSERT INTO `edu_task` (`user_id`, `task_title`, `task_description`, `task_date`, `pia_id`, `status`, `created_by`, `created_at`) VALUES ('$user_master_id', '$task_title', '$task_description', '$task_date', '$pia_id', 'Assigned', '$pia_id', now())";
	        $task_res = $this->db->query($task_query);
            $task_id = $this->db->insert_id();
            
			$sQuery = "SELECT A.user_id, A.user_master_id,A.name,B.email FROM edu_users A, edu_staff_details B WHERE A.user_id = B.id AND A.user_id ='$user_master_id' AND A.user_type ='5'";
			$user_result = $this->db->query($sQuery);
			$ress = $user_result->result();
			if($user_result->num_rows()>0)
			{
				foreach ($user_result->result() as $rows)
				{
					$email = $rows->email;
				}
			}
			
			if($task_res) {
			    $response = array("status" => "success", "msg" => "Task Added", "task_id"=>$task_id);
			} else {
			    $response = array("status" => "error");
			}		

			$subject = "M3 - New Task Added";
			$email_message = 'Task Title:'.$task_title.'<br> Task Details:'.$task_description.'<br>';
			$this->sendMail($email,$subject,$email_message);

			return $response;
	}
//#################### Add Task End ####################//

//#################### List Task ####################//
	public function listTask ($user_id)
	{
            $task_query = "SELECT * FROM `edu_task` WHERE pia_id  ='$user_id'";
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
            $task_query = "SELECT * FROM `edu_task` WHERE id  ='$task_id'";
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
	public function updateTask($task_id,$pia_id,$task_title,$task_description,$task_date,$status)
	{
		 	$task_query = "UPDATE `edu_task` SET `task_title`='$task_description',`task_description`='$task_description',`task_date`='$task_date',`status`='$status',`updated_by`='$pia_id',`updated_at`=now() WHERE id ='$task_id'";
			$task_res = $this->db->query($task_query);
			
			if($task_res) {
			    $response = array("status" => "success", "msg" => "Task Details Updated");
			}else{
				$response = array("status" => "error");
			}

			return $response;
	}
//#################### Update Task End ####################//

//#################### User Tracking ####################//
	public function userTracking($mob_id,$track_date)
	{
		 $track_query = "SELECT etd.user_location AS address,etd.user_lat AS lat ,etd.user_long AS lng FROM edu_users AS eu LEFT JOIN edu_tracking_details AS etd ON eu.user_id=etd.user_id  WHERE eu.user_id='$mob_id'  AND DATE_FORMAT(created_at, '%Y-%m-%d')='$track_date' group by minute(created_at) ORDER BY created_at ASC";
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



}
?>
