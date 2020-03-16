<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apimain extends CI_Controller {


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
		$this->load->model("apimainmodel");
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

	public function login()
	{
	   $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Login";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$user_name = '';
		$password = '';
		$gcmkey ='';
		$mobiletype ='';

		$username = $this->input->post("user_name");
		$password = $this->input->post("password");
		$gcmkey = $this->input->post("device_id");
		$mobiletype = $this->input->post("mobile_type");


		$data['result']=$this->apimainmodel->Login($username,$password,$gcmkey,$mobiletype);
		$response = $data['result'];
		echo json_encode($response);
	}


//-----------------------------------------------//

	public function user_profilepic()
	{
        $_POST = json_decode(file_get_contents("php://input"), TRUE);

		$user_id = $this->uri->segment(3);
		$profile = $_FILES["user_pic"]["name"];
		$temp = pathinfo($profile, PATHINFO_EXTENSION);
		$userFileName = round(microtime(true)) . '.' . $temp;
		$uploaddir = 'assets/profile/';
		$profilepic = $uploaddir.$userFileName;
		move_uploaded_file($_FILES['user_pic']['tmp_name'], $profilepic);

		$data['result']=$this->apimainmodel->updateProfilepic($user_id,$userFileName);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

	public function forgot_password()
	{
		$_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Forgot password";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$user_name = '';
		$old_password = '';
		$password = '';

		$user_name = $this->input->post("user_name");

		$data['result']=$this->apimainmodel->forgotPassword($user_name);
		$response = $data['result'];
		echo json_encode($response);
	}
//-----------------------------------------------//

	public function change_password()
	{
		$_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Change Password";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$user_id = '';
		$old_password = '';
		$password = '';

		$user_id = $this->input->post("user_id");
		$old_password = $this->input->post("old_password");
	 	$password = $this->input->post("new_password");

		$data['result']=$this->apimainmodel->changePassword($user_id,$old_password,$password);
		$response = $data['result'];
		echo json_encode($response);
	}


//-----------------------------------------------//
//-----------------------------------------------//

	public function admin_dashboard()
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


		$data['result']=$this->apimainmodel->admin_dashboard($user_id);
		$response = $data['result'];
		echo json_encode($response);
	}


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

		$user_id  ='';
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

		$user_id = $this->input->post("user_id");
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

		$data['result']=$this->apimainmodel->createUser($user_id,$name,$sex,$dob,$nationality,$religion,$community_class,$community,$address,$email,$sec_email,$phone,$sec_phone,$qualification);
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

		$user_id  ='';
		$user_id = $this->input->post("user_id");

		$data['result']=$this->apimainmodel->userList($user_id);
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

		$user_master_id  ='';
		$user_master_id = $this->input->post("user_master_id");
		$role_type = $this->input->post("role_type");


		$data['result']=$this->apimainmodel->user_profile($user_master_id,$role_type);
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

		$user_master_id  ='';
		$user_master_id = $this->input->post("user_master_id");
		$role_type = $this->input->post("role_type");
		$name = $this->input->post("name");
		$address = $this->input->post("address");
		$email = $this->input->post("email");
		$phone = $this->input->post("phone");
		$data['result']=$this->apimainmodel->user_profile_update($user_master_id,$role_type,$name,$address,$email,$phone);
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

		$user_master_id  ='';
		$user_master_id = $this->input->post("user_master_id");


		$data['result']=$this->apimainmodel->userDetails($user_master_id);
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

		$user_id  ='';
		$user_master_id = '';
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

		$user_id = $this->input->post("user_id");
		$user_master_id = $this->input->post("user_master_id");
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


		$data['result']=$this->apimainmodel->updateUser($user_id,$user_master_id,$name,$sex,$dob,$nationality,$religion,$community_class,$community,$address,$email,$sec_email,$phone,$sec_phone,$qualification,$status);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//



//-----------------------------------------------//

	public function create_pia()
	{
	   $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Create PIA";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$user_id  ='';
		$unique_number  ='';
		$name = '';
		$address = '';
		$phone = '';
		$email = '';


		$user_id = $this->input->post("user_id");
		$unique_number = $this->input->post("unique_number");
		$name = $this->input->post('name');
		$address = $this->db->escape_str($this->input->post('address'));
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');

		$data['result']=$this->apimainmodel->createPia($user_id,$unique_number,$name,$address,$phone,$email);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function pia_list()
	{
	  $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "PIA List";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$user_id  ='';
		$user_id = $this->input->post("user_id");

		$data['result']=$this->apimainmodel->piaList($user_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function pia_details()
	{
	  $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "PIA Details";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$user_master_id  ='';
		$user_master_id = $this->input->post("pia_id");

		$data['result']=$this->apimainmodel->piaDetails($user_master_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function update_pia()
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

		$user_id  ='';
		$pia_id = '';
		$unique_number = '';
		$name = '';
		$address = '';
		$phone = '';
		$email = '';
		$status ='';

		$user_id = $this->input->post("user_id");
		$pia_id = $this->input->post("pia_id");
		$unique_number = $this->input->post("unique_number");
		$name = $this->input->post('name');
		$address = $this->db->escape_str($this->input->post('address'));
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$status =$this->input->post('status');

		$data['result']=$this->apimainmodel->updatePia($user_id,$pia_id,$unique_number,$name,$address,$phone,$email,$status);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function pia_plan_list()
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

		$user_id  ='';
		$user_id = $this->input->post("user_id");

		$data['result']=$this->apimainmodel->piaPlanlist($user_id);
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
			$res["opn"] = "Pia Dashboard";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$pia_id  ='';
		$pia_id = $this->input->post("pia_id");

		$data['result']=$this->apimainmodel->piaDashboard($pia_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function pia_center_list()
	{
	   $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Pia Centre List";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$pia_id  ='';
		$pia_id = $this->input->post("pia_id");

		$data['result']=$this->apimainmodel->piaCenterlist($pia_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function pia_mob_list()
	{
	   $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Pia Mobilizer List";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$pia_id  ='';
		$pia_id = $this->input->post("pia_id");

		$data['result']=$this->apimainmodel->piaMoblist($pia_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function pia_mob_details()
	{
	   $_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "Pia Mobilizer Details";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		//$pia_id  ='';
		$mob_id  ='';
		//$pia_id = $this->input->post("pia_id");
		$mob_id = $this->input->post("mob_id");

		$data['result']=$this->apimainmodel->piaMobdetails($mob_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function pia_list_students()
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

		$mob_id= '';
	 	$mob_id = $this->input->post("mob_id");


		$data['result']=$this->apimainmodel->pialistStudents($mob_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function mobilizer_tracking()
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


		$data['result']=$this->apimainmodel->mobilizerTracking($mob_id,$track_date);
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

		$user_id  ='';
		$user_id = $this->input->post("user_id");

		$data['result']=$this->apimainmodel->Centerlist($user_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//



//-----------------------------------------------//

	public function user_activity()
	{

		$_POST = json_decode(file_get_contents("php://input"), TRUE);

		if(!$this->checkMethod())
		{
			return FALSE;
		}

		if($_POST == FALSE)
		{
			$res = array();
			$res["opn"] = "User Activity";
			$res["scode"] = 204;
			$res["message"] = "Input error";

			echo json_encode($res);
			return;
		}

		$user_id  ='';
		$user_id = $this->input->post("user_id");
		$activity_detail= $this->input->post("activity_detail");


		$data['result']=$this->apimainmodel->user_activity($user_id,$activity_detail);
		$response = $data['result'];
		echo json_encode($response);
	}


//-----------------------------------------------//
//-----------------------------------------------//

	public function admin_graph_details()
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

		$user_id  ='';
		$user_id = $this->input->post("user_id");

		$data['result']=$this->apimainmodel->admin_graph_details($user_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//

//-----------------------------------------------//

	public function pia_graph_details()
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
		$pia_id = $this->input->post("pia_id");

		$data['result']=$this->apimainmodel->pia_graph_details($pia_id);
		$response = $data['result'];
		echo json_encode($response);
	}

//-----------------------------------------------//


}
