<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
		 {
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->model('loginmodel');
			// $this->load->model('dashboard');


			 }

	public function index()
	{
		$this->load->view('login');
	}

	public function checklogin(){
		//$schoolid=$this->input->post('school_id');
		$email=$this->input->post('username');
		$password=md5($this->input->post('password'));
		$result = $this->loginmodel->login($email,$password);
		$msg=$result['msg'];

	if($result['status']=='Inactive'){
		$datas['user_data']=array("status"=>$result['status'],"msg"=>$result['msg']);
		$this->session->set_flashdata('msg', ' Account Deactivated');
		 redirect('/');
	}
	if($result['status']=='notRegistered'){
		$datas['user_data']=array("status"=>$result['status'],"msg"=>$result['msg']);
		$this->session->set_flashdata('msg', 'Invalid Login');
		 redirect('/');
	}
	$user_type=$this->session->userdata('user_type');
	 $user_type1=$result['user_type'];




			if($result['status']=='Active')
			{
				switch($user_type1)
				{
					case '1':
				$user_name=$result['user_name'];
				$pia_id=$result['pia_id'];
				$msg=$result['msg'];$name=$result['name'];$user_type=$result['user_type'];$status=$result['status'];$user_id=$result['user_id'];$user_pic=$result['user_pic'];
				$datas= array("user_name"=>$user_name,"pia_id"=>$pia_id, "msg"=>$msg,"name"=>$name,"user_type"=>$user_type,"status"=>$status,"user_id"=>$user_id,"user_pic"=>$user_pic);
						//$this->session->userdata($user_name);
						$session_data=$this->session->set_userdata($datas);
						print_r($datas);exit;

					break;
					case '2':
				$user_name=$result['user_name'];$pia_id=$result['pia_id'];$msg=$result['msg'];$name=$result['name'];$user_type=$result['user_type'];$status=$result['status'];$user_id=$result['user_id'];$user_pic=$result['user_pic'];
				$datas= array("user_name"=>$user_name,"pia_id"=>$pia_id, "msg"=>$msg,"name"=>$name,"user_type"=>$user_type,"status"=>$status,"user_id"=>$user_id,"user_pic"=>$user_pic);
						//$this->session->userdata($user_name);
						$session_data=$this->session->set_userdata($datas);
							print_r($datas);exit;
					break;
					case '3':
					$user_name=$result['user_name'];$pia_id=$result['pia_id'];$msg=$result['msg'];$name=$result['name'];$user_type=$result['user_type'];$status=$result['status'];$user_id=$result['user_id'];$user_pic=$result['user_pic'];
					$datas= array("user_name"=>$user_name,"pia_id"=>$pia_id,"msg"=>$msg,"name"=>$name,"user_type"=>$user_type,"status"=>$status,"user_id"=>$user_id,"user_pic"=>$user_pic);
					// $datas['user_details']=$this->dashboard->dash_teacher($user_id);
					$session_data=$this->session->set_userdata($datas);
					$this->load->view('pia/pia_header');
					$this->load->view('pia/pia_home',$datas);
					$this->load->view('pia/pia_footer');
					break;

				}
		}
		elseif($msg=="Password Wrong"){
			$datas['user_data']=array("status"=>$result['status'],"msg"=>$result['msg']);
			$this->session->set_flashdata('msg', 'Password Wrong');
			redirect('/');
		}
		else{
			$datas['user_data']=array("status"=>$result['status'],"msg"=>$result['msg']);
			$this->session->set_flashdata('msg', ' Email invalid');
			 redirect('/');
		}
	}
}
