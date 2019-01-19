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

		$username = '';
		$password = '';
		$gcmkey ='';
		$mobiletype ='';

		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$gcmkey = $this->input->post("gcm_key");
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
		$userFileName = time().'-'.$profile;

		$uploadPicdir = 'assets/profile/';
		
		$profilepic = $uploadPicdir.$userFileName;
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
}
