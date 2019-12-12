<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('loginmodel');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function checklogin(){

		$username=$this->input->post('username');
		$password=md5($this->input->post('password'));
		$result = $this->loginmodel->login($username,$password);
		
		print_r($result);
		exit;
		$user_type = $result['user_type'];

		if($result['status']=='Inactive'){
			//$datas['user_data']=array("status"=>$result['status'],"msg"=>$result['msg']);
			$this->session->set_flashdata('msg', 'Account inactive, please contact admin');
			redirect('/');
		}
	
		if($result['status']=='Error'){
			//$datas['user_data']=array("status"=>$result['status'],"msg"=>$result['msg']);
			$this->session->set_flashdata('msg', 'Invalid Login');
			redirect('/');
		}
		
		if($result['status']=='Active'){
			switch($user_type)
			{
				case '1':
					$user_name = $result['user_name'];
					$pia_id = $result['pia_id'];
					//$msg = $result['msg'];
					$name=$result['name'];
					$user_type=$result['user_type'];
					$status=$result['status'];
					$user_id=$result['user_id'];
					$user_pic=$result['user_pic'];
				$datas= array("user_name"=>$user_name,"pia_id"=>$pia_id, "name"=>$name,"user_type"=>$user_type,"status"=>$status,"user_id"=>$user_id,"user_pic"=>$user_pic);
						$session_data=$this->session->set_userdata($datas);
						redirect('admin/home');
				break;
				
				case '2':
				$user_name=$result['user_name'];
				$pia_id=$result['pia_id'];
				//$msg=$result['msg'];
				$name=$result['name'];
				$user_type=$result['user_type'];
				$status=$result['status'];
				$user_id=$result['user_id'];
				$user_pic=$result['user_pic'];
				$datas= array("user_name"=>$user_name,"pia_id"=>$pia_id, "name"=>$name,"user_type"=>$user_type,"status"=>$status,"user_id"=>$user_id,"user_pic"=>$user_pic);
						$session_data=$this->session->set_userdata($datas);
						redirect('admin/home');
				break;
				
				case '3':
					$user_name=$result['user_name'];$pia_id=$result['pia_id'];$msg=$result['msg'];$name=$result['name'];$user_type=$result['user_type'];$status=$result['status'];$user_id=$result['user_id'];$user_pic=$result['user_pic'];
					$datas= array("user_name"=>$user_name,"pia_id"=>$pia_id,"name"=>$name,"user_type"=>$user_type,"status"=>$status,"user_id"=>$user_id,"user_pic"=>$user_pic);
					$session_data=$this->session->set_userdata($datas);
					redirect('dashboard/home');
				break;
			}
		}
	}


	public function logout(){
		$datas=$this->session->userdata();
		$this->session->unset_userdata($datas);
		$this->session->sess_destroy();
		redirect('/');
	}

	public function forgot_email(){
		$forgot_email=$this->input->post('forgot_email');
		$datas['res'] = $this->loginmodel->forgot_email($forgot_email);
	}
}
