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


//#################### Admin Dashboard ####################//

    function pia_dashboard($user_id){
      $mob_count = "SELECT * FROM edu_staff_details WHERE role_type = '5' AND pia_id='$user_id'";
      $mob_count_res = $this->db->query($mob_count);
      $mobilizer_count = $mob_count_res->num_rows();

      $cen_count = "SELECT * FROM edu_center_master WHERE pia_id='$user_id'";
      $cen_count_res = $this->db->query($cen_count);
      $center_count = $cen_count_res->num_rows();

      $stu_count = "SELECT * FROM edu_student_prospects WHERE pia_id='$user_id'";
      $stu_count_res = $this->db->query($stu_count);
      $student_count = $mob_count_res->num_rows();

      $dashboardData  = array(
          "mobilizer_count" => $mobilizer_count,
          "center_count" => $center_count,
          "student_count" => $student_count

        );
      $response = array("status" => "success", "msg" => "Pia Dashboard details","dashboardData"=>$dashboardData);
      return $response;
    }

//#################### Admin Dashboard ####################//



//#################### Scheme ####################//
	function listScheme($pia_id)
	{
		$scheme_query = "SELECT * FROM edu_scheme_details WHERE status = 'Active'";
		$scheme_res = $this->db->query($scheme_query);
		 if($scheme_res->num_rows()>0){
			 foreach ($scheme_res->result() as $rows)
				{
				 $schemeDetails[] = array(
						"scheme_id" => $rows->id,
						"scheme_name" => $rows->scheme_name,

				    );
        }

				$response = array("status" => "success", "msg" => "Scheme Details","schemeDetails"=>$schemeDetails);
		}else{
				$response = array("status" => "error", "msg" => "Schemes Not Found");
		}

		return $response;
	}
//#################### Scheme End ####################//

//#################### Scheme ####################//
	function scheme_details($pia_id,$scheme_id)
	{
		$scheme_query = "SELECT * FROM edu_scheme_details WHERE status = 'Active' and id='$scheme_id'";
		$scheme_res = $this->db->query($scheme_query);
		 if($scheme_res->num_rows()>0){
			 foreach ($scheme_res->result() as $rows)
				{
				 $schemeDetails = array(
						"scheme_id" => $rows->id,
						"scheme_name" => $rows->scheme_name,
						"scheme_info" => $rows->scheme_info,
						"scheme_video" => $rows->scheme_video,
				);
			}
				$response_details = array("status" => "success", "msg" => "Scheme Details","schemeDetails"=>$schemeDetails);
		}else{
				$response_details = array("status" => "error", "msg" => "Schemes Not Found");
		}


    $scheme_query_gallery = "SELECT * FROM edu_scheme_photos WHERE scheme_id='$scheme_id' and status = 'Active'";
		$scheme_res_gallery = $this->db->query($scheme_query_gallery);
		 if($scheme_res_gallery->num_rows()>0){
			 foreach ($scheme_res_gallery->result() as $rows_gallery)
				{


				 $sch_photo[]  = array(
						"gallery_id" => $rows_gallery->id,
						"scheme_photo" => base_url().'assets/scheme/'.$rows_gallery->scheme_photo,
				);
			}
				$response_photos = array("status" => "success", "msg" => "Scheme photos","scheme_gallery"=>$sch_photo);
		}else{
				$response_photos = array("status" => "error", "msg" => "Schemes Not Found");
		}

    $response=array("status"=>"success","scheme_details"=>$response_details,"scheme_photo"=>$response_photos,"msg"=>"scheme data");



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

//#################### Project Period List ####################//
	public function projectPeriodlist($pia_id)
	{
			$sQuery = "SELECT * FROM edu_year_duration WHERE pia_id = '$pia_id'";
			$s_res = $this->db->query($sQuery);
			$s_result= $s_res->result();

			if($s_res->num_rows()>0){
			     	$response = array("status" => "success", "msg" => "Project Period List","PeriodList"=>$s_result);
			}else{
			        $response = array("status" => "error", "msg" => "Project Period Not Found");
			}
			return $response;
	}
//#################### Project Period List End ####################//

//#################### Trade Creation ####################//
	public function createTrade($pia_id,$trade_name,$status)
	{
      $sQuery = "INSERT INTO edu_trade (trade_name,pia_id,status,created_by,created_at ) VALUES ('". $trade_name . "','". $pia_id . "','$status','". $pia_id . "',now())";
			$trade_create = $this->db->query($sQuery);
      if($trade_create){
        $response = array("status" => "success", "msg" => "Trade Created");
      }else{
        $response = array("status" => "error", "msg" => "Something went wrong");

      }
			return $response;
	}
//#################### Trade Creation End ####################//

//#################### Trade Creation ####################//
  public function update_trade($pia_id,$trade_name,$status,$trade_id)
  {
      $update="UPDATE edu_trade SET trade_name='$trade_name',status='$status' WHERE id='$trade_id' and pia_id='$pia_id'";
      $result = $this->db->query($update);
      if($result){
        $response = array("status" => "success", "msg" => "Trade Updated");

      }else{
        $response = array("status" => "error", "msg" => "Something went wrong");

      }
      return $response;
  }
//#################### Trade Creation End ####################//

//#################### Trade List ####################//
	public function listTrade ($pia_id)
	{
            //$sQuery = "SELECT * FROM edu_trade WHERE pia_id = '$pia_id' AND status = 'Active'";
			$sQuery = "SELECT * FROM edu_trade WHERE pia_id = '$pia_id'";
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
		$center_query = "SELECT * FROM edu_center_master WHERE id='$center_id' AND status = 'Active'";
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

//#################### Center Details Update ####################//

  function update_center_details($center_id,$center_name,$center_info,$center_address,$pia_id){
    $center_query = "UPDATE edu_center_master SET center_name='$center_name',center_info='$center_info',center_address='$center_address',updated_by='$pia_id',updated_at=NOW() WHERE id='$center_id'";
		$res = $this->db->query($center_query);
    if($res){
      	$response = array("status" => "success", "msg" => "Center Details Update successfully");
    }else{
      	$response = array("status" => "error", "msg" => "Something went wrong!");
    }
    	return $response;

  }
  //#################### Center Details Update ####################//


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
				$response = array("status" => "error", "msg" => "No photo found");
		}

		return $response;
	}
//#################### Center Gallery End ####################//


//#################### Center Gallery Delete ####################//

  function center_gallery_delete($gallery_id){
    $query="DELETE FROM edu_center_photos WHERE id='$gallery_id'";
    $result=$this->db->query($query);
    if($result){
      	$response = array("status" => "success", "msg" => "Successfully deleted!");
    }else{
      	$response = array("status" => "error", "msg" => "Something went wrong!");
    }
    	return $response;
  }

//#################### Center Gallery Delete ####################//


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
//#################### Center Gallery  Video Delete ####################//

  function center_video_delete($video_id){
    $query="DELETE FROM edu_center_videos WHERE id='$video_id'";
    $result=$this->db->query($query);
    if($result){
      	$response = array("status" => "success", "msg" => "Successfully deleted!");
    }else{
      	$response = array("status" => "error", "msg" => "Something went wrong!");
    }
    	return $response;
  }

//#################### Center Gallery  Video Delete ####################//

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

	public function mobilizationPlan($pia_id,$doc_name,$doc_month_year,$doc_filename)
	{
            $sQuery = "INSERT INTO edu_mobilization_plan (doc_name,doc_file,doc_month_year,pia_id,created_by,created_at,status) VALUES ('". $doc_name . "','". $doc_filename . "','". $doc_month_year . "','". $pia_id . "','". $pia_id . "',now(),'Active')";
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
		// $plan_query = "SELECT * FROM edu_mobilization_plan WHERE pia_id = '$pia_id'";
    $plan_query="SELECT mp.*,eu.name as uploaded_by FROM edu_mobilization_plan as mp
    left join edu_users as eu on eu.user_id=mp.created_by
    WHERE  mp.pia_id = '$pia_id'";
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
	public function createUser($pia_id,$select_role,$name,$sex,$dob,$nationality,$religion,$community_class,$community,$address,$email,$sec_email,$phone,$sec_phone,$qualification,$status)
	{
		$select = "SELECT * FROM edu_staff_details Where email='$email' OR phone='$phone'";
		$result=$this->db->query($select);

		if($result->num_rows()>0){
			$response = array("status" => "error", "msg" => "User Already Exist");
         }else{
           $insert = "INSERT INTO edu_staff_details (pia_id,role_type,name,sex,dob,nationality,religion,community_class,community,address,email,sec_email ,phone,sec_phone,qualification,status,created_by,created_at) VALUES('$pia_id','$select_role','$name','$sex','$dob','$nationality','$religion','$community_class','$community','$address','$email','$sec_email','$phone','$sec_phone','$qualification','$status','$pia_id',NOW())";
           $result=$this->db->query($insert);
           $insert_id = $this->db->insert_id();

            $digits = 6;
			$OTP = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
			$md5pwd = md5($OTP);


            $user_table = "INSERT INTO edu_users (name,user_name,user_password,user_type,user_master_id,created_date,pia_id,status) VALUES('$name','$phone','$md5pwd','$select_role','$insert_id',NOW(),'$pia_id','$status')";
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
			$sQuery = "SELECT * FROM edu_staff_details WHERE id = '$user_master_id' AND pia_id='$pia_id'";
			$s_res = $this->db->query($sQuery);
			$s_result= $s_res->result();

			if($s_res->num_rows()>0){
			     	$response = array("status" => "success", "msg" => "User List","userList"=>$s_result);
			}else{
			        $response = array("status" => "error", "msg" => "Users Not Found");
			}
			return $response;
	}


  function user_profile($user_id){
    $sQuery = "SELECT ep.*,eu.user_pic FROM edu_users as eu
    left join edu_pia  as ep on ep.id=eu.user_master_id where eu.user_type=3 and eu.user_id='$user_id'";
    $s_res = $this->db->query($sQuery);
    $s_result= $s_res->result();

    if($s_res->num_rows()>0){
            foreach($s_result as $rows){}
              if(empty($rows->user_pic)){
                $url='';

              }else{
                $url=base_url().'assets/profile/'.$rows->user_pic;
              }
              $user_profile=array(
                "pia_id"=>$rows->id,
                "scheme_id"=>$rows->scheme_id,
                "pia_name"=>$rows->pia_name,
                "pia_address"=>$rows->pia_address,
                "pia_phone"=>$rows->pia_phone,
                "pia_email"=>$rows->pia_email,
                "pia_profile_pic"=>$url,
              );
          $response = array("status" => "success", "msg" => "User profile","userprofile"=>$user_profile);
    }else{
            $response = array("status" => "error", "msg" => "Users Not Found");
    }
    return $response;
  }
//#################### User Details End ####################//



    function user_profile_update($user_id,$pia_phone,$pia_name,$pia_address,$pia_email,$pia_id){
      $update="UPDATE edu_pia SET pia_name='$pia_name',pia_phone='$pia_phone',pia_address='$pia_address',pia_email='$pia_email',updated_by='$user_id',updated_at=NOW() WHERE id='$pia_id'";
      $s_res = $this->db->query($update);
      if($s_res){
            $response = array("status" => "success", "msg" => "User profile updated successfully");
      }else{
              $response = array("status" => "error", "msg" => "Something Went wrong");
      }
      return $response;
    }

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

					  $update_user="UPDATE edu_users SET user_name = '$phone', name='$name',status='$status' WHERE user_type='$select_role' AND user_master_id='$user_master_id'";
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


         $update_user="UPDATE edu_users SET name='$name',status='$status' WHERE user_type='$select_role' AND user_master_id='$user_master_id'";

        $result_user=$this->db->query($update_user);

					$response = array("status" => "success", "msg" => "User Updated Successfully");

			}

			return $response;
	}
//#################### User Update End ####################//


//#################### Add Student ####################//
	public function addStudent ($pia_id,$have_aadhaar_card,$aadhaar_card_number,$name,$sex,$dob,$age,$nationality,$religion,$community_class,$community,$father_name,$mother_name,$mobile,$sec_mobile,$email,$state,$city,$address,$mother_tongue,$disability,$blood_group,$admission_date,$admission_location,$admission_latitude,$admission_longitude,$preferred_trade,$preferred_timing,$last_institute,$last_studied,$qualified_promotion,
  $transfer_certificate,$status,$father_mobile,$mother_mobile,$qualification,$qualification_details,$year_of_edu,$year_of_pass,$identification_mark_1,$identification_mark_2,$lang_known,$head_family_name,$head_family_edu,$no_family,$yearly_income,$jobcard_type)
	{
        $chk_query = "SELECT * from edu_student_prospects WHERE aadhaar_card_number = '$aadhaar_card_number'";
		      $chk_res = $this->db->query($chk_query);

			 if($chk_res->num_rows()>0){
			     	$response = array("status" => "error", "msg" => "Already Exist");

			}else{
			        $student_query = "INSERT INTO edu_student_prospects (pia_id,have_aadhaar_card, aadhaar_card_number, name, sex, dob, age, nationality, religion, community_class, community, father_name, mother_name, mobile, sec_mobile, email, state, city, address, mother_tongue, disability, blood_group, admission_date, admission_location, admission_latitude, admission_longitude, preferred_trade, preferred_timing, last_institute, last_studied, qualified_promotion, edu_certificate, status, created_by, created_at,father_mobile,mother_mobile,qualification,qualification_details,year_of_edu,year_of_pass,identification_mark_1,identification_mark_2,lang_known,head_family_name,head_family_edu,no_family,yearly_income,jobcard_type) VALUES ('$pia_id','$have_aadhaar_card', '$aadhaar_card_number', '$name', '$sex', '$dob', '$age', '$nationality', '$religion', '$community_class', '$community', '$father_name', '$mother_name', '$mobile', '$sec_mobile', '$email', '$state','$city', '$address', '$mother_tongue', '$disability', '$blood_group', '$admission_date', '$admission_location', '$admission_latitude', '$admission_longitude', '$preferred_trade', '$preferred_timing', '$last_institute','$last_studied', '$qualified_promotion', '$transfer_certificate', '$status', '$pia_id', NOW(),'$father_mobile','$mother_mobile','$qualification','$qualification_details','$year_of_edu','$year_of_pass','$identification_mark_1','$identification_mark_2','$lang_known','$head_family_name','$head_family_edu','$no_family','$yearly_income','$jobcard_type')";
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
		 	$student_query = "SELECT id,name,sex,mobile,email,enrollment,status,student_pic FROM edu_student_prospects WHERE pia_id  ='$pia_id'";
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
	public function listStudentsStatus($pia_id,$status)
	{
		 	$student_query = "SELECT id,name,sex,mobile,email,enrollment,status,student_pic FROM edu_student_prospects WHERE pia_id = '$pia_id' AND status = '$status'";
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
	public function viewStudent($student_id)
	{
		 	$student_query = "SELECT * FROM edu_student_prospects WHERE id ='$student_id'";
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
	public function updateStudent($student_id,$pia_id,$have_aadhaar_card,$aadhaar_card_number,$name,$sex,$dob,$age,$nationality,$religion,$community_class,$community,$father_name,$mother_name,$mobile,$sec_mobile,$email,$state,$city,$address,$mother_tongue,$disability,$blood_group,$admission_date,$admission_location,$admission_latitude,$admission_longitude,$preferred_trade,$preferred_timing,$last_institute,$last_studied,
  $qualified_promotion,$transfer_certificate,$status,$father_mobile,$mother_mobile,$qualification,$qualification_details,$year_of_edu,$year_of_pass,$identification_mark_1,$identification_mark_2,$lang_known,$head_family_name,$head_family_edu,$no_family,$yearly_income,$jobcard_type)
	{
		 	$student_query = "UPDATE edu_student_prospects SET have_aadhaar_card='$have_aadhaar_card',aadhaar_card_number='$aadhaar_card_number',name='$name',sex='$sex',dob='$dob',age='$age',nationality='$nationality',religion='$religion',community_class='$community_class',community='$community',father_name='$father_name',mother_name='$mother_name',mobile='$mobile',sec_mobile='$sec_mobile',email='$email',state='$state',city='$city',address='$address',mother_tongue='$mother_tongue',disability='$disability',blood_group='$blood_group',admission_date='$admission_date',admission_location='$admission_location',admission_latitude='$admission_latitude',admission_longitude='$admission_longitude',preferred_trade='$preferred_trade',preferred_timing='$preferred_timing',last_institute='$last_institute',last_studied='$last_studied',qualified_promotion='$qualified_promotion',edu_certificate='$transfer_certificate',status='$status',updated_by='$pia_id',updated_at=NOW(),father_mobile='$father_mobile',mother_mobile='$mother_mobile',qualification='$qualification',qualification_details='$qualification_details',year_of_edu='$year_of_edu',year_of_pass='$year_of_pass',identification_mark_1='$identification_mark_1',identification_mark_2='$identification_mark_2',lang_known='$lang_known',head_family_name='$head_family_name',head_family_edu='$head_family_edu',no_family='$no_family',yearly_income='$yearly_income',jobcard_type='$jobcard_type' WHERE id ='$student_id'";
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
            $task_query = "INSERT INTO edu_task (user_id, task_title, task_description, task_date, pia_id, status, created_by, created_at) VALUES ('$user_master_id', '$task_title', '$task_description', '$task_date', '$pia_id', 'Assigned', '$pia_id', now())";
	        $task_res = $this->db->query($task_query);
            $task_id = $this->db->insert_id();

			//$sQuery = "SELECT A.user_id, A.user_master_id,A.name,B.email FROM edu_users A, edu_staff_details B WHERE A.user_id = B.id AND A.user_id ='$user_master_id' AND A.user_type ='5'";

				$sQuery = "SELECT
					A.user_id,
					A.user_master_id,
					A.name,
					B.email
				FROM
					edu_users A,
					edu_staff_details B
				WHERE
					A.user_id = '$user_master_id' AND A.user_type = '5' AND A.user_master_id = B.id";
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
	    // $task_query = "SELECT B.id as task_id, B.task_title, B.task_description, B.task_date, B.status, A.name as assigned_to FROM edu_users A, edu_task B WHERE A.user_id = B.user_id AND B.pia_id ='$user_id'";
      $task_query="SELECT et.*,u.user_type,u.name as assigned_to,eu.name as assigned_from FROM edu_task as et
      left join edu_users as u on u.user_id=et.user_id
      left join edu_users as eu on eu.user_id=et.created_by
      where et.pia_id='$user_id'";
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
	public function updateTask($task_id,$pia_id,$task_title,$task_description,$task_date,$status)
	{
		 	$task_query = "UPDATE edu_task SET task_title='$task_description',task_description='$task_description',task_date='$task_date',status='$status',updated_by='$pia_id',updated_at=now() WHERE id ='$task_id'";
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

		    $track_query = "SELECT etd.user_location AS address,etd.user_lat AS lat ,etd.user_long AS lng FROM edu_users AS eu LEFT JOIN edu_tracking_details AS etd ON eu.user_id=etd.user_id  WHERE eu.user_id='$mob_id' AND DATE_FORMAT(created_at, '%Y-%m-%d')='$track_date' ORDER BY created_at ASC";
			$track_res = $this->db->query($track_query);
			$track_result= $track_res->result();

			 if($track_res->num_rows()==0){
				 $res = array("status" => "error", "msg" => "Track Not Found");
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

				$res = array("status" => "success", "msg" => "Trackinng Details", "trackingDetails"=>$address, "Distance"=>$km_distance_calc);
			}


      $select="SELECT
        etd.id,
        etd.user_id,
        etd.tracking_status,
        etd.user_location AS address,
        etd.user_lat AS lat,
        etd.user_long AS lng,
        DATE_FORMAT(etd.created_at, '%h:%s %p') as start_stop_time
      FROM  edu_users AS eu
      LEFT JOIN edu_tracking_details AS etd
      ON  eu.user_id = etd.user_id
      WHERE eu.user_id = '$mob_id' AND DATE_FORMAT(etd.created_at, '%Y-%m-%d') = '$track_date' AND (etd.tracking_status = 'Start' OR etd.tracking_status='Stop')
      ORDER BY id";
      $get_result=$this->db->query($select);
      if($get_result->num_rows()==0){
        $res_start=array("status"=>"error","msg" => "Track Not Found");
      }else{
        $res_start=array("status"=>"success","msg" => "Tracking Found","start_stop_data"=>$get_result->result());
      }
      $response=array("status"=>"success","msg" => "Tracking Found","tracking_status"=>$res,"start_stop_status"=>$res_start);
			return $response;

	}
//#################### User Tracking End ####################//
  //#################### Mobilizer Tracking Report ####################//

  function mobilizier_tracking_report($mob_id,$frmdate,$tdate){
    if($tdate < $frmdate){
      $response = array("status" => "error", "msg" => "End date cannot be lesser than start date!.");
    }else{
      $select="SELECT user_id,DATE_FORMAT(created_at,'%d-%m-%Y') AS created_at,Round(sum((6371 * ACOS(
                COS( RADIANS(to_lat) )
              * COS( RADIANS( user_lat ) )
              * COS( RADIANS( user_long ) - RADIANS(to_long) )
              + SIN( RADIANS(to_lat) )
              * SIN( RADIANS( user_lat ) )
            ) )),2) AS km
        FROM edu_tracking_details WHERE
          user_id = '$mob_id' AND DATE_FORMAT(created_at, '%Y-%m-%d') >= '$frmdate' AND DATE_FORMAT(created_at, '%Y-%m-%d') <= '$tdate' GROUP BY DATE_FORMAT(created_at, '%Y-%m-%d')";
          $get_result=$this->db->query($select);
          $result= $get_result->result();
          if($get_result->num_rows()==0){
            $response = array("status" => "error", "msg" => "Track Not Found");
          }else{
            $response = array("status" => "success", "msg" => "Tracking record Found","tracking_report"=>$result);
          }
    }

        	return $response;

  }
  //#################### Mobilizer Tracking Report ####################//


//#################### Current User Tracking ####################//
	public function userTrackingCurrent($mob_id,$track_date)
	{
			//$track_query = "SELECT id,etd.user_location AS address,etd.user_lat AS lat ,etd.user_long AS lng FROM edu_users AS eu LEFT JOIN edu_tracking_details AS etd ON eu.user_id=etd.user_id  WHERE eu.user_id='$mob_id'  AND DATE_FORMAT(created_at, '%Y-%m-%d')='$track_date' group by minute(created_at) ORDER BY created_at DESC LIMIT 1";
			$track_query = "SELECT id,etd.user_location AS address,etd.user_lat AS lat ,etd.user_long AS lng FROM edu_users AS eu LEFT JOIN edu_tracking_details AS etd ON eu.user_id=etd.user_id  WHERE eu.user_id='$mob_id'  AND DATE_FORMAT(created_at, '%Y-%m-%d')='$track_date' ORDER BY created_at DESC LIMIT 1";
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
				$response = array("status" => "success", "msg" => "Trackinng Details", "trackingDetails"=>$address);
			}

			return $response;

	}
//#################### Current User Tracking End ####################//

//#################### Upload Documents upload ####################//

    function document_details_upload($user_id,$documentFileName,$doc_master_id,$prospect_id,$proof_number){

      $query="INSERT INTO document_details (prospect_student_id,doc_master_id,doc_proof_number,file_name,status,created_at,created_by) VALUES('$prospect_id','$doc_master_id','$proof_number','$documentFileName','Active',NOW(),'$user_id')";
      $result = $this->db->query($query);
			if($result) {
			    $response = array("status" => "success", "msg" => "Document uploaded","doc_file_name"=>$documentFileName);
			}else{
				$response = array("status" => "Check the file size and the format.");
			}

			return $response;


    }
//#################### Upload Documents upload ####################//


//#################### Prospects Document  ####################//

function prospects_document($prospect_id){
  $query="SELECT dd.id,dd.doc_proof_number,dd.file_name,dd.doc_master_id,dd.status,dm.doc_name,dm.doc_type FROM document_details as dd left join document_master as dm on dm.id=dd.doc_master_id  where dd.status='Active' and dd.prospect_student_id='$prospect_id' GROUP BY dd.doc_master_id";
  $result=$this->db->query($query);
  if($result->num_rows()==0){
      $response = array("status" => "error", "msg" => "Unable to process the file!");
  }else{
    $res=$result->result();
    foreach($res as $rows){
      $doc_list[]=array(
        'id'=>$rows->id,
        'doc_proof_number'=>$rows->doc_proof_number,
        'file_name'=> base_url().'assets/documents/'.$rows->file_name,
        'doc_master_id'=>$rows->doc_master_id,
        'doc_name'=>$rows->doc_name,
        'doc_type'=>$rows->doc_type,
        'status'=>$rows->status,
      );
    }

    $response = array("status" => "success", "msg" => "Document list","doc_data"=>$doc_list);
  }
  return $response;
}
//#################### Prospects Document  ####################//

//#################### Update Documents upload ####################//

    function document_details_update($user_id,$userFileName,$doc_master_id,$prospect_id,$proof_number,$id){

      $query="UPDATE document_details SET file_name='$userFileName',doc_proof_number='$proof_number',updated_by='$user_id',updated_at=NOW() WHERE prospect_student_id='$prospect_id' AND id='$id'";
      $result = $this->db->query($query);
			if($result) {
			    $response = array("status" => "success", "msg" => "Document Updated","doc_file_name"=>$userFileName);
			}else{
				$response = array("status" => "Check the file size and the format.");
			}

			return $response;


    }
//#################### Update Documents upload ####################//
//#################### Work Master  ####################//
	public function work_type_master($user_id)
	{
      $query = "SELECT id,work_type,status FROM work_type_master WHERE status='Active'";
			$res = $this->db->query($query);
			$result= $res->result();
			 if($res->num_rows()==0){
				 $response = array("status" => "error", "msg" => "Work Master Not Found");
			}else{

				$response = array("status" => "success", "msg" => "Work Master", "result"=>$result);
			}
			return $response;

	}
  //#################### Work Master  ####################//

//#################### Attendance task update ####################//

    function add_attendance_task($mobilizer_id,$task_type,$task_id,$attendance_date,$title,$comments,$status,$user_id,$created_at){
      $date=date_create($attendance_date);
      $atten_date= date_format($date,"Y-m-d");
      $query="INSERT INTO mobilizer_attendance(mobilizer_id,pia_id,work_type_id,task_id,title,comments,attendance_date,status,created_at,created_by) VALUES('$mobilizer_id','$user_id','$task_type','$task_id','$title','$comments','$atten_date','Active',NOW(),'$user_id')";
      $result = $this->db->query($query);

      if($result) {
			    $response = array("status" => "success", "msg" => "task added");
			}else{
				$response = array("status" => "error");
			}

			return $response;
    }


//#################### Attendance task update ####################//


//#################### List Attendance task update ####################//

  function list_attendance_task($mobilizer_id){
    $query="SELECT ma.id,wtm.work_type,ma.task_id,ma.title,ma.comments,ma.work_type_id,ma.attendance_date,ma.status,IFNULL(et.task_title,'') as task_title FROM mobilizer_attendance as ma
    left join edu_task as et on et.id=ma.task_id
    left join work_type_master as wtm on wtm.id=ma.work_type_id
    where mobilizer_id='$mobilizer_id'";
    $res = $this->db->query($query);
    $result= $res->result();
     if($res->num_rows()==0){
       $response = array("status" => "error", "msg" => "Attendance list Not Found");
    }else{

      $response = array("status" => "success", "msg" => "Attendance list found", "result"=>$result);
    }
    return $response;

  }

  //#################### List Attendance task update ####################//

  //#################### Get Attendance task details ####################//

  function get_attendance_task_detail($attendance_id){
    $query="SELECT ma.id,wtm.work_type,ma.task_id,ma.title,ma.comments,ma.work_type_id,ma.attendance_date,ma.status,IFNULL(et.task_title,'') as task_title FROM mobilizer_attendance as ma
    left join edu_task as et on et.id=ma.task_id
    left join work_type_master as wtm on wtm.id=ma.work_type_id
    where  ma.id='$attendance_id'";
    $res = $this->db->query($query);
    $result= $res->result();
     if($res->num_rows()==0){
       $response = array("status" => "error", "msg" => "Attendance list not  found");
    }else{
      $response = array("status" => "success", "msg" => "Attendance list", "result"=>$result);
    }
    return $response;
  }
  //#################### Get Attendance task details ####################//


  //#################### Get Attendance task details update ####################//

  function update_attendance_task($mobilizer_id,$task_type,$task_id,$attendance_date,$title,$comments,$status,$user_id,$updated_at,$attendance_id){
    $query="UPDATE mobilizer_attendance SET work_type_id='$task_type',task_id='$task_id',title='$title',comments='$comments',status='$status',updated_at='$updated_at',updated_by='$user_id' where id='$attendance_id'";
    $res = $this->db->query($query);
   if($res){
         $response = array("status" => "success", "msg" => "Attendance details updated");
    }else{
      $response = array("status" => "error", "msg" => "Something went wrong!");
    }
    return $response;
  }
  //#################### Get Attendance task details update ####################//



  //#################### get mobilizer task list ####################//

    function get_task_list_for_mobilizer($mobilizer_user_id,$user_id,$attendance_date){
      $date=date_create($attendance_date);
      $atten_date= date_format($date,"Y-m-d");
      $query="SELECT id,task_title FROM edu_task  where task_date='$atten_date' and created_by='$user_id' and user_id='$mobilizer_user_id'";
      $res = $this->db->query($query);
      	$result= $res->result();
      if($res->num_rows()==0){
        $response = array("status" => "error", "msg" => "Task list not found");
     }else{

       $response = array("status" => "success", "msg" => "Task found", "result"=>$result);
     }
     return $response;
    }

 //#################### get mobilizer task list ####################//


 //#################### get mobilizer  list ####################//

   function get_list_mobilizer_for_pia($user_id){
     $query="SELECT esd.id,esd.name,eu.user_id as mobilizer_user_id,eu.status FROM edu_staff_details as esd left join edu_users as eu on eu.user_master_id=esd.id and eu.user_type=5  where esd.pia_id='$user_id' and esd.role_type=5 and eu.status='Active'";
     $res = $this->db->query($query);
       $result= $res->result();
     if($res->num_rows()==0){
       $response = array("status" => "error", "msg" => "Mobilizer list not found");
    }else{

      $response = array("status" => "success", "msg" => "Mobilizer found", "result"=>$result);
    }
    return $response;

   }
 //#################### get mobilizer  list ####################//


 //#################### get year list attendance ####################//

    function get_year_list_attendance($mobilizer_id,$user_id){
      $query="SELECT YEAR(attendance_date) as year_id FROM mobilizer_attendance where mobilizer_id='$mobilizer_id' GROUP by year_id";
      $res = $this->db->query($query);
        $result= $res->result();
      if($res->num_rows()==0){
        $response = array("status" => "error", "msg" => "Mobilizer year list not found");
     }else{

       $response = array("status" => "success", "msg" => "Mobilizer found", "result"=>$result);
     }
     return $response;
    }

//#################### get year list attendance ####################//

 //#################### get mobilizer  month list ####################//

      function get_month_list_attendance($mobilizer_id,$user_id,$year_id){
        $query="SELECT MONTHNAME(attendance_date) as month_name,Month(attendance_date) as month_id
        FROM mobilizer_attendance where mobilizer_id='$mobilizer_id' and year(attendance_date)='$year_id' GROUP by month_id";
        $res = $this->db->query($query);
          $result= $res->result();
        if($res->num_rows()==0){
          $response = array("status" => "error", "msg" => "attendance month list not found");
       }else{

         $response = array("status" => "success", "msg" => "attendance month found", "result"=>$result);
       }
       return $response;
      }

      //#################### get mobilizer  month list ####################//

      //#################### get mobilizer  month based attendance list ####################//
      function get_month_day_list_attendance($mobilizer_id,$user_id,$month_id){
        $query="SELECT ma.*,wtm.work_type,IFNULL(et.task_title,'') as task_title FROM mobilizer_attendance as ma
        left join work_type_master as wtm on wtm.id=ma.work_type_id
        left join edu_task as et on et.id=ma.task_id
        where ma.mobilizer_id='$mobilizer_id' and Month(attendance_date)='$month_id' order by ma.attendance_date ASC";
        $res = $this->db->query($query);
          $result= $res->result();
        if($res->num_rows()==0){
          $response = array("status" => "error", "msg" => "Mobilizer task list not found");
       }else{

         $response = array("status" => "success", "msg" => "Mobilizer task found", "result"=>$result);
       }
       return $response;
      }
      //#################### get mobilizer  month based attendance list ####################//


      //#################### get mobilizer  month based attendance list ####################//
      function get_month_attendance_report($mobilizer_id,$user_id,$month_id,$year_id){
         $query="SELECT  wm.work_type,COUNT(ma.work_type_id) as count from work_type_master as wm left join mobilizer_attendance as ma on ma.work_type_id=wm.id and  ma.mobilizer_id='$mobilizer_id' and Month(ma.attendance_date)='$month_id' GROUP by wm.id";
        $res = $this->db->query($query);
        $result=$res->result();


        $query_km="SELECT et.user_id,Round(sum((6371 * ACOS(
                COS( RADIANS(to_lat) )
              * COS( RADIANS( user_lat ) )
              * COS( RADIANS( user_long ) - RADIANS(to_long) )
              + SIN( RADIANS(to_lat) )
              * SIN( RADIANS( user_lat ) )
            ) )),2) AS km
        FROM edu_tracking_details as et left join edu_users as eu on eu.user_id=et.user_id WHERE eu.user_id='$mobilizer_id' and eu.user_type='5' AND Month(et.created_at)='$month_id' and year(et.created_at)='$year_id'";

          $res_km = $this->db->query($query_km);
          if($res_km->num_rows()==0){
            $km_res='0';
          }else{
            $result_km= $res_km->result();
            foreach($result_km as $rows_km){}
              if($rows_km->km='NULL'){
                $km_res='0';
              }else{
                $km_res=$rows_km->km;
              }
          }




        if($res->num_rows()==0){
          $response = array("status" => "error", "msg" => "Mobilizer work report not found");
       }else{

         $response = array("status" => "success", "msg" => "Mobilizer work report found", "result"=>$result,"km_result"=>$km_res);
       }
       return $response;
      }
      //#################### get mobilizer  month based attendance list ####################//



      //#################### attendance day report details ####################//

      function get_month_day_report_details($mobilizer_id,$user_id,$attendance_id){
        $query="SELECT ma.id,wtm.work_type,ma.mobilizer_comments,ma.task_id,ma.title,ma.comments,ma.work_type_id,ma.attendance_date,ma.status,IFNULL(et.task_title,'') as task_title,ma.created_at,ma.updated_at FROM mobilizer_attendance as ma
        left join edu_task as et on et.id=ma.task_id
        left join work_type_master as wtm on wtm.id=ma.work_type_id
        where  ma.id='$attendance_id'";
        $res = $this->db->query($query);
         if($res->num_rows()==0){
           $response_attedance = array("status" => "error", "msg" => "Attendance details not  found");
        }else{
          $result= $res->result();

          foreach($result as $rows_details){}
            $attendance_details=array(
              "id"=>$rows_details->id,
              "work_type"=>$rows_details->work_type,
              "task_id"=>$rows_details->task_id,
              "title"=>$rows_details->title,
              "comments"=>$rows_details->comments,
              "mobilizer_comments"=>$rows_details->mobilizer_comments,
              "work_type_id"=>$rows_details->work_type_id,
              "attendance_date"=>$rows_details->attendance_date,
              "status"=>$rows_details->status,
              "task_title"=>$rows_details->task_title,
              "created_at"=>$rows_details->created_at,
              "updated_at"=>$rows_details->updated_at,
            );
          $response_attedance = array("status" => "success", "msg" => "Attendance details", "result"=>$attendance_details);
        }


        $query_photo="SELECT * FROM edu_task_photos where task_id='$attendance_id'";
        $res_photo = $this->db->query($query_photo);

         if($res_photo->num_rows()==0){
           $field_work_details_report = array("status" => "error", "msg" => "Field work images not  found");
        }else{
          $result_photo= $res_photo->result();
          foreach($result_photo as $rows){
            $field_work_details[]=array(
              "id"=>$rows->id,
              "task_id"=>$rows->task_id,
              "task_image" => $rows->task_image,
              "task_lat"=>$rows->task_lat,
              "task_long"=>$rows->task_long,
              "task_location"=>$rows->task_location,
              "created_at"=>$rows->created_at,
            );

          }

          $field_work_details_report = array("status" => "success", "msg" => "Field work images", "result_field"=>$field_work_details);
        }



        $km_query="SELECT et.user_id,Round(sum((6371 * ACOS(
                COS( RADIANS(to_lat) )
              * COS( RADIANS( user_lat ) )
              * COS( RADIANS( user_long ) - RADIANS(to_long) )
              + SIN( RADIANS(to_lat) )
              * SIN( RADIANS( user_lat ) )
            ) )),2) AS km
        FROM edu_tracking_details as et left join edu_users as eu on eu.user_id=et.user_id WHERE eu.user_id='$mobilizer_id' and DATE(created_at)='$rows_details->attendance_date'";
        $re_km_query=$this->db->query($km_query);
        $result_km=$re_km_query->result();
        foreach($result_km as $rows_km){}
          $km_details=$rows_km->km;
          if($km_details='NULL'){
            $details=array(
              "user_id"=>" ",
              "km"=>" "
            );

            // $res_km=array("status"=>"error","msg"=>"No KM details found");
          }else{
            $details=array(
              "user_id"=>$rows_km->user_id,
              "km"=>$rows_km->km
            );

          }
            $res_km=array("status"=>"success","msg"=>"KM details found","km_data"=>$details);


        $response=array("status"=>"success","msg"=>"attedance details","field_work_images"=>$field_work_details_report,"attedance_details"=>$response_attedance,"km_data_details"=>$res_km);
        return $response;
      }

      //#################### attendance day report details ####################//


}
?>
