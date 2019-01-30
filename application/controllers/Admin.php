<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('loginmodel');
		$this->load->model('adminmodel');
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
		$datas['result'] = $this->loginmodel->getadminuser($user_id);
			if($user_type==1 || $user_type==2){
				$this->load->view('admin/admin_header');
				$this->load->view('admin/admin_home',$datas);
				$this->load->view('admin/admin_footer');
			}else{
					 redirect('/');
				}
	}
	
	public function mobilization_plan()
	{
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		$datas['result'] = $this->adminmodel->mobilization_plan($user_id);
			if($user_type==1 || $user_type==2){
				$this->load->view('admin/admin_header');
				$this->load->view('admin/mobilization_plan',$datas);
				$this->load->view('admin/admin_footer');
			}else{
					 redirect('/');
				}
	}
	
	/* public function profile()
	{
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		$datas['result'] = $this->loginmodel->getadminuser($user_id);
			if($user_type==1 || $user_type==2){
				$this->load->view('admin/admin_header');
				$this->load->view('admin/profile',$datas);
				$this->load->view('admin/admin_footer');
			}else{
				redirect('/');
			}
	} */
	
	public function password_change()
	{
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		$datas['result'] = $this->loginmodel->getuser($user_id);
			
			if($user_type==1 || $user_type==2){
				$this->load->view('admin/admin_header');
				$this->load->view('admin/password_change',$datas);
				$this->load->view('admin/admin_footer');
			}else{
				redirect('/');
			}
	}

	public function check_password_match(){
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		if($user_type==1 || $user_type==2){
				$user_id  = base64_decode($this->uri->segment(3))/98765;
				$old_password=$this->input->post('old_password');
				$datas['res']=$this->adminmodel->check_password_match($old_password,$user_id);
		}else{
			redirect('/');
		}
			}

	public function password_update(){
		$datas = $this->session->userdata();
		$user_id = $this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		if($user_type==1 || $user_type==2){
			
				$new_password=$this->input->post('new_password');
				$datas['res']=$this->adminmodel->password_update($new_password,$user_id);
				echo $datas['res'];
		}else{
			redirect('/');
		}
	}
	
	public function create_staff()
	{
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		$datas['result'] = $this->loginmodel->getuser($user_id);
			
			if($user_type==1 || $user_type==2){
				$this->load->view('admin/admin_header');
				$this->load->view('admin/create_staff',$datas);
				$this->load->view('admin/admin_footer');
			}else{
				redirect('/');
			}
	}
	

		public function checkemail(){
			$datas=$this->session->userdata();
			$user_id=$this->session->userdata('user_id');
			$user_type=$this->session->userdata('user_type');
			if($user_type==1 || $user_type==2){
				 	$email=$this->input->post('email');
					$datas['res']=$this->adminmodel->checkemail($email);
			}else{
				redirect('/');
			}
		}

		public function checkmobile(){
			$datas=$this->session->userdata();
			$user_id=$this->session->userdata('user_id');
			$user_type=$this->session->userdata('user_type');
			if($user_type==1 || $user_type==2){
					$mobile=$this->input->post('mobile');
					$datas['res']=$this->adminmodel->checkmobile($mobile);
			}else{
				redirect('/');
			}
		}

		
		public function createstaff(){
        $datas=$this->session->userdata();
        $user_id=$this->session->userdata('user_id');
				$user_type=$this->session->userdata('user_type');
				if($user_type==1 || $user_type==2){
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
						$staff_prof_pic='';
					}else{
						$temp = pathinfo($profilepic, PATHINFO_EXTENSION);
						$staff_prof_pic = round(microtime(true)) . '.' . $temp;
						$uploaddir = 'assets/staff/';
						$profilepic = $uploaddir.$staff_prof_pic;
						move_uploaded_file($_FILES['staff_pic']['tmp_name'], $profilepic);
					}
					$datas=$this->adminmodel->create_staff_details($select_role,$name,$address,$email,$class_tutor,$mobile,$sec_phone,$sex,$dob,$nationality,$religion,$community_class,$community,$qualification,$status,$staff_prof_pic,$user_id);
					if($datas['status']=="success"){
						$this->session->set_flashdata('msg', 'Staff Created Successfully');
						redirect('admin/view_staff');
					}else if($datas['status']=="already"){
						$this->session->set_flashdata('msg', 'User Already Exists');
						redirect('admin/view_staff');
					}
					else{
						$this->session->set_flashdata('msg', 'Failed to Add');
						redirect('admin/view_staff');
					}
       }
       else{
          redirect('/');
       }
    }
	
	
	public function view_staff(){
				$datas=$this->session->userdata();
				$user_id=$this->session->userdata('user_id');
				$user_type=$this->session->userdata('user_type');
			if($user_type==1 || $user_type==2){
				 $datas['result']=$this->adminmodel->get_all_staff_details($user_id);
				 $this->load->view('admin/admin_header');
				 $this->load->view('admin/view_staff',$datas);
				 $this->load->view('admin/admin_footer');
			 }else{
				redirect('/');
			 }
		}
		
		
	public function edit_staff($staff_id){
				$datas=$this->session->userdata();
				$user_id=$this->session->userdata('user_id');
				$user_type=$this->session->userdata('user_type');
			if($user_type==1 || $user_type==2){
				$datas['result']=$this->adminmodel->get_staff_details_by_id($staff_id);
			  //echo "<pre>"; print_r($datas['result']);exit;
				 $this->load->view('admin/admin_header');
				 $this->load->view('admin/edit_staff',$datas);
				 $this->load->view('admin/admin_footer');
			 }
			 else{
					redirect('/');
			 }
		}
		
	public function checkemail_edit(){
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		if($user_type==1 || $user_type==2){
				$staff_id=base64_decode($this->uri->segment(3))/98765;
				$email=$this->input->post('email');
				$datas['res']=$this->adminmodel->checkemail_edit($email,$staff_id);
		}else{
			redirect('/');
		}
	}

	public function checkmobile_edit(){
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		if($user_type==1 || $user_type==2){
				$staff_id=base64_decode($this->uri->segment(3))/98765;
				$mobile=$this->input->post('mobile');
				$datas['res']=$this->adminmodel->checkmobile_edit($mobile,$staff_id);
		}else{
			redirect('/');
		}
	}
		
	public function update_staff_details(){
					$datas=$this->session->userdata();
					$user_id=$this->session->userdata('user_id');
					$user_type=$this->session->userdata('user_type');

					if($user_type==1 || $user_type==2){
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
													
						$datas=$this->adminmodel->update_staff_details_id($select_role,$name,$address,$email,$class_tutor,$mobile,$sec_phone,$sex,$dob,$nationality,$religion,$community_class,$community,$qualification,$status,$staff_prof_pic,$user_id,$staff_id);
						if($datas['status']=="success"){
							$this->session->set_flashdata('msg', ''.$name.' Updated Successfully');
							redirect('admin/view_staff');
						}else{
							$this->session->set_flashdata('msg', 'Failed to Add');
							redirect('admin/view_staff');
						}
				 }
				 else{
						redirect('/');
				 }
			}
				
	public function create_pia()
	{
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		$datas['result'] = $this->loginmodel->getuser($user_id);
			
			if($user_type==1 || $user_type==2){
				$this->load->view('admin/admin_header');
				$this->load->view('admin/create_pia',$datas);
				$this->load->view('admin/admin_footer');
			}else{
				redirect('/');
			}
	}
	
	public function check_unique_number(){
			$datas=$this->session->userdata();
			$user_id=$this->session->userdata('user_id');
			$user_type=$this->session->userdata('user_type');
			if($user_type==1 || $user_type==2){
				 	$unique_number=$this->input->post('unique_number');
					$datas['res']=$this->adminmodel->checkuniquenumber($unique_number);
			}else{
				redirect('/');
			}
		}
		
	public function createpia(){
        $datas=$this->session->userdata();
        $user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
				if($user_type==1 || $user_type==2){
					$unique_number=$this->input->post('unique_number');
					$name=$this->input->post('name');
					$mobile=$this->input->post('mobile');
					$email=$this->input->post('email');
					$state=$this->input->post('state');
					$address= $this->db->escape_str($this->input->post('address'));
					$status=$this->input->post('status');
					$profilepic = $_FILES['staff_pic']['name'];
					if(empty($profilepic)){
						$staff_prof_pic='';
					}else{
						$temp = pathinfo($profilepic, PATHINFO_EXTENSION);
						$staff_prof_pic = round(microtime(true)) . '.' . $temp;
						$uploaddir = 'assets/pia/';
						$profilepic = $uploaddir.$staff_prof_pic;
						move_uploaded_file($_FILES['staff_pic']['tmp_name'], $profilepic);
					}
					$datas=$this->adminmodel->create_pia_details($unique_number,$name,$mobile,$email,$state,$address,$status,$staff_prof_pic,$user_id);
					if($datas['status']=="success"){
						$this->session->set_flashdata('msg', 'PIA Created Successfully');
						redirect('admin/view_pia');
					}else if($datas['status']=="already"){
						$this->session->set_flashdata('msg', 'PIA Already Exists');
						redirect('admin/view_pia');
					}
					else{
						$this->session->set_flashdata('msg', 'Failed to Add');
						redirect('admin/view_pia');
					}
       }
       else{
          redirect('/');
       }
    }
	
	public function view_pia(){
				$datas=$this->session->userdata();
				$user_id=$this->session->userdata('user_id');
				$user_type=$this->session->userdata('user_type');
			if($user_type==1 || $user_type==2){
				 $datas['result']=$this->adminmodel->get_all_pia_details($user_id);
				  //echo "<pre>"; print_r($datas['result']);exit;
				 $this->load->view('admin/admin_header');
				 $this->load->view('admin/view_pia',$datas);
				 $this->load->view('admin/admin_footer');
			 }else{
				redirect('/');
			 }
		}
		
	public function edit_pia($pia_id){
				$datas=$this->session->userdata();
				$user_id=$this->session->userdata('user_id');
				$user_type=$this->session->userdata('user_type');
			if($user_type==1 || $user_type==2){
				 $datas['result']=$this->adminmodel->get_pia_details_by_id($pia_id);
				  //echo "<pre>"; print_r($datas['result']);exit;
				 $this->load->view('admin/admin_header');
				 $this->load->view('admin/edit_pia',$datas);
				 $this->load->view('admin/admin_footer');
			 }
			 else{
					redirect('/');
			 }
		}
		
		public function check_unique_number_edit(){
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		if($user_type==1 || $user_type==2){
				  $pia_id = base64_decode($this->uri->segment(3))/98765;
				  $unique_number = $this->input->post('unique_number');
				
				$datas['res']=$this->adminmodel->check_uniquenumber_edit($unique_number,$pia_id);
		}else{
			redirect('/');
		}
	}
	
	
	public function update_pia_details(){
					$datas=$this->session->userdata();
					$user_id=$this->session->userdata('user_id');
					$user_type=$this->session->userdata('user_type');

			if($user_type==1 || $user_type==2){
					$pia_id=base64_decode($this->input->post('pia_id'));	
					$unique_number=$this->input->post('unique_number');
					$name=$this->input->post('name');
					$mobile=$this->input->post('mobile');
					$email=$this->input->post('email');
					$state=$this->input->post('state');
					$address= $this->db->escape_str($this->input->post('address'));
					$status=$this->input->post('status');
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
					$datas=$this->adminmodel->update_pia_details_id($unique_number,$name,$mobile,$email,$state,$address,$status,$staff_prof_pic,$user_id,$pia_id);

					if($datas['status']=="success"){
						$this->session->set_flashdata('msg', ''.$name.' Updated Successfully');
						redirect('admin/view_pia');
					}else{
						$this->session->set_flashdata('msg', 'Failed to Update');
						redirect('admin/view_pia');
					}
				 }
				 else{
						redirect('/');
				 }
			}
			
			public function pia_dashboard(){
				$datas=$this->session->userdata();
				$user_id=$this->session->userdata('user_id');
				$user_type=$this->session->userdata('user_type');
			if($user_type==1 || $user_type==2){
				 $pia_id = base64_decode($this->uri->segment(3))/98765;
				 $datas['result']=$this->adminmodel->piaDashboard($pia_id);
				 //echo "<pre>"; print_r($datas['result']); exit;
				 $this->load->view('admin/admin_header');
				 $this->load->view('admin/pia_dashboard',$datas);
				 $this->load->view('admin/admin_footer');
			 }
			 else{
					redirect('/');
			 }
			}
			
			public function pia_center_list(){
				$datas=$this->session->userdata();
				$user_id=$this->session->userdata('user_id');
				$user_type=$this->session->userdata('user_type');
			
			if($user_type==1 || $user_type==2){
				 $pia_id = base64_decode($this->uri->segment(3))/98765;
				 $datas['piaid'] = $this->uri->segment(3);
				 $datas['result']=$this->adminmodel->piaCenterlist($pia_id);
				 //echo "<pre>"; print_r($datas['result']); exit;
				 $this->load->view('admin/admin_pia_header',$datas);
				 $this->load->view('admin/pia_center_list',$datas);
				 $this->load->view('admin/admin_footer');
			 }
			 else{
					redirect('/');
			 }
		}
		
		public function pia_mobilizer_list(){
				$datas=$this->session->userdata();
				$user_id=$this->session->userdata('user_id');
				$user_type=$this->session->userdata('user_type');
			
			if($user_type==1 || $user_type==2){
				 $pia_id = base64_decode($this->uri->segment(3))/98765;
				 $datas['piaid'] = $this->uri->segment(3);
				 $datas['result']=$this->adminmodel->piaMobilizerlist($pia_id);
				 //echo "<pre>"; print_r($datas['result']); exit;
				 $this->load->view('admin/admin_pia_header',$datas);
				 $this->load->view('admin/pia_mob_list',$datas);
				 $this->load->view('admin/admin_footer');
			 }
			 else{
					redirect('/');
			 }
		}
		
		public function pia_student_list(){
				$datas=$this->session->userdata();
				$user_id=$this->session->userdata('user_id');
				$user_type=$this->session->userdata('user_type');
			
			if($user_type==1 || $user_type==2){
				 $pia_id = base64_decode($this->uri->segment(3))/98765;
				 $datas['piaid'] = $this->uri->segment(3);
				 $datas['result']=$this->adminmodel->piaStudentlist($pia_id);
				 //echo "<pre>"; print_r($datas['result']); exit;
				 $this->load->view('admin/admin_pia_header',$datas);
				 $this->load->view('admin/pia_stud_list',$datas);
				 $this->load->view('admin/admin_footer');
			 }
			 else{
					redirect('/');
			 }
		}
	
}
