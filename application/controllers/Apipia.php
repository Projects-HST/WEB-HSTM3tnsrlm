<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apipia extends CI_Controller {

	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
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
		 	
				
		$data['result']=$this->apipiamodel->createTrade($pia_id,$trade_name);
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
		//$center_id = 1;
		$banner = $_FILES["center_banner"]["name"];
		$bannerName = time().'-'.$banner;

		$uploadPicdir = 'assets/center/logo/';
		$bannerpic = $uploadPicdir.$bannerName;
		move_uploaded_file($_FILES['center_banner']['tmp_name'], $bannerpic);

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
		//$center_id = 1;
		//$pia_id = 2;
		$photo = $_FILES["center_photo"]["name"];
		$photoName = time().'-'.$photo;

		$uploadPicdir = 'assets/center/gallery/';
		$photopic = $uploadPicdir.$photoName;
		move_uploaded_file($_FILES['center_photo']['tmp_name'], $photopic);

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

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Mobilization Plan";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$pia_id  ='';
		$trade_id = '';
		$doc_month_year = '';
		
		$pia_id = $this->input->post("user_id");
		$doc_name = $this->input->post("doc_name");
		$doc_month_year = $this->input->post("doc_month_year");
		 	
		$data['result']=$this->apipiamodel->mobilizationPlan($pia_id,$doc_name,$doc_month_year);
		$response = $data['result'];
		echo json_encode($response);
	}

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
		move_uploaded_file($_FILES['doc_file']['tmp_name'], $docfile);

		$data['result']=$this->apipiamodel->updatePlanDoc($plan_id,$docName);
		$response = $data['result'];
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
	   //$_POST = json_decode(file_get_contents("php://input"), TRUE);

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
		
		$data['result']=$this->apipiamodel->createUser($pia_id,$select_role,$name,$sex,$dob,$nationality,$religion,$community_class,$community,$address,$email,$sec_email,$phone,$sec_phone,$qualification);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

public function user_profilepic()
	{
        $_POST = json_decode(file_get_contents("php://input"), TRUE);

		$profile_id = $this->uri->segment(3);
		//$profile_id = 4;	
		$profile = $_FILES["user_pic"]["name"];
		$userFileName = time().'-'.$profile;

		$uploadPicdir = 'assets/profile/';
		
		$profilepic = $uploadPicdir.$userFileName;
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
		$user_details_id  ='';
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
	   //$_POST = json_decode(file_get_contents("php://input"), TRUE);

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
}
