<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Graph extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('graphmodel');
	}


	public function home(){
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		
		if($user_type==3){
			$datas['res']=$this->graphmodel->get_mobilizer_id($user_id);
			$this->load->view('pia/pia_header');
			$this->load->view('pia/graph/graph',$datas);
			$this->load->view('pia/pia_footer');
		 }
		 else{
				redirect('/');
		 }
	}

}
