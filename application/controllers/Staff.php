<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {


	function __construct() {
		 parent::__construct();


		    $this->load->helper('url');
		    $this->load->library('session');
				$this->load->model('staffmodel');




 }


	 	public function home(){
	 		 	$datas=$this->session->userdata();
  	 		$user_id=$this->session->userdata('user_id');
  			$user_type=$this->session->userdata('user_type');
				if($user_type==3){
			 	  $this->load->view('pia/pia_header');
	 		 		$this->load->view('pia/staff/create',$datas);
	 		 	  $this->load->view('pia/pia_footer');
	 		 }
	 		 else{
	 				redirect('/');
	 		 }
	 	}


    public function create(){
        $datas=$this->session->userdata();
        $user_id=$this->session->userdata('user_id');
				$user_type=$this->session->userdata('user_type');
				if($user_type==3){
					$select_role=$this->input->post('select_role');
					$name=$this->input->post('name');
					$address= $this->db->escape_str($this->input->post('address'));
					$email=$this->input->post('email');
					$class_tutor=$this->input->post('class_tutor');
					$mobile=$this->input->post('mobile');
					$sec_phone=$this->input->post('sec_phone');
 					$sex=$this->input->post('sex');
					$dob_date=$this->input->post('dob');
					$dateTime = new DateTime($dob_date);
					$dob=date_format($dateTime,'Y-m-d');
					$nationality=$this->input->post('nationality');
					$religion=$this->input->post('religion');
					$community_class=$this->input->post('community_class');
					$community=$this->input->post('community');
					$qualification=$this->input->post('qualification');
					$status=$this->input->post('status');
					$profilepic = $_FILES['staff_pic']['name'];
					if(empty($profilepic)){
						$staff_prof_pic=' ';
					}else{
						$temp = pathinfo($profilepic, PATHINFO_EXTENSION);
						$staff_prof_pic = round(microtime(true)) . '.' . $temp;
						$uploaddir = 'assets/staff/';
						$profilepic = $uploaddir.$staff_prof_pic;
						move_uploaded_file($_FILES['staff_pic']['tmp_name'], $profilepic);
					}
					$datas=$this->staffmodel->create_staff_details($select_role,$name,$address,$email,$class_tutor,$mobile,$sec_phone,$sex,$dob,$nationality,$religion,$community_class,$community,$qualification,$status,$staff_prof_pic,$user_id);
					if($datas['status']=="success"){
						$this->session->set_flashdata('msg', 'Staff Created Successfully');
						redirect('staff/view');
					}else if($datas['status']=="already"){
						$this->session->set_flashdata('msg', 'User Already Exists');
						redirect('staff/view');
					}
					else{
						$this->session->set_flashdata('msg', 'Failed to Add');
						redirect('staff/view');
					}
       }
       else{
          redirect('/');
       }
    }

		public function view(){
				$datas=$this->session->userdata();
				$user_id=$this->session->userdata('user_id');
				$user_type=$this->session->userdata('user_type');
			if($user_type==3){
			 $datas['result']=$this->staffmodel->get_all_staff_details($user_id);
			 $this->load->view('pia/pia_header');
			 $this->load->view('pia/staff/view',$datas);
			 $this->load->view('pia/pia_footer');
			 }else{
					redirect('/');
			 }
		}

		public function view_trainer(){
				$datas=$this->session->userdata();
				$user_id=$this->session->userdata('user_id');
				$user_type=$this->session->userdata('user_type');
			if($user_type==3){
			 $datas['result']=$this->staffmodel->get_all_staff_trainer($user_id);
			 $this->load->view('pia/pia_header');
			 $this->load->view('pia/staff/view_trainer',$datas);
			 $this->load->view('pia/pia_footer');
			 }else{
					redirect('/');
			 }
		}


		public function view_mobilizer(){
				$datas=$this->session->userdata();
				$user_id=$this->session->userdata('user_id');
				$user_type=$this->session->userdata('user_type');
			if($user_type==3){
			 $datas['result']=$this->staffmodel->get_all_staff_mobilizer($user_id);
			 $this->load->view('pia/pia_header');
			 $this->load->view('pia/staff/view_mobilizer',$datas);
			 $this->load->view('pia/pia_footer');
			 }else{
					redirect('/');
			 }
		}


		public function edit($staff_id){
				$datas=$this->session->userdata();
				$user_id=$this->session->userdata('user_id');
				$user_type=$this->session->userdata('user_type');
				if($user_type==3){
			 $datas['result']=$this->staffmodel->get_all_staff_details_by_id($staff_id);
			 // echo "<pre>"; print_r($datas['result']);exit;
			 $this->load->view('pia/pia_header');
			 $this->load->view('pia/staff/edit',$datas);
			 $this->load->view('pia/pia_footer');
			 }
			 else{
					redirect('/');
			 }
		}



				public function update_staff_details(){
						$datas=$this->session->userdata();
						$user_id=$this->session->userdata('user_id');
						$user_type=$this->session->userdata('user_type');
						if($user_type==3){
							$select_role=$this->input->post('select_role');
							$staff_id=base64_decode($this->input->post('staff_id'));
							$name=$this->input->post('name');
							$address= $this->db->escape_str($this->input->post('address'));
							$email=$this->input->post('email');
							$class_tutor=$this->input->post('class_tutor');
							$mobile=$this->input->post('mobile');
							$sec_phone=$this->input->post('sec_phone');
							$sex=$this->input->post('sex');
							$dob_date=$this->input->post('dob');
							$dateTime = new DateTime($dob_date);
							$dob=date_format($dateTime,'Y-m-d');
							$nationality=$this->input->post('nationality');
							$religion=$this->input->post('religion');
							$community_class=$this->input->post('community_class');
							$community=$this->input->post('community');
							$qualification=$this->input->post('qualification');
							$status=$this->input->post('status');
							$staff_old_pic=$this->input->post('staff_old_pic');
							$profilepic = $_FILES['staff_new_pic']['name'];
							if(empty($profilepic)){
								$staff_prof_pic=$staff_old_pic;
							}else{
								$temp = pathinfo($profilepic, PATHINFO_EXTENSION);
								$staff_prof_pic = round(microtime(true)) . '.' . $temp;
								$uploaddir = 'assets/staff/';
								$profilepic = $uploaddir.$staff_prof_pic;
								move_uploaded_file($_FILES['staff_new_pic']['tmp_name'], $profilepic);
							}
							$datas=$this->staffmodel->update_staff_details_to_id($select_role,$name,$address,$email,$class_tutor,$mobile,$sec_phone,$sex,$dob,$nationality,$religion,$community_class,$community,$qualification,$status,$staff_prof_pic,$user_id,$staff_id);
							if($datas['status']=="success"){
								$this->session->set_flashdata('msg', ''.$name.' Updated Successfully');
								redirect('staff/view');
							}else{
								$this->session->set_flashdata('msg', 'Failed to Add');
								redirect('staff/view');
							}
					 }
					 else{
							redirect('/');
					 }
				}





		public function checkemail(){
			$datas=$this->session->userdata();
			$user_id=$this->session->userdata('user_id');
			$user_type=$this->session->userdata('user_type');
			if($user_type==3){
				 	$email=$this->input->post('email');
					$datas['res']=$this->staffmodel->checkemail($email);
			}else{
				redirect('/');
			}
		}

	

		public function checkmobile(){
			$datas=$this->session->userdata();
			$user_id=$this->session->userdata('user_id');
			$user_type=$this->session->userdata('user_type');
			if($user_type==3){
					$mobile=$this->input->post('mobile');
					$datas['res']=$this->staffmodel->checkmobile($mobile);
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
					$email=$this->input->post('email');
					$datas['res']=$this->staffmodel->checkemail_edit($email,$staff_id);
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
					$mobile=$this->input->post('mobile');
					$datas['res']=$this->staffmodel->checkmobile_edit($mobile,$staff_id);
			}else{
				redirect('/');
			}
		}








}