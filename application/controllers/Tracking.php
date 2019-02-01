<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tracking extends CI_Controller {


	function __construct() {
		 parent::__construct();


		    $this->load->helper('url');
		    $this->load->library('session');
				$this->load->model('trackingmodel');




 }




	 	public function home(){
	 		 	$datas=$this->session->userdata();
  	 		$user_id=$this->session->userdata('user_id');
  			$user_type=$this->session->userdata('user_type');
				if($user_type==3){
				$datas['res']=$this->trackingmodel->get_mobilizer_id($user_id);
			 $this->load->view('pia/pia_header');
	 		 $this->load->view('pia/tracking/select_user',$datas);
	 		 $this->load->view('pia/pia_footer');
	 		 }
	 		 else{
	 				redirect('/');
	 		 }
	 	}


		// public function map(){
		// 		$datas=$this->session->userdata();
		// 		$user_id=$this->session->userdata('user_id');
		// 		$user_type=$this->session->userdata('user_type');
		// 		if($user_type==3){
		// 		$user_id=$this->input->post('user_id');
		// 		$selected_date=$this->input->post('selected_date');
		// 	 $datas['res']=$this->trackingmodel->get_lat_and_long_id($user_id,$selected_date);
		// 	 $datas['result']=$this->trackingmodel->get_lat_and_long_id_table_view($user_id,$selected_date);
		// 	 $this->load->view('header');
		// 	 $this->load->view('tracking/map',$datas);
		// 	 $this->load->view('footer');
		// 	 }
		// 	 else{
		// 			redirect('/');
		// 	 }
		// }

		public function usertrack(){
				$datas=$this->session->userdata();
				$user_id=$this->session->userdata('user_id');
				$user_type=$this->session->userdata('user_type');
				if($user_type==3){
					$user_id=$this->input->post('user_id');

					$dob_date=$this->input->post('selected_date');
		       $dateTime = new DateTime($dob_date);
		       $selected_date=date_format($dateTime,'Y-m-d');

					//$datas['kms']=$this->trackingmodel->calculatekms($user_id,$selected_date);
					$datas['kms_using_lat']=$this->trackingmodel->kms_using_lat($user_id,$selected_date);
					$datas['res']=$this->trackingmodel->testing_map($user_id,$selected_date);
					$datas['lat_long']=$this->trackingmodel->only_lat_long($user_id,$selected_date);

			 $this->load->view('pia/pia_header');
			 $this->load->view('pia/tracking/user_track',$datas);
			 $this->load->view('pia/pia_footer');
			 }
			 else{
					redirect('/');
			 }
		}

		public function testing_map(){
				$datas=$this->session->userdata();
				$user_id=$this->session->userdata('user_id');
				$user_type=$this->session->userdata('user_type');
				if($user_type==3){
					$datas['res']=$this->trackingmodel->testing_map();
					echo json_encode($datas['res']);
			 }
			 else{
					redirect('/');
			 }
		}

		public function track(){
				$datas=$this->session->userdata();
				$user_id=$this->session->userdata('user_id');
				$user_type=$this->session->userdata('user_type');
				if($user_type==3){
				$user_id=$this->input->post('user_id');
				$selected_date=$this->input->post('selected_date');
			 // $datas['res']=$this->trackingmodel->get_lat_and_long_id($user_id,$selected_date);
			 $datas['res']=$this->trackingmodel->testing_track($user_id,$selected_date);
				 // $datas['result']=$this->trackingmodel->get_lat_and_long_id_table_view($user_id,$selected_date);
			 $this->load->view('pia/pia_header');
			 $this->load->view('pia/tracking/track',$datas);
			 $this->load->view('pia/pia_footer');
			 }
			 else{
					redirect('/');
			 }
		}

		public function tracking_details(){
				$datas=$this->session->userdata();
				$user_id=$this->session->userdata('user_id');
				$user_type=$this->session->userdata('user_type');
				if($user_type==1 || $user_type==2){
					$datas['res']=$this->trackingmodel->testing_track();
					echo json_encode($datas['res']);
			 }
			 else{
					redirect('/');
			 }
		}














}
