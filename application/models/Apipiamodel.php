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
			
			$response = array("status" => "success", "msg" => "Center Logo Updated","center_logo"=>$bannerName);
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
						"center_info " => $rows->center_info,
						"center_address " => $rows->center_address,
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
           $insert = "INSERT INTO edu_staff_details (pia_id,role_type,name,sex,dob,nationality,religion,community_class,community,address,email,sec_email ,phone,sec_phone,qualification,status,created_by,created_at) VALUES('$pia_id,','$select_role','$name','$sex','$dob','$nationality','$religion','$community_class','$community','$address','$email','$sec_email','$phone','$sec_phone','$qualification','Active','$pia_id',NOW())";
           $result=$this->db->query($insert);
           $insert_id = $this->db->insert_id();
			
            $digits = 6;
			$OTP = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
			$md5pwd = md5($OTP);

			
            $user_table = "INSERT INTO edu_users (name,user_name,user_password,user_type,user_master_id,created_date,pia_id,status,last_login_date) VALUES('$name','$phone','$md5pwd','$select_role','$insert_id',NOW(),'$pia_id','Active',NOW())";
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
					  echo $old_phone = $rows->phone;
				}
			}

			if ($old_phone != $phone){
				
				$sQuery = "SELECT * FROM edu_staff_details WHERE id != '$user_master_id' AND phone='$phone'";
				$user_result = $this->db->query($sQuery);
				if($user_result->num_rows()>0)
				{
					$response = array("status" => "error", "msg" => "Phone number already exist.");
				} else {
					$update="UPDATE edu_staff_details SET name='
$name',sex='$sex',address='$address',email='$email',sec_email='$sec_email',phone='$phone',sec_phone='$sec_phone',dob='$dob',nationality='$nationality',religion='$religion',community_class='$community_class',community='$community',
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
}
?>
