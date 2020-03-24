<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apipia extends CI_Controller {



	public function index()
	{
		$this->load->view('welcome_message');
	}


	function __construct()
    {
        parent::__construct();
		$this->load->model("apipiamodel");
        $this->load->helper("url");
    }

	public function checkMethod()
	{
		if($_SERVER['REQUEST_METHOD'] != 'POST')
		{
			$res = array();
			$res["scode"] = 203;
			$res["message"] = "Request Method not supported";

			echo json_encode($res);
			return FALSE;
		}
		return TRUE;
	}

//-----------------------------------------------//

	public function list_scheme()
	{
	   $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "View Scheme";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$pia_id  ='';
		$pia_id = $this->input->post("user_id");

		$data['result']=$this->apipiamodel->listScheme($pia_id);
		$response = $data['result'];
		echo json_encode($response);
	}


//-----------------------------------------------//
//-----------------------------------------------//

	public function scheme_details()
	{
	   $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "View Scheme";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$pia_id  ='';
		$pia_id = $this->input->post("user_id");
		$scheme_id = $this->input->post("scheme_id");

		$data['result']=$this->apipiamodel->scheme_details($pia_id,$scheme_id);
		$response = $data['result'];
		echo json_encode($response);
	}


//-----------------------------------------------//



//-----------------------------------------------//

	public function pia_dashboard()
	{
		$_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Admin Dashboard";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$user_id = '';
		$old_password = '';
		$password = '';

		$user_id = $this->input->post("user_id");


		$data['result']=$this->apipiamodel->pia_dashboard($user_id);
		$response = $data['result'];
		echo json_encode($response);
	}


//-----------------------------------------------//


//-----------------------------------------------//

	public function project_period()
	{
	   $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Project Period";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$pia_id  ='';
		$period_from = '';
		$period_to = '';

		$pia_id = $this->input->post("user_id");
		$period_from = $this->input->post("start_date");
		$period_to = $this->input->post("end_date");


		$data['result']=$this->apipiamodel->projectPeriod($pia_id,$period_from,$period_to);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function project_period_list()
	{
	   $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Project Period List";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$pia_id  ='';
		$pia_id = $this->input->post("user_id");


		$data['result']=$this->apipiamodel->projectPeriodlist($pia_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function create_trade()
	{
	   $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Trade Creation";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$pia_id  ='';
		$trade_name = '';

		$pia_id = $this->input->post("user_id");
		$trade_name = $this->input->post("trade_name");
		$status = $this->input->post("status");


		$data['result']=$this->apipiamodel->createTrade($pia_id,$trade_name,$status);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//
//-----------------------------------------------//

	public function update_trade()
	{
	   $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Trade Creation";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$pia_id  ='';
		$trade_name = '';

		$pia_id = $this->input->post("user_id");
		$trade_name = $this->input->post("trade_name");
		$status = $this->input->post("status");
		$trade_id=$this->input->post("trade_id");


		$data['result']=$this->apipiamodel->update_trade($pia_id,$trade_name,$status,$trade_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//


//-----------------------------------------------//

	public function list_trade()
	{
	   $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "View Trade";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$pia_id  ='';
		$pia_id = $this->input->post("user_id");

		$data['result']=$this->apipiamodel->listTrade($pia_id);
		$response = $data['result'];
		echo json_encode($response);
	}


//-----------------------------------------------//

//-----------------------------------------------//

	public function create_center()
	{
	   $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Center Creation";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$center_name  = '';
		$center_info  = '';
		$center_address ='';
		$pia_id  ='';

		$center_name = $this->input->post("center_name");
		$center_info = $this->input->post("center_info");
		$center_address = $this->input->post("center_address");
		$pia_id = $this->input->post("user_id");

		$data['result']=$this->apipiamodel->createCenter($center_name,$center_info,$center_address,$pia_id);
		$response = $data['result'];
		echo json_encode($response);
	}


//-----------------------------------------------//

//-----------------------------------------------//

	public function update_center_details()
	{
	   $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Center Creation";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$center_name  = '';
		$center_info  = '';
		$center_address ='';
		$pia_id  ='';

		$center_name = $this->input->post("center_name");
		$center_id = $this->input->post("center_id");
		$center_info = $this->input->post("center_info");
		$center_address = $this->input->post("center_address");
		$pia_id = $this->input->post("user_id");

		$data['result']=$this->apipiamodel->update_center_details($center_id,$center_name,$center_info,$center_address,$pia_id);
		$response = $data['result'];
		echo json_encode($response);
	}


//-----------------------------------------------//

//-----------------------------------------------//

	public function list_center()
	{
	   $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Center List";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$pia_id  ='';
		$pia_id = $this->input->post("user_id");

		$data['result']=$this->apipiamodel->listCenter($pia_id);
		$response = $data['result'];
		echo json_encode($response);
	}


//-----------------------------------------------//

	public function update_center_banner()
	{
    $_POST = json_decode(file_get_contents("php://input"), TRUE);

		$center_id = $this->uri->segment(3);
		//$center_id = 34;
		$banner = $_FILES["center_banner"]["name"];
		$temp = pathinfo($banner, PATHINFO_EXTENSION);
		$bannerName = round(microtime(true)) . '.' . $temp;
		$uploaddir = 'assets/center/logo/';
		$profilepic = $uploaddir.$bannerName;
		move_uploaded_file($_FILES['center_banner']['tmp_name'], $profilepic);

		$data['result']=$this->apipiamodel->updateCenterBanner($center_id,$bannerName);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function add_center_photos()
	{
        $_POST = json_decode(file_get_contents("php://input"), TRUE);
		$center_id = $this->uri->segment(3);
		$pia_id = $this->uri->segment(4);
		$photo = $_FILES["center_photo"]["name"];
		$temp = pathinfo($photo, PATHINFO_EXTENSION);
		$photoName = round(microtime(true)) . '.' . $temp;
		$uploaddir = 'assets/center/gallery/';
		$profilepic = $uploaddir.$photoName;
		move_uploaded_file($_FILES['center_photo']['tmp_name'], $profilepic);

		$data['result']=$this->apipiamodel->addCenterPhotos($center_id,$pia_id,$photoName);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function add_center_videos()
	{
	   $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Center Video Add";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$center_id  = '';
		$pia_id  ='';
		$video_title  = '';
		$video_link  ='';

		$center_id = $this->input->post("center_id");
		$pia_id = $this->input->post("user_id");
		$video_title = $this->input->post("video_title");
		$video_link = $this->input->post("video_link");

		$data['result']=$this->apipiamodel->addCenterVideos($center_id,$pia_id,$video_title,$video_link);
		$response = $data['result'];
		echo json_encode($response);
	}


//-----------------------------------------------//

//-----------------------------------------------//

	public function center_list()
	{
	   $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Center List";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$pia_id  ='';
		$pia_id = $this->input->post("user_id");

		$data['result']=$this->apipiamodel->centerList($pia_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function center_details()
	{
	   $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Center Details";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$pia_id  ='';
		$center_id = '';
		$pia_id = $this->input->post("user_id");
		$center_id = $this->input->post("center_id");

		$data['result']=$this->apipiamodel->centerDetails($pia_id,$center_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function center_gallery()
	{
	   $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Center Gallery";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$pia_id  ='';
		$center_id = '';
		$pia_id = $this->input->post("user_id");
		$center_id = $this->input->post("center_id");

		$data['result']=$this->apipiamodel->centerGallery($pia_id,$center_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//


//-----------------------------------------------//

	public function center_gallery_delete()
	{
	   $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Center Gallery";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$gallery_id = $this->input->post("gallery_id");

		$data['result']=$this->apipiamodel->center_gallery_delete($gallery_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function center_videos()
	{
	   $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Center Videos";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$pia_id  ='';
		$center_id = '';
		$pia_id = $this->input->post("user_id");
		$center_id = $this->input->post("center_id");

		$data['result']=$this->apipiamodel->centerVideos($pia_id,$center_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//
//-----------------------------------------------//

	public function center_video_delete()
	{
	   $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Center Gallery";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$video_id = $this->input->post("video_id");

		$data['result']=$this->apipiamodel->center_video_delete($video_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//
//-----------------------------------------------//

	public function create_batch()
	{
	   $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Batch Creation";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$pia_id  ='';
		$batch_name = '';

		$pia_id = $this->input->post("user_id");
		$batch_name = $this->input->post("batch_name");


		$data['result']=$this->apipiamodel->createBatch($pia_id,$batch_name);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//


//-----------------------------------------------//

	public function list_batch()
	{
	   $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "View Batch";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$pia_id  ='';
		$pia_id = $this->input->post("user_id");

		$data['result']=$this->apipiamodel->listBatch($pia_id);
		$response = $data['result'];
		echo json_encode($response);
	}


//-----------------------------------------------//


//-----------------------------------------------//

	public function create_session()
	{
	   $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Session Creation";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$pia_id  ='';
		$session_name = '';
		$from_time = '';
		$to_time = '';

		$pia_id = $this->input->post("user_id");
		$session_name = $this->input->post("session_name");
		$from_time = $this->input->post("from_time");
		$to_time = $this->input->post("to_time");

		$data['result']=$this->apipiamodel->createSession($pia_id,$session_name,$from_time,$to_time);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//


//-----------------------------------------------//

	public function list_session()
	{
	   $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "View Session";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$pia_id  ='';
		$pia_id = $this->input->post("user_id");

		$data['result']=$this->apipiamodel->listSession($pia_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function trade_batch()
	{
	   $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Trade Batch Management";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$pia_id  ='';
		$trade_id = '';
		$batch_id = '';

		$pia_id = $this->input->post("user_id");
		$trade_id = $this->input->post("trade_id");
		$batch_id = $this->input->post("batch_id");

		$data['result']=$this->apipiamodel->tradeBatch($pia_id,$trade_id,$batch_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

    public function mobilization_plan()
	{
	   $_POST = json_decode(file_get_contents("php://input"), TRUE);

		$pia_id  ='';
		$trade_id = '';
		$doc_month_year = '';

		$pia_id = $this->uri->segment(3);
		$doc_name = urldecode($this->uri->segment(4));
		$doc_month_year = $this->uri->segment(5);

		$doc_file = $_FILES["doc_file"]["name"];
		$doc_filename = time().'-'.$doc_file;

		$uploadPicdir = 'assets/mobilization_plan/';
		$docfile = $uploadPicdir.$doc_filename;

		if(move_uploaded_file($_FILES['doc_file']['tmp_name'], $docfile)) {
			$data['result']=$this->apipiamodel->mobilizationPlan($pia_id,$doc_name,$doc_month_year,$doc_filename);
			$response = $data['result'];
		} else{
			$response = array("status" => "error", "msg" => "Error in Upload");
		}
		echo json_encode($response);
	}


// 	public function mobilization_plan()
// 	{
// 	   $_POST = json_decode(file_get_contents("php://input"), TRUE);

// 		if(!$this->checkMethod())
// 		{
// 			return FALSE;
// 		}

// 		if($_POST == FALSE)
// 		{
// 			$res = array();
// 			$res["opn"] = "Mobilization Plan";
// 			$res["scode"] = 204;
// 			$res["message"] = "Input error";

// 			echo json_encode($res);
// 			return;
// 		}

// 		$pia_id  ='';
// 		$trade_id = '';
// 		$doc_month_year = '';

// 		$pia_id = $this->input->post("user_id");
// 		$doc_name = $this->input->post("doc_name");
// 		$doc_month_year = $this->input->post("doc_month_year");

// 		$data['result']=$this->apipiamodel->mobilizationPlan($pia_id,$doc_name,$doc_month_year);
// 		$response = $data['result'];
// 		echo json_encode($response);
// 	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function mobilization_plan_upload()
	{
        $_POST = json_decode(file_get_contents("php://input"), TRUE);

		$plan_id = $this->uri->segment(3);
		//$plan_id = 2;
		$doc = $_FILES["doc_file"]["name"];
		$docName = time().'-'.$doc;

		$uploadPicdir = 'assets/mobilization_plan/';
		$docfile = $uploadPicdir.$docName;

		if(move_uploaded_file($_FILES['doc_file']['tmp_name'], $docfile)) {
			$data['result']=$this->apipiamodel->updatePlanDoc($plan_id,$docName);
			$response = $data['result'];
		} else{
			$response = array("status" => "error", "msg" => "Error in Upload");
		}

		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function mobilization_plan_list()
	{
	   $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Plan List";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$pia_id  ='';
		$pia_id = $this->input->post("user_id");

		$data['result']=$this->apipiamodel->mobilizationPlanlist($pia_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function create_user()
	{
	   $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Create User";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$pia_id  ='';
		$select_role ='';
		$name = '';
		$sex = '';
		$dob = '';
		$nationality = '';
		$religion = '';
		$community_class = '';
		$community = '';
		$address = '';
		$email = '';
		$sec_email = '';
		$phone = '';
		$sec_phone = '';
		$qualification = '';

		$pia_id = $this->input->post("user_id");
		$select_role = $this->input->post('select_role');
		$name = $this->input->post('name');
		$sex = $this->input->post('sex');
		$dob = $this->input->post('dob');
		$nationality = $this->input->post('nationality');
		$religion = $this->input->post('religion');
		$community_class = $this->input->post('community_class');
		$community = $this->input->post('community');
		$address = $this->db->escape_str($this->input->post('address'));
		$email = $this->input->post('email');
		$sec_email = $this->input->post('sec_email');
		$phone = $this->input->post('phone');
		$sec_phone = $this->input->post('sec_phone');
		$qualification = $this->input->post('qualification');
		$status = $this->input->post('status');

		$data['result']=$this->apipiamodel->createUser($pia_id,$select_role,$name,$sex,$dob,$nationality,$religion,$community_class,$community,$address,$email,$sec_email,$phone,$sec_phone,$qualification,$status);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

public function user_profilepic()
	{
    $_POST = json_decode(file_get_contents("php://input"), TRUE);

		$profile_id = $this->uri->segment(3);
		// $profile_id = 11;
		$profile = $_FILES["user_pic"]["name"];
		$temp = pathinfo($profile, PATHINFO_EXTENSION);
		$userFileName = round(microtime(true)) . '.' . $temp;
		$uploaddir = 'assets/profile/';
		$profilepic = $uploaddir.$userFileName;
		move_uploaded_file($_FILES['user_pic']['tmp_name'], $profilepic);


		$data['result']=$this->apipiamodel->updateProfilepic($profile_id,$userFileName);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function user_list()
	{
	  $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "User List";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$pia_id  ='';
		$pia_id = $this->input->post("user_id");

		$data['result']=$this->apipiamodel->userList($pia_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function user_list_staff()
	{
	  $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "User List";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$pia_id  ='';
		$pia_id = $this->input->post("user_id");

		$data['result']=$this->apipiamodel->userListstaff($pia_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function user_list_mobilizer()
	{
	  $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "User List";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$pia_id  ='';
		$pia_id = $this->input->post("user_id");

		$data['result']=$this->apipiamodel->userListmobilizer($pia_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//


//-----------------------------------------------//

	public function user_profile()
	{
		$_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "User List";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}


		$user_id = $this->input->post("user_id");

		$data['result']=$this->apipiamodel->user_profile($user_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function user_profile_update()
	{
		$_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "User List";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}


		$user_id = $this->input->post("user_id");
		$pia_phone = $this->input->post("pia_phone");
		$pia_name = $this->input->post("pia_name");
		$pia_address = $this->input->post("pia_address");
		$pia_email = $this->input->post("pia_email");
		$pia_id = $this->input->post("pia_id");

		$data['result']=$this->apipiamodel->user_profile_update($user_id,$pia_phone,$pia_name,$pia_address,$pia_email,$pia_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//



//-----------------------------------------------//

	public function user_details()
	{
	  $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "User List";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$pia_id  ='';
		$user_master_id  ='';
		$pia_id = $this->input->post("user_id");
		$user_master_id = $this->input->post("user_master_id");

		$data['result']=$this->apipiamodel->userDetails($pia_id,$user_master_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//


//-----------------------------------------------//

	public function update_user()
	{
	   $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Update User";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$pia_id  ='';
		$user_master_id = '';
		$select_role ='';
		$name = '';
		$sex = '';
		$dob = '';
		$nationality = '';
		$religion = '';
		$community_class = '';
		$community = '';
		$address = '';
		$email = '';
		$sec_email = '';
		$phone = '';
		$sec_phone = '';
		$qualification = '';
		$status ='';

		$pia_id = $this->input->post("user_id");
		$user_master_id = $this->input->post("user_master_id");
		$select_role = $this->input->post('select_role');
		$name = $this->input->post('name');
		$sex = $this->input->post('sex');
		$dob = $this->input->post('dob');
		$nationality = $this->input->post('nationality');
		$religion = $this->input->post('religion');
		$community_class = $this->input->post('community_class');
		$community = $this->input->post('community');
		$address = $this->db->escape_str($this->input->post('address'));
		$email = $this->input->post('email');
		$sec_email = $this->input->post('sec_email');
		$phone = $this->input->post('phone');
		$sec_phone = $this->input->post('sec_phone');
		$qualification = $this->input->post('qualification');
		$status =$this->input->post('status');

		$data['result']=$this->apipiamodel->updateUser($pia_id,$user_master_id,$select_role,$name,$sex,$dob,$nationality,$religion,$community_class,$community,$address,$email,$sec_email,$phone,$sec_phone,$qualification,$status);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//
	public function add_student()
	{
		$_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Student Add";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$pia_id = '';
		$have_aadhaar_card = '';
		$aadhaar_card_number = '';
		$name = '';
		$sex = '';
		$dob = '';
		$age = '';
		$nationality = '';
		$religion = '';
		$community_class = '';
		$community = '';
		$father_name = '';
		$mother_name = '';
		$mobile = '';
		$sec_mobile = '';
		$email = '';
		$state = '';
		$city = '';
		$address = '';
		$mother_tongue = '';
		$disability = '';
		$blood_group = '';
		$admission_date = '';
		$admission_location = '';
		$admission_latitude = '';
		$admission_longitude = '';
		$preferred_trade = '';
		$preferred_timing = '';
		$last_institute = '';
		$last_studied = '';
		$qualified_promotion = '';
		$transfer_certificate = '';
		$status = '';
		//$created_by = '';
		//$created_at = '';

		 $pia_id = $this->input->post("user_id");
		// $pia_id = $this->input->post("pia_id");

        $have_aadhaar_card = $this->input->post("have_aadhaar_card");
		$aadhaar_card_number = $this->input->post("aadhaar_card_number");
		$name = $this->input->post("name");
		$sex = $this->input->post("sex");
		$dob = $this->input->post("dob");
		$age = $this->input->post("age");
		$nationality = $this->input->post("nationality");
		$religion = $this->input->post("religion");
		$community_class = $this->input->post("community_class");
		$community = $this->input->post("community");
		$father_name = $this->input->post("father_name");
		$mother_name = $this->input->post("mother_name");
		$mobile = $this->input->post("mobile");
		$sec_mobile = $this->input->post("sec_mobile");
		$email = $this->input->post("email");
		$state = $this->input->post("state");
		$city = $this->input->post("city");
		$address = $this->input->post("address");
		$mother_tongue = $this->input->post("mother_tongue");
		$disability = $this->input->post("disability");
		$blood_group = $this->input->post("blood_group");
		$admission_date = $this->input->post("admission_date");
		$admission_location = $this->input->post("admission_location");
	  $admission_latitude = $this->input->post("admission_latitude");
		$admission_longitude = $this->input->post("admission_longitude");
		$preferred_trade = $this->input->post("preferred_trade");
		$preferred_timing = $this->input->post("preferred_timing");
		$last_institute = $this->input->post("last_institute");
		$last_studied = $this->input->post("last_studied");
		$qualified_promotion = $this->input->post("qualified_promotion");
		$transfer_certificate = $this->input->post("transfer_certificate");
		$status = $this->input->post("status");
		//$created_by = $this->input->post("created_by");
		//$created_at = $this->input->post("created_at");


		$father_mobile=$this->input->post('father_mobile');
		$mother_mobile=$this->input->post('mother_mobile');
		$qualification=$this->input->post('qualification');
		$qualification_details=$this->input->post('qualification_details');
		$year_of_edu=$this->input->post('year_of_edu');
		$year_of_pass=$this->input->post('year_of_pass');
		$identification_mark_1=$this->input->post('identification_mark_1');
		$identification_mark_2=$this->input->post('identification_mark_2');
		$lang_known=$this->input->post('lang_known');
		$head_family_name=$this->input->post('head_family_name');
		$head_family_edu=$this->input->post('head_family_edu');
		$no_family=$this->input->post('no_family');
		$yearly_income=$this->input->post('yearly_income');
		$jobcard_type=$this->input->post('jobcard_type');

		$data['result']=$this->apipiamodel->addStudent($pia_id,$have_aadhaar_card,$aadhaar_card_number,$name,$sex,$dob,$age,$nationality,$religion,$community_class,$community,$father_name,$mother_name,$mobile,$sec_mobile,$email,$state,$city,$address,$mother_tongue,$disability,$blood_group,$admission_date,$admission_location,$admission_latitude,$admission_longitude,$preferred_trade,$preferred_timing,
		$last_institute,$last_studied,$qualified_promotion,$transfer_certificate,$status,$father_mobile,$mother_mobile,$qualification,$qualification_details,$year_of_edu,$year_of_pass,$identification_mark_1,$identification_mark_2,$lang_known,$head_family_name,$head_family_edu,$no_family,$yearly_income,$jobcard_type);
		$response = $data['result'];
		echo json_encode($response);
	}
//-----------------------------------------------//

//-----------------------------------------------//

	public function student_picupload()
	{
	    $_POST = json_decode(file_get_contents("php://input"), TRUE);

		$student_id = $this->uri->segment(3);
		$profile = $_FILES["student_pic"]["name"];
		$userFileName = time().'-'.$profile;

		$uploadPicdir = 'assets/students/';
		$profilepic = $uploadPicdir.$userFileName;
		move_uploaded_file($_FILES['student_pic']['tmp_name'], $profilepic);

		$data['result']=$this->apipiamodel->studentPic($student_id,$userFileName);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function list_students()
	{

	   $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "List of Students";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$pia_id= '';
	 	$pia_id = $this->input->post("user_id");


		$data['result']=$this->apipiamodel->listStudents($pia_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function list_students_status()
	{

	   $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "List of Students";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$pia_id= '';
		$status= '';
	 	$pia_id = $this->input->post("user_id");
		$status = $this->input->post("status");


		$data['result']=$this->apipiamodel->listStudentsStatus($pia_id,$status);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function view_student()
	{
	   $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "View Student";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$student_id = '';
	 	$student_id = $this->input->post("student_id");


		$data['result']=$this->apipiamodel->viewStudent($student_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function update_student()
	{
	   $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "View Student";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

        $student_id = '';
		$pia_id = '';
        $have_aadhaar_card = '';
		$aadhaar_card_number = '';
		$name = '';
		$sex = '';
		$dob = '';
		$age = '';
		$nationality = '';
		$religion = '';
		$community_class = '';
		$community = '';
		$father_name = '';
		$mother_name = '';
		$mobile = '';
		$sec_mobile = '';
		$email = '';
		$state = '';
		$city = '';
		$address = '';
		$mother_tongue = '';
		$disability = '';
		$blood_group = '';
		$admission_date = '';
		$admission_location = '';
		$admission_latitude = '';
		$admission_longitude = '';
		$preferred_trade = '';
		$preferred_timing = '';
		$last_institute = '';
		$last_studied = '';
		$qualified_promotion = '';
		$transfer_certificate = '';
		$status = '';
		//$updated_by = '';
		//$updated_at = '';


        $student_id = $this->input->post("student_id");
		$pia_id = $this->input->post("user_id");
        $have_aadhaar_card = $this->input->post("have_aadhaar_card");
		$aadhaar_card_number = $this->input->post("aadhaar_card_number");
		$name = $this->input->post("name");
		$sex = $this->input->post("sex");
		$dob = $this->input->post("dob");
		$age = $this->input->post("age");
		$nationality = $this->input->post("nationality");
		$religion = $this->input->post("religion");
		$community_class = $this->input->post("community_class");
		$community = $this->input->post("community");
		$father_name = $this->input->post("father_name");
		$mother_name = $this->input->post("mother_name");
		$mobile = $this->input->post("mobile");
		$sec_mobile = $this->input->post("sec_mobile");
		$email = $this->input->post("email");
		$state = $this->input->post("state");
		$city = $this->input->post("city");
		$address = $this->input->post("address");
		$mother_tongue = $this->input->post("mother_tongue");
		$disability = $this->input->post("disability");
		$blood_group = $this->input->post("blood_group");
		$admission_date = $this->input->post("admission_date");
		$admission_location = $this->input->post("admission_location");
		$admission_latitude = $this->input->post("admission_latitude");
		$admission_longitude = $this->input->post("admission_longitude");
		$preferred_trade = $this->input->post("preferred_trade");
		$preferred_timing = $this->input->post("preferred_timing");
		$last_institute = $this->input->post("last_institute");
		$last_studied = $this->input->post("last_studied");
		$qualified_promotion = $this->input->post("qualified_promotion");
		$transfer_certificate = $this->input->post("transfer_certificate");
		$status = $this->input->post("status");
		//$updated_by = $this->input->post("updated_by");
		//$updated_at = $this->input->post("updated_at");

		$father_mobile=$this->input->post('father_mobile');
		$mother_mobile=$this->input->post('mother_mobile');
		$qualification=$this->input->post('qualification');
		$qualification_details=$this->input->post('qualification_details');
		$year_of_edu=$this->input->post('year_of_edu');
		$year_of_pass=$this->input->post('year_of_pass');
		$identification_mark_1=$this->input->post('identification_mark_1');
		$identification_mark_2=$this->input->post('identification_mark_2');
		$lang_known=$this->input->post('lang_known');
		$head_family_name=$this->input->post('head_family_name');
		$head_family_edu=$this->input->post('head_family_edu');
		$no_family=$this->input->post('no_family');
		$yearly_income=$this->input->post('yearly_income');
		$jobcard_type=$this->input->post('jobcard_type');


		$data['result']=$this->apipiamodel->updateStudent($student_id,$pia_id,$have_aadhaar_card,$aadhaar_card_number,$name,$sex,$dob,$age,$nationality,$religion,$community_class,$community,$father_name,$mother_name,$mobile,$sec_mobile,$email,$state,$city,$address,$mother_tongue,$disability,$blood_group,$admission_date,$admission_location,$admission_latitude,$admission_longitude,$preferred_trade,
		$preferred_timing,$last_institute,$last_studied,$qualified_promotion,$transfer_certificate,$status,$father_mobile,$mother_mobile,$qualification,$qualification_details,$year_of_edu,$year_of_pass,$identification_mark_1,$identification_mark_2,$lang_known,$head_family_name,$head_family_edu,$no_family,$yearly_income,$jobcard_type);
		$response = $data['result'];
		echo json_encode($response);
	}


//-----------------------------------------------//


//-----------------------------------------------//

	public function document_details_upload()
	{
		$_POST = json_decode(file_get_contents("php://input"), TRUE);

		$user_id = $this->uri->segment(3);
		$doc_master_id = $this->uri->segment(4);
		$prospect_id = $this->uri->segment(5);
		$proof_number = $this->uri->segment(6);

// 		$profile = $_FILES["upload_document"]["name"];
// 		$temp = pathinfo($profile, PATHINFO_EXTENSION);
// 		$userFileName = round(microtime(true)) . '.' . $temp;
// 		$uploaddir = 'assets/documents/';
// 		$profilepic = $uploaddir.$userFileName;
// 		move_uploaded_file($_FILES['upload_document']['tmp_name'], $profilepic);

		$document         = $_FILES["upload_document"]["name"];
        $extension        = end((explode(".", $document)));
        $documentFileName = $user_id . '-' . time() . '.' . $extension;
        $uploaddir        = 'assets/documents/';
        $documentFile     = $uploaddir . $documentFileName;
        move_uploaded_file($_FILES['upload_document']['tmp_name'], $documentFile);

		$data['result']=$this->apipiamodel->document_details_upload($user_id,$documentFileName,$doc_master_id,$prospect_id,$proof_number);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//


//-----------------------------------------------//

	public function prospects_document()
	{
	   	$_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Input";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

	    $user_id = '';
	    $prospect_id = $this->input->post("prospect_id");
		$data['result']=$this->apipiamodel->prospects_document($prospect_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function document_details_update()
	{
		$_POST = json_decode(file_get_contents("php://input"), TRUE);

		$user_id = $this->uri->segment(3);
		$doc_master_id = $this->uri->segment(4);
		$prospect_id = $this->uri->segment(5);
		$proof_number = $this->uri->segment(6);
		$id = $this->uri->segment(7);

		$profile = $_FILES["upload_document"]["name"];
		$temp = pathinfo($profile, PATHINFO_EXTENSION);
		$userFileName = round(microtime(true)) . '.' . $temp;
		$uploaddir = 'assets/documents/';
		$profilepic = $uploaddir.$userFileName;
		move_uploaded_file($_FILES['upload_document']['tmp_name'], $profilepic);

		$data['result']=$this->apipiamodel->document_details_update($user_id,$userFileName,$doc_master_id,$prospect_id,$proof_number,$id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//


//-----------------------------------------------//
	public function add_task()
	{
		$_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{

			$res = array();
			$res["opn"] = "Add Task";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$pia_id = '';
		$user_master_id = '';
		$task_title  = '';
		$task_description = '';
		$task_date  = '';
		//$status  = '';
		//$created_by = '';
		//$created_at  = '';

		$pia_id = $this->input->post("user_id");
		$user_master_id = $this->input->post("mob_id");
		$task_title  = $this->input->post("task_title");
		$task_description = $this->input->post("task_description");
		$task_date  = $this->input->post("task_date");
		//$status  = $this->input->post("status");
		//$created_by = $this->input->post("user_id");
		//$created_at  = date("Y-m-d H:i:s");


		$data['result']=$this->apipiamodel->addTask($user_master_id,$task_title,$task_description,$task_date,$pia_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function list_task()
	{
	   	$_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "List Task";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

	    $user_id = '';
	    $user_id = $this->input->post("user_id");


		$data['result']=$this->apipiamodel->listTask($user_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function view_task()
	{
	   	$_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "View Task";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

	    $task = '';
	    $task_id = $this->input->post("task_id");


		$data['result']=$this->apipiamodel->viewTask($task_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function update_task()
	{
		$_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{

			$res = array();
			$res["opn"] = "Update Task";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

        $task_id = '';
		$pia_id = '';
		$task_title  = '';
		$task_description = '';
		$task_date  = '';
		$status  = '';
		//$updated_by = '';
		//$updated_at  = '';

		$task_id = $this->input->post("task_id");
		$pia_id = $this->input->post("user_id");
		$task_title  = $this->input->post("task_title");
		$task_description = $this->input->post("task_description");
		$task_date  = $this->input->post("task_date");
		$status  = $this->input->post("status");
		//$updated_by = $this->input->post("user_id");
		//$updated_at  = date("Y-m-d H:i:s");

		$data['result']=$this->apipiamodel->updateTask($task_id,$pia_id,$task_title,$task_description,$task_date,$status);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function user_tracking()
	{
		$_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "User Tracking";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}


		$mob_id = '';
		$track_date = '';
		$mob_id = $this->input->post("mob_id");
		$track_date = $this->input->post("track_date");


		$data['result']=$this->apipiamodel->userTracking($mob_id,$track_date);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//


	public function mobilizier_tracking_report(){

		$_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "User Tracking";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}


		$mob_id = $this->input->post("mobilizer_id");
		$frmdate = $this->input->post("from_date");
		$tdate = $this->input->post("to_date");

		$data['result']=$this->apipiamodel->mobilizier_tracking_report($mob_id,$frmdate,$tdate);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

	public function user_tracking_current()
	{
		$_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "User Tracking";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}


		$mob_id = '';
		$track_date = '';
		$mob_id = $this->input->post("mob_id");
		$track_date = $this->input->post("track_date");


		$data['result']=$this->apipiamodel->userTrackingCurrent($mob_id,$track_date);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//


//-----------------------------------------------//

	public function work_type_master()
	{
		$_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "User Tracking";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}


		$mob_id = '';
		$track_date = '';
		$user_id = $this->input->post("user_id");

		$data['result']=$this->apipiamodel->work_type_master($user_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function add_attendance_task(){

		$_POST = json_decode(file_get_contents("php://input"), TRUE);

	 if(!$this->checkMethod())
	 {
		 return FALSE;
	 }

	 if($_POST == FALSE)
	 {
		 $res = array();
		 $res["opn"] = "Error";
		 $res["scode"] = 204;
		 $res["message"] = "Input error";

		 echo json_encode($res);
		 return;
	 }


	 $mobilizer_id = $this->input->post("mobilizer_id");
	 $task_type = $this->input->post("task_type");
	 $attendance_date = $this->input->post("attendance_date");
	  $title = $this->input->post("title");
	 $comments = $this->input->post("comments");
	 $status = $this->input->post("status");
	 $task_id = $this->input->post("task_id");
	 $user_id = $this->input->post("user_id");
	 $created_at = $this->input->post("created_at");
	 $data['result']=$this->apipiamodel->add_attendance_task($mobilizer_id,$task_type,$task_id,$attendance_date,$title,$comments,$status,$user_id,$created_at);
	 $response = $data['result'];
	 echo json_encode($response);
	}
	//-----------------------------------------------//



	//-----------------------------------------------//

		public function list_attendance_task(){

			$_POST = json_decode(file_get_contents("php://input"), TRUE);

		 if(!$this->checkMethod())
		 {
			 return FALSE;
		 }

		 if($_POST == FALSE)
		 {
			 $res = array();
			 $res["opn"] = "Error";
			 $res["scode"] = 204;
			 $res["message"] = "Input error";

			 echo json_encode($res);
			 return;
		 }


		 $mobilizer_id = $this->input->post("mobilizer_id");
		 $data['result']=$this->apipiamodel->list_attendance_task($mobilizer_id);
		 $response = $data['result'];
		 echo json_encode($response);
		}
		//-----------------------------------------------//


			//-----------------------------------------------//

				public function get_list_mobilizer_for_pia(){

					$_POST = json_decode(file_get_contents("php://input"), TRUE);

				 if(!$this->checkMethod())
				 {
					 return FALSE;
				 }

				 if($_POST == FALSE)
				 {
					 $res = array();
					 $res["opn"] = "Error";
					 $res["scode"] = 204;
					 $res["message"] = "Input error";

					 echo json_encode($res);
					 return;
				 }


				 $user_id = $this->input->post("user_id");
				 $data['result']=$this->apipiamodel->get_list_mobilizer_for_pia($user_id);
				 $response = $data['result'];
				 echo json_encode($response);
				}
				//-----------------------------------------------//
	//-----------------------------------------------//

		public function get_task_list_for_mobilizer(){

			$_POST = json_decode(file_get_contents("php://input"), TRUE);

		 if(!$this->checkMethod())
		 {
			 return FALSE;
		 }

		 if($_POST == FALSE)
		 {
			 $res = array();
			 $res["opn"] = "Error";
			 $res["scode"] = 204;
			 $res["message"] = "Input error";

			 echo json_encode($res);
			 return;
		 }


		 $mobilizer_user_id = $this->input->post("mobilizer_user_id");
		 $user_id = $this->input->post("user_id");
		 $attendance_date = $this->input->post("attendance_date");
		 $data['result']=$this->apipiamodel->get_task_list_for_mobilizer($mobilizer_user_id,$user_id,$attendance_date);
		 $response = $data['result'];
		 echo json_encode($response);
		}
		//-----------------------------------------------//

		//-----------------------------------------------//

			public function get_year_list_attendance(){

				$_POST = json_decode(file_get_contents("php://input"), TRUE);

			 if(!$this->checkMethod())
			 {
				 return FALSE;
			 }

			 if($_POST == FALSE)
			 {
				 $res = array();
				 $res["opn"] = "Error";
				 $res["scode"] = 204;
				 $res["message"] = "Input error";

				 echo json_encode($res);
				 return;
			 }


			 $mobilizer_id = $this->input->post("mobilizer_id");
			 $user_id = $this->input->post("user_id");
			 $data['result']=$this->apipiamodel->get_year_list_attendance($mobilizer_id,$user_id);
			 $response = $data['result'];
			 echo json_encode($response);
			}
			//-----------------------------------------------//
		//-----------------------------------------------//

			public function get_month_list_attendance(){

				$_POST = json_decode(file_get_contents("php://input"), TRUE);

			 if(!$this->checkMethod())
			 {
				 return FALSE;
			 }

			 if($_POST == FALSE)
			 {
				 $res = array();
				 $res["opn"] = "Error";
				 $res["scode"] = 204;
				 $res["message"] = "Input error";

				 echo json_encode($res);
				 return;
			 }


			 $mobilizer_id = $this->input->post("mobilizer_id");
			 $user_id = $this->input->post("user_id");
			 $data['result']=$this->apipiamodel->get_month_list_attendance($mobilizer_id,$user_id);
			 $response = $data['result'];
			 echo json_encode($response);
			}
			//-----------------------------------------------//

			//-----------------------------------------------//

				public function get_month_day_list_attendance(){

					$_POST = json_decode(file_get_contents("php://input"), TRUE);

				 if(!$this->checkMethod())
				 {
					 return FALSE;
				 }

				 if($_POST == FALSE)
				 {
					 $res = array();
					 $res["opn"] = "Error";
					 $res["scode"] = 204;
					 $res["message"] = "Input error";

					 echo json_encode($res);
					 return;
				 }


				 $mobilizer_id = $this->input->post("mobilizer_id");
				 $user_id = $this->input->post("user_id");
				 $month_id = $this->input->post("month_id");
				 $data['result']=$this->apipiamodel->get_month_day_list_attendance($mobilizer_id,$user_id,$month_id);
				 $response = $data['result'];
				 echo json_encode($response);
				}
				//-----------------------------------------------//


				//-----------------------------------------------//

					public function get_month_attendance_report(){

						$_POST = json_decode(file_get_contents("php://input"), TRUE);

					 if(!$this->checkMethod())
					 {
						 return FALSE;
					 }

					 if($_POST == FALSE)
					 {
						 $res = array();
						 $res["opn"] = "Error";
						 $res["scode"] = 204;
						 $res["message"] = "Input error";

						 echo json_encode($res);
						 return;
					 }


					 $mobilizer_id = $this->input->post("mobilizer_id");
					 $user_id = $this->input->post("user_id");
					 $month_id = $this->input->post("month_id");
					 $data['result']=$this->apipiamodel->get_month_attendance_report($mobilizer_id,$user_id,$month_id);
					 $response = $data['result'];
					 echo json_encode($response);
					}
					//-----------------------------------------------//

}
