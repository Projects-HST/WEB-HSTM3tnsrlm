<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {

	function __construct()
		 {
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->model('loginmodel');
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
			 $datas['result']=$this->loginmodel->piaDashboard($user_id);
			$datas['dash_mobilizer']=$this->loginmodel->dashMobilizer($user_id);
			$datas['dash_tasks']=$this->loginmodel->dashTasks($user_id);
		    $datas['dash_trade']=$this->loginmodel->dashTrades($user_id);
			$datas['dash_students']=$this->loginmodel->dashStudents($user_id);
			$datas['pia_graph_details']=$this->loginmodel->pia_graph_details($user_id);
			 
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

		public function profile()
		{
			 $datas=$this->session->userdata();
			 $user_id=$this->session->userdata('user_id');
			 $user_type=$this->session->userdata('user_type');
				$datas['result'] = $this->loginmodel->getuser($user_id);
				if($user_type==1){

				}else if($user_type==2){

				}else if($user_type==3){
					$this->load->view('pia/pia_header');
					$this->load->view('pia/profile',$datas);
					$this->load->view('pia/pia_footer');
				}else{
						 redirect('/');
					}
			}
			
			public function password_change()
			{
			 $datas=$this->session->userdata();
			 $user_id=$this->session->userdata('user_id');
			 $user_type=$this->session->userdata('user_type');
				$datas['result'] = $this->loginmodel->getuser($user_id);
				if($user_type==1){

				}else if($user_type==2){

				}else if($user_type==3){
					$this->load->view('pia/pia_header');
					$this->load->view('pia/password_change',$datas);
					$this->load->view('pia/pia_footer');
				}else{
						 redirect('/');
					}
			}
			
			public function profile_update()
			{
				 $datas=$this->session->userdata();
				 $user_id=$this->session->userdata('user_id');
				 $user_type=$this->session->userdata('user_type');
					if($user_type==3){
						$pia_name=$this->db->escape_str($this->input->post('pia_name'));
						$pia_phone=$this->db->escape_str($this->input->post('pia_phone'));
						$pia_email=$this->db->escape_str($this->input->post('pia_email'));
						$pia_address=$this->db->escape_str($this->input->post('pia_address'));
						$pia_state=$this->db->escape_str($this->input->post('pia_state'));
						$pia_id=$this->db->escape_str($this->input->post('pia_id'));
						$staff_old_pic=$this->input->post('staff_old_pic');
						$profilepic = $_FILES['staff_new_pic']['name'];
						
						if(empty($profilepic)){
							$staff_prof_pic=$staff_old_pic;
						}else{
							$temp = pathinfo($profilepic, PATHINFO_EXTENSION);
							$staff_prof_pic = round(microtime(true)) . '.' . $temp;
							$uploaddir = 'assets/pia/';
							$profilepic = $uploaddir.$staff_prof_pic;
							move_uploaded_file($_FILES['staff_new_pic']['tmp_name'], $profilepic);
						}
						
					$datas=$this->loginmodel->profile_update($pia_name,$pia_phone,$pia_email,$pia_address,$pia_state,$pia_id,$user_id,$staff_prof_pic);

					if($datas['status']=="success"){
							$this->session->set_flashdata('msg', ''.$pia_name.' Updated Successfully');
							redirect('dashboard/profile/');
						}else{
							$this->session->set_flashdata('msg', 'Failed');
							redirect('dashboard/profile/');
						}
					}else{
							 redirect('/');
						}
			}


			public function checkemail_edit(){
				$datas=$this->session->userdata();
				$user_id=$this->session->userdata('user_id');
				$user_type=$this->session->userdata('user_type');
				if($user_type==3){
					 	$staff_id=base64_decode($this->uri->segment(3))/98765;
						$email=$this->input->post('pia_email');
						$datas['res']=$this->loginmodel->checkemail_edit($email,$staff_id);
				}else{
					redirect('/');
				}
			}


			public function checkmobile_edit(){
				$datas=$this->session->userdata();
				$user_id=$this->session->userdata('user_id');
				$user_type=$this->session->userdata('user_type');
				if($user_type==3){
						$staff_id=base64_decode($this->uri->segment(3))/98765;
						$mobile=$this->input->post('pia_phone');
						$datas['res']=$this->loginmodel->checkmobile_edit($mobile,$staff_id);
				}else{
					redirect('/');
				}
			}

			public function check_password_match(){
				$datas=$this->session->userdata();
				$user_id=$this->session->userdata('user_id');
				$user_type=$this->session->userdata('user_type');
				if($user_type==3){
						$staff_id=base64_decode($this->uri->segment(3))/98765;
						$old_password=$this->input->post('old_password');
						$datas['res']=$this->loginmodel->check_password_match($old_password,$staff_id);
				}else{
					redirect('/');
				}
			}


		public function password_update(){
			$datas = $this->session->userdata();
			$user_id = $this->session->userdata('user_id');
			$user_type=$this->session->userdata('user_type');
		
			if($user_type==3){
				$new_password=$this->input->post('new_password');
				$datas=$this->loginmodel->password_update($new_password,$user_id,$user_type);

				if($datas['status']=="success"){
						$this->session->set_flashdata('msg', 'Updated Successfully');
						redirect('dashboard/password_change');
				}else{
						$this->session->set_flashdata('msg', 'Failed to Update');
						redirect('dashboard/password_change');
				}
			}else{
				redirect('/');
			}
		}


}
