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
		$datas['dashboard']=$this->adminmodel->adminDashboard();
		$datas['admin_graph_details']=$this->adminmodel->admin_graph_details();
		$datas['pia_list']=$this->adminmodel->pia_list();
		$datas['mobilizer_list']=$this->adminmodel->mobilizer_list();
		$datas['students_list']=$this->adminmodel->students_list();
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
	
	 public function profile()
	{
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		$datas['result'] = $this->loginmodel->getadminuser($user_id);
		//print_r($datas);
			if($user_type==1 || $user_type==2){
				$this->load->view('admin/admin_header');
				$this->load->view('admin/profile',$datas);
				$this->load->view('admin/admin_footer');
			}else{
				redirect('/');
			}
	}
	
	
	public function profile_update(){
					$datas=$this->session->userdata();
					$user_id=$this->session->userdata('user_id');
					$user_type=$this->session->userdata('user_type');

					if($user_type==1 || $user_type==2){
						$staff_id=base64_decode($this->input->post('staff_id'));
						$name=$this->input->post('name');
						$address= $this->db->escape_str($this->input->post('address'));
						$email=$this->input->post('email');
						$class_tutor=$this->input->post('class_tutor');
						$mobile=$this->input->post('mobile');
						$sec_phone=$this->input->post('sec_phone');
						$sex=$this->input->post('sex');
						$sdate          = $this->input->post('dob');
						$dateTime       = new DateTime($sdate);
						$dob     = date_format($dateTime, 'Y-m-d');
						$nationality=$this->input->post('nationality');
						$religion=$this->input->post('religion');
						$community_class=$this->input->post('community_class');
						$community=$this->input->post('community');
						$qualification=$this->input->post('qualification');
						$staff_old_pic=$this->input->post('staff_old_pic');
						$profilepic = $_FILES['staff_new_pic']['name'];
						
						if(empty($profilepic)){
							$staff_prof_pic=$staff_old_pic;
						}else{
							$temp = pathinfo($profilepic, PATHINFO_EXTENSION);
							$staff_prof_pic = round(microtime(true)) . '.' . $temp;
							$uploaddir = 'assets/profile/';
							$profilepic = $uploaddir.$staff_prof_pic;
							move_uploaded_file($_FILES['staff_new_pic']['tmp_name'], $profilepic);
						}
													
						$datas=$this->adminmodel->profile_update($name,$address,$email,$class_tutor,$mobile,$sec_phone,$sex,$dob,$nationality,$religion,$community_class,$community,$qualification,$staff_prof_pic,$user_id,$staff_id);
							
						if($datas['status']=="success"){
							$this->session->set_flashdata('msg', ''.$name.' Updated Successfully');
							redirect('admin/profile');
						}else{
							$this->session->set_flashdata('msg', 'Failed');
							redirect('admin/profile');
						}
				 }
				 else{
						redirect('/');
				 }
			}
	
	
	
	
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
				$datas=$this->adminmodel->password_update($new_password,$user_id,$user_type);

				if($datas['status']=="success"){
					$this->session->set_flashdata('msg', 'Updated Successfully');
					redirect('admin/password_change');
				}else{
					$this->session->set_flashdata('msg', 'Failed to Update');
					redirect('admin/password_change');
				}
				
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
					//$select_role=$this->input->post('select_role');
					$select_role=2;
					$name=$this->input->post('name');
					$address= $this->db->escape_str($this->input->post('address'));
					$email=$this->input->post('email');
					$class_tutor=$this->input->post('class_tutor');
					$mobile=$this->input->post('mobile');
					$sec_phone=$this->input->post('sec_phone');
 					$sex=$this->input->post('sex');
					$sdate          = $this->input->post('dob');
					$dateTime       = new DateTime($sdate);
					$dob     = date_format($dateTime, 'Y-m-d');				
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
						$uploaddir1 = 'assets/profile/';
						
						$profilepic = $uploaddir.$staff_prof_pic;
						$profilepic1 = $uploaddir1.$staff_prof_pic;
						
						move_uploaded_file($_FILES['staff_pic']['tmp_name'], $profilepic);
						copy($profilepic, $profilepic1);
										
						/* 
						$temp = pathinfo($profilepic, PATHINFO_EXTENSION);
						$staff_prof_pic = round(microtime(true)) . '.' . $temp;
						$uploaddir = 'assets/staff/';
						$profilepic = $uploaddir.$staff_prof_pic;
						move_uploaded_file($_FILES['staff_pic']['tmp_name'], $profilepic); */
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
						//$select_role=$this->input->post('select_role');
						$select_role=2;
						$staff_id=base64_decode($this->input->post('staff_id'));
						$name=$this->input->post('name');
						$address= $this->db->escape_str($this->input->post('address'));
						$email=$this->input->post('email');
						$class_tutor=$this->input->post('class_tutor');
						$mobile=$this->input->post('mobile');
						$sec_phone=$this->input->post('sec_phone');
						$sex=$this->input->post('sex');
						$sdate          = $this->input->post('dob');
						$dateTime       = new DateTime($sdate);
						$dob     = date_format($dateTime, 'Y-m-d');
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
		$datas['schemes'] = $this->adminmodel->list_schemes();
		//print_r($datas['schemes']);
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
					$scheme=$this->input->post('scheme');
					$status=$this->input->post('status');
					$profilepic = $_FILES['staff_pic']['name'];
					if(empty($profilepic)){
						$staff_prof_pic='';
					}else{
						$temp = pathinfo($profilepic, PATHINFO_EXTENSION);
						$staff_prof_pic = round(microtime(true)) . '.' . $temp;
						
						$uploaddir = 'assets/pia/';
						$uploaddir1 = 'assets/profile/';
						
						$profilepic = $uploaddir.$staff_prof_pic;
						$profilepic1 = $uploaddir1.$staff_prof_pic;
						
						move_uploaded_file($_FILES['staff_pic']['tmp_name'], $profilepic);
						copy($profilepic, $profilepic1);

					}

					$datas=$this->adminmodel->create_pia_details($unique_number,$name,$mobile,$email,$state,$address,$scheme,$status,$staff_prof_pic,$user_id);
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
				$datas['schemes'] = $this->adminmodel->list_schemes();
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
					$scheme=$this->input->post('scheme');
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
					$datas=$this->adminmodel->update_pia_details_id($unique_number,$name,$mobile,$email,$state,$address,$scheme,$status,$staff_prof_pic,$user_id,$pia_id);

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
				 $datas['piaid'] = $this->uri->segment(3);
				 $datas['pia_details']=$this->adminmodel->piaDetails($pia_id);
				 $datas['result']=$this->adminmodel->piaDashboard($pia_id);
				 $datas['dash_mobilizer']=$this->adminmodel->dashMobilizer($pia_id);
				 $datas['dash_tasks']=$this->adminmodel->dashTasks($pia_id);
				 $datas['dash_trade']=$this->adminmodel->dashTrades($pia_id);
				 $datas['dash_students']=$this->adminmodel->dashStudents($pia_id);
				  $datas['dash_centers']=$this->adminmodel->dashCenters($pia_id);
				 $datas['pia_graph_details']=$this->adminmodel->pia_graph_details($pia_id);
				  
				 //echo "<pre>"; print_r($datas['pia_details']); exit;
				 $this->load->view('admin/admin_pia_header',$datas);
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
				 $datas['pia_details']=$this->adminmodel->piaDetails($pia_id);
				 $datas['result']=$this->adminmodel->piaCenterlist($pia_id);
				 
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
				 $datas['pia_details']=$this->adminmodel->piaDetails($pia_id);
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
				 $datas['pia_details']=$this->adminmodel->piaDetails($pia_id);
				 $datas['result']=$this->adminmodel->piaStudentlist($pia_id);
				 
				 $this->load->view('admin/admin_pia_header',$datas);
				 $this->load->view('admin/pia_stud_list',$datas);
				 $this->load->view('admin/admin_footer');
			 }
			 else{
					redirect('/');
			 }
		}
		
			
		public function pia_mobilizer_track(){
				$datas=$this->session->userdata();
				$user_id=$this->session->userdata('user_id');
				$user_type=$this->session->userdata('user_type');
				
				if($user_type==1 || $user_type==2){
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
					
					
					$datas['kms_using_lat']=$this->adminmodel->kms_using_lat($mob_id,$selected_date);
					$datas['res']=$this->adminmodel->testing_map($mob_id,$selected_date);
					$datas['lat_long']=$this->adminmodel->only_lat_long($mob_id,$selected_date);
					
					 $this->load->view('admin/admin_pia_header',$datas);
					 $this->load->view('admin/mobilizer_tracking',$datas);
					 $this->load->view('admin/admin_footer');
			 }
			 else{
					redirect('/');
			 }
		}
	
}
