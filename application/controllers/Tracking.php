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

	public function pia_mobilizer_track(){
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		
		if($user_type==3){
					$pia_id = base64_decode($this->uri->segment(3))/98765;
					$datas['piaid'] = $this->uri->segment(3);
					
					$mob_id = base64_decode($this->uri->segment(4))/98765;
					$datas['mobid'] = $this->uri->segment(4);
					
					if ($mob_id == ''){
						$mob_id = $this->input->post('mob_id');
					}
					$datas['mob_id'] = $mob_id;
					
					$track_date = $this->input->post('track_date');
					$dateTime = new DateTime($track_date);
					$selected_date = date_format($dateTime,'Y-m-d');
					
					if ($selected_date == ''){
						$selected_date = date("Y-m-d");
					}
					
					$datas['selected_date'] = $selected_date;
		
			$datas['kms_using_lat']=$this->trackingmodel->kms_using_lat($mob_id,$selected_date);
			$datas['res']=$this->trackingmodel->location_map($mob_id,$selected_date);
			$datas['lat_long']=$this->trackingmodel->only_lat_long($mob_id,$selected_date);
			
			$this->load->view('pia/pia_header',$datas);
			$this->load->view('pia/tracking/mobilizer_tracking',$datas);
			$this->load->view('pia/pia_footer');

		}
		else{
			redirect('/');
		}
	}
}
