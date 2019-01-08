<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
				$this->load->view('welcome_message');
			}
		public function home()
			{
				 $datas=$this->session->userdata();
				 $user_id=$this->session->userdata('user_id');
				  $user_type=$this->session->userdata('user_type');
					$datas['result'] = $this->loginmodel->getuser($user_id);
					if($user_type==1){

					}else if($user_type==2){

					}else if($user_type==3){
						$this->load->view('pia/pia_header');
						$this->load->view('pia/pia_home',$datas);
						$this->load->view('pia/pia_footer');
					}else{
							 redirect('/');
						}
			}

}
