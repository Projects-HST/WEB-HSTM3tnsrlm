<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apimobilizer extends CI_Controller {


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
		$this->load->model("apimobilizermodel");
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

		public function user_profilepic()
		{
	    $_POST = json_decode(file_get_contents("php://input"), TRUE);

			$user_id = $this->uri->segment(3);
			$temp = pathinfo($profile, PATHINFO_EXTENSION);
			$userFileName = round(microtime(true)) . '.' . $temp;
			$uploaddir = 'assets/profile/';
			$profilepic = $uploaddir.$userFileName;
			move_uploaded_file($_FILES['user_pic']['tmp_name'], $profilepic);

			$data['result']=$this->apimobilizermodel->updateProfilepic($user_id,$userFileName,$profilepic);
			$response = $data['result'];
			echo json_encode($response);
		}

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
			$res["opn"] = "Reset Password";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}



		$user_id = $this->input->post("user_id");

		$data['result']=$this->apimobilizermodel->user_profile($user_id);
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
					$res["opn"] = "Reset Password";
					$res["scode"] = 204;
					$res["message"] = "Input error";

					echo json_encode($res);
					return;
				}



				$id = $this->input->post("id");
				$address = $this->input->post("address");
				$email = $this->input->post("email");

				$data['result']=$this->apimobilizermodel->user_profile_update($id,$address,$email);
				$response = $data['result'];
				echo json_encode($response);
			}

			//-----------------------------------------------//


	public function select_trade()
	{
		$_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Select Trade";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$user_id = '';
		$pia_id = '';
		$user_id = $this->input->post("user_id");
		$pia_id = $this->input->post("pia_id");

		$data['result']=$this->apimobilizermodel->Selecttrade($user_id,$pia_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function select_batch()
	{
		$_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Select Trade";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$trade_id = '';
		$trade_id = $this->input->post("trade_id");

		$data['result']=$this->apimobilizermodel->Selectbatch($trade_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

	public function select_timings()
	{
		$_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Select Trade";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$user_id = '';
		$user_id = $this->input->post("user_id");

		$data['result']=$this->apimobilizermodel->Selecttimings($user_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

	public function select_bloodgroup()
	{
		$_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Select Blood Group";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$user_id = '';
		$user_id = $this->input->post("user_id");

		$data['result']=$this->apimobilizermodel->Selectbloodgroup($user_id);
		$response = $data['result'];
		echo json_encode($response);
	}


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
		$created_by = '';
		$created_at = '';

		$pia_id = $this->input->post("pia_id");
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
		$created_by = $this->input->post("created_by");
		$created_at = $this->input->post("created_at");



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


		$data['result']=$this->apimobilizermodel->addStudent($pia_id,$have_aadhaar_card,$aadhaar_card_number,$name,$sex,$dob,$age,$nationality,$religion,$community_class,$community,$father_name,$mother_name,$mobile,$sec_mobile,$email,$state,$city,$address,$mother_tongue,$disability,$blood_group,$admission_date,$admission_location,$admission_latitude,$admission_longitude,$preferred_trade,$preferred_timing,
		$last_institute,$last_studied,$qualified_promotion,$transfer_certificate,$status,$created_by,$created_at,$father_mobile,$mother_mobile,$qualification,$qualification_details,$year_of_edu,$year_of_pass,$identification_mark_1,$identification_mark_2,$lang_known,$head_family_name,$head_family_edu,$no_family,$yearly_income,$jobcard_type);
		$response = $data['result'];
		echo json_encode($response);
	}
//-----------------------------------------------//

//-----------------------------------------------//

	public function student_picupload()
	{
	    $_POST = json_decode(file_get_contents("php://input"), TRUE);

		$admission_id = $this->uri->segment(3);
		$profile = $_FILES["student_pic"]["name"];
		$userFileName = time().'-'.$profile;

		$uploadPicdir = './assets/students/';
		$profilepic = $uploadPicdir.$userFileName;
		move_uploaded_file($_FILES['student_pic']['tmp_name'], $profilepic);

		$data['result']=$this->apimobilizermodel->studentPic($admission_id,$userFileName);
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

		$user_id= '';
	 	$user_id = $this->input->post("user_id");


		$data['result']=$this->apimobilizermodel->listStudents($user_id);
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

		$user_id= '';
		$status= '';
	 	$user_id = $this->input->post("user_id");
		$status = $this->input->post("status");


		$data['result']=$this->apimobilizermodel->listStudentsStatus($user_id,$status);
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

		$admission_id = '';
	 	$admission_id = $this->input->post("admission_id");


		$data['result']=$this->apimobilizermodel->viewStudent($admission_id);
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

        $admission_id = '';
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
		$updated_by = '';
		$updated_at = '';


        $admission_id = $this->input->post("admission_id");
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
		$updated_by = $this->input->post("updated_by");
		$updated_at = $this->input->post("updated_at");


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


		$data['result']=$this->apimobilizermodel->updateStudent($admission_id,$have_aadhaar_card,$aadhaar_card_number,$name,$sex,$dob,$age,$nationality,$religion,$community_class,$community,$father_name,$mother_name,$mobile,$sec_mobile,$email,$state,$city,$address,$mother_tongue,$disability,$blood_group,$admission_date,$admission_location,$admission_latitude,$admission_longitude,$preferred_trade,$preferred_timing,$last_institute,$last_studied,$qualified_promotion,$transfer_certificate,$status,$updated_by,$updated_at,$father_mobile,$mother_mobile,$qualification,$qualification_details,$year_of_edu,$year_of_pass,$identification_mark_1,$identification_mark_2,$lang_known,$head_family_name,$head_family_edu,$no_family,$yearly_income,$jobcard_type);
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
			$data['result']=$this->apimobilizermodel->prospects_document($prospect_id);
			$response = $data['result'];
			echo json_encode($response);
		}

	//-----------------------------------------------//
//-----------------------------------------------//

	public function view_centerdetails()
	{
		$_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Select Center";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$user_id = '';
		$pia_id = '';
		$user_id = $this->input->post("user_id");
		$pia_id = $this->input->post("pia_id");

		$data['result']=$this->apimobilizermodel->centerDetails($user_id,$pia_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//
//-----------------------------------------------//

	public function view_centerimages()
	{
		$_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Center Images";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$center_id = '';
		$center_id = $this->input->post("center_id");

		$data['result']=$this->apimobilizermodel->centerImages($center_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function view_centervideos()
	{
		$_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Center Images";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$center_id = '';
		$center_id = $this->input->post("center_id");

		$data['result']=$this->apimobilizermodel->centerVideos($center_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//


//-----------------------------------------------//

	public function view_trainers()
	{
		$_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Trainner Details";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$center_id = '';
		$center_id = $this->input->post("center_id");

		$data['result']=$this->apimobilizermodel->viewTrainers($center_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function view_sucess_story()
	{
		$_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Sucess Story Details";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$center_id = '';
		$center_id = $this->input->post("center_id");

		$data['result']=$this->apimobilizermodel->viewSucessstory($center_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//


//-----------------------------------------------//

	public function disp_circular()
	{
	   	$_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "View Circular";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

	    $user_id = '';
	    $user_id = $this->input->post("user_id");


		$data['result']=$this->apimobilizermodel->dispCircular($user_id);
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

		$user_id = '';
		$pia_id = '';
		$task_title  = '';
		$task_description = '';
		$task_date  = '';
		$status  = '';
		//$created_by = '';
		//$created_at  = '';

		$user_id = $this->input->post("user_id");
		$pia_id = $this->input->post("pia_id");
		$task_title  = $this->input->post("task_title");
		$task_description = $this->input->post("task_description");
		$task_date  = $this->input->post("task_date");
		$status  = $this->input->post("status");
		//$created_by = $this->input->post("user_id");
		//$created_at  = date("Y-m-d H:i:s");


		$data['result']=$this->apimobilizermodel->addTask($user_id,$pia_id,$task_title,$task_description,$task_date,$status);
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
			$res["opn"] = "View Task";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

	    $user_id = '';
	    $user_id = $this->input->post("user_id");


		$data['result']=$this->apimobilizermodel->listTask($user_id);
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


		$data['result']=$this->apimobilizermodel->viewTask($task_id);
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
		$user_id = '';
		$task_title  = '';
		$task_description = '';
		$task_date  = '';
		$status  = '';
		$updated_by = '';
		$updated_at  = '';

		$task_id = $this->input->post("task_id");
		$user_id = $this->input->post("user_id");
		$task_title  = $this->input->post("task_title");
		$task_description = $this->input->post("task_description");
		$task_date  = $this->input->post("task_date");
		$status  = $this->input->post("status");
		$updated_by = $this->input->post("user_id");
		$updated_at  = date("Y-m-d H:i:s");


		$data['result']=$this->apimobilizermodel->updateTask($task_id,$user_id,$task_title,$task_description,$task_date,$status,$updated_by,$updated_at);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function task_picupload()
	{
	    $_POST = json_decode(file_get_contents("php://input"), TRUE);

		$task_id = $this->uri->segment(3);
		$profile = $_FILES["task_pic"]["name"];
		echo $task_lat = $this->input->post("task_lat");
		exit;

		$taskFileName = time().'-'.$task_id.'-'.$profile;

		$uploadPicdir = './assets/task/';
		$taskpic = $uploadPicdir.$taskFileName;
		move_uploaded_file($_FILES['task_pic']['tmp_name'], $taskpic);

		$data['result']=$this->apimobilizermodel->taskPic($task_id,$taskFileName,$task_lat);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function list_taskpic()
	{
		$_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{

			$res = array();
			$res["opn"] = "List Task Picture";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

        $task_id = '';
		$task_id = $this->input->post("task_id");

		$data['result']=$this->apimobilizermodel->listTaskpic($task_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function delete_taskpic()
	{
		$_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{

			$res = array();
			$res["opn"] = "Delete Task Picture";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

        $pic_id = '';
		$pic_id = $this->input->post("pic_id");

		$data['result']=$this->apimobilizermodel->deleteTaskpic($pic_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//


//-----------------------------------------------//

	public function add_mobilocation()
	{
		$_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{

			$res = array();
			$res["opn"] = "Add Mobilizer Location";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$user_id = '';
		$pia_id = '';
		$latitude  = '';
		$longitude = '';
		$location = '';
		$miles = '';
		$location_datetime  = '';

		$user_id = $this->input->post("user_id");
		$pia_id = $this->input->post("pia_id");
		$latitude = $this->input->post("latitude");
		$longitude  = $this->input->post("longitude");
		$location = $this->input->post("location");
		$miles = $this->input->post("miles");
		$location_datetime = $this->input->post("location_datetime");


		$data['result']=$this->apimobilizermodel->addMobilocation($user_id,$latitude,$longitude,$location,$miles,$location_datetime,$pia_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function start_and_stop_tracking()
	{
		$_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{

			$res = array();
			$res["opn"] = " Mobilizer Location";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$user_id = '';
		$pia_id = '';
		$latitude  = '';
		$longitude = '';
		$location = '';
		$miles = '';
		$location_datetime  = '';

		$user_id = $this->input->post("user_id");
		$pia_id = $this->input->post("pia_id");
		$latitude = $this->input->post("latitude");
		$longitude  = $this->input->post("longitude");
		$location = $this->input->post("location");
		$miles = $this->input->post("miles");
		$location_datetime = $this->input->post("location_datetime");
		$tracking_status= $this->input->post("tracking_status");

		$data['result']=$this->apimobilizermodel->start_and_stop_tracking($user_id,$tracking_status,$latitude,$longitude,$location,$miles,$location_datetime,$pia_id);
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

	$document         = $_FILES["upload_document"]["name"];
		$extension        = end((explode(".", $document)));
		$documentFileName = $user_id . '-' . time() . '.' . $extension;
		$uploaddir        = 'assets/documents/';
		$documentFile     = $uploaddir . $documentFileName;
		move_uploaded_file($_FILES['upload_document']['tmp_name'], $documentFile);

		$data['result']=$this->apimobilizermodel->document_details_upload($user_id,$documentFileName,$doc_master_id,$prospect_id,$proof_number);
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

		$data['result']=$this->apimobilizermodel->document_details_update($user_id,$userFileName,$doc_master_id,$prospect_id,$proof_number,$id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//


//-----------------------------------------------//

	public function update_attendance_mobilizer_comment(){

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


	 $attendance_id = $this->input->post("attendance_id");
	 $mobilizer_comments = $this->input->post("mobilizer_comments");
	 $user_id = $this->input->post("user_id");

	 $data['result']=$this->apimobilizermodel->update_attendance_mobilizer_comment($attendance_id,$mobilizer_comments,$user_id);
	 $response = $data['result'];
	 echo json_encode($response);
	}
	//-----------------------------------------------//



}
