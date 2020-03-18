<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admission extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('admissionmodel');
	}

	public function home()
	{
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		$datas['trade'] = $this->admissionmodel->getall_trade($user_id);
		$datas['blood'] = $this->admissionmodel->getall_blood_group();
		if($user_type==3){
			$this->load->view('pia/pia_header');
			$this->load->view('pia/admission/add',$datas);
			$this->load->view('pia/pia_footer');
		}else{
			redirect('/');
		}
	}



	public function create()
	{
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		if($user_type==3)
		{
			//$had_aadhar_card=$this->input->post('had_aadhar_card');
			$had_aadhar_card='1';
			$aadhar_card_num=$this->input->post('aadhar_card_num');
			$admission_location=$this->input->post('admission_location');
			$admit_date=$this->input->post('admission_date');
			$dateTime1 = new DateTime($admit_date);
			$admission_date=date_format($dateTime1,'Y-m-d' );
			$name=$this->input->post('name');
			$sex=$this->input->post('sex');
			$fname=$this->input->post('fname');
			$mname=$this->input->post('mname');
			$dob=$this->input->post('dob');
			$dateTime = new DateTime($dob);
			$dob_date=date_format($dateTime,'Y-m-d');
			$age=$this->input->post('age');
			$mobile=$this->input->post('mobile');
			$sec_mobile=$this->input->post('sec_mobile');
			$email=$this->input->post('email');
			$father_mobile=$this->input->post('father_mobile');
			$mother_mobile=$this->input->post('mother_mobile');
			$head_family=$this->input->post('head_family');
			$head_education=$this->input->post('head_education');
			$yearly_income=$this->input->post('yearly_income');
			$no_family=$this->input->post('no_family');
			$languages=$this->input->post('languages');
			$address=$this->input->post('address');
			$city=$this->input->post('city');
			$state=$this->input->post('state');
			$nationality=$this->input->post('nationality');
			$religion=$this->input->post('religion');
			$mother_tongue=$this->input->post('mother_tongue');
			$community=$this->input->post('community');
			$community_class=$this->input->post('community_class');
			$identification_marks1=$this->input->post('identification_marks1');	
			$identification_marks2=$this->input->post('identification_marks2');	
			$blood_group=$this->input->post('blood_group');
			$prefer_trade=$this->input->post('prefer_trade');
			$disability=$this->input->post('disability');
			
			
			$qualification=$this->input->post('qualification');
			$qualification_details=$this->input->post('qualification_details');
			$promotion_status=$this->input->post('promotion_status');
			$year_education=$this->input->post('year_education');
			$year_passing=$this->input->post('year_passing');
			$institute_name=$this->input->post('institute_name');
			$edu_doc_type=$this->input->post('edu_doc_type');
			
			
			$job_type=$this->input->post('job_type');
			$status=$this->input->post('status');
			
			$aadhar_card_doc = $_FILES["aadhar_card_doc"]["name"];
			if(empty($aadhar_card_doc)){
				$aadhar_cardName='';
			}else{
				$temp = pathinfo($aadhar_card_doc, PATHINFO_EXTENSION);
				$aadhar_cardName = 'aadhar_'.round(microtime(true)) . '.' . $temp;
				$uploaddir = 'assets/documents/';
				$aadharcard_file = $uploaddir.$aadhar_cardName;
				move_uploaded_file($_FILES['aadhar_card_doc']['tmp_name'], $aadharcard_file);
			}
			
			$community_doc = $_FILES["community_doc"]["name"];
			if(empty($community_doc)){
				$community_docName='';
			}else{
				$temp = pathinfo($community_doc, PATHINFO_EXTENSION);
				$community_docName = 'community_'.round(microtime(true)) . '.' . $temp;
				$uploaddir = 'assets/documents/';
				$community_file = $uploaddir.$community_docName;
				move_uploaded_file($_FILES['community_doc']['tmp_name'], $community_file);
			}
			
			$disability_doc = $_FILES["disability_doc"]["name"];
			if(empty($disability_doc)){
				$disability_docName='';
			}else{
				$temp = pathinfo($disability_doc, PATHINFO_EXTENSION);
				$disability_docName = 'disability_'.round(microtime(true)) . '.' . $temp;
				$uploaddir = 'assets/documents/';
				$disability_file = $uploaddir.$disability_docName;
				move_uploaded_file($_FILES['disability_doc']['tmp_name'], $disability_file);
			}
					
			
			$student_pic = $_FILES["student_pic"]["name"];
			if(empty($student_pic)){
				$userPicName='';
			}else{
				$temp = pathinfo($student_pic, PATHINFO_EXTENSION);
				$userPicName = 'profile_'.round(microtime(true)) . '.' . $temp;
				$uploaddir = 'assets/students/';
				$profilepic = $uploaddir.$userPicName;
				move_uploaded_file($_FILES['student_pic']['tmp_name'], $profilepic);
			}
			
			$edu_doc = $_FILES["edu_doc"]["name"];
			if(empty($edu_doc)){
				$edu_docName='';
			}else{
				$temp = pathinfo($edu_doc, PATHINFO_EXTENSION);
				$edu_docName = 'edu_'.round(microtime(true)) . '.' . $temp;
				$uploaddir = 'assets/documents/';
				$education_file = $uploaddir.$edu_docName;
				move_uploaded_file($_FILES['edu_doc']['tmp_name'], $education_file);
			}
			
			$rationcard_doc = $_FILES["rationcard_doc"]["name"];
			if(empty($rationcard_doc)){
				$rationcard_docName='';
			}else{
				$temp = pathinfo($rationcard_doc, PATHINFO_EXTENSION);
				$rationcard_docName = 'ration_'.round(microtime(true)) . '.' . $temp;
				$uploaddir = 'assets/documents/';
				$rationcard_file = $uploaddir.$rationcard_docName;
				move_uploaded_file($_FILES['rationcard_doc']['tmp_name'], $rationcard_file);
			}
			
			$voterid_doc = $_FILES["voterid_doc"]["name"];
			if(empty($voterid_doc)){
				$voterid_docName='';
			}else{
				$temp = pathinfo($voterid_doc, PATHINFO_EXTENSION);
				$voterid_docName = 'voter_'.round(microtime(true)) . '.' . $temp;
				$uploaddir = 'assets/documents/';
				$voterid_file = $uploaddir.$voterid_docName;
				move_uploaded_file($_FILES['voterid_doc']['tmp_name'], $voterid_file);
			}
			
			$jobcard_doc = $_FILES["jobcard_doc"]["name"];
			if(empty($jobcard_doc)){
				$jobcard_docName='';
			}else{
				$temp = pathinfo($jobcard_doc, PATHINFO_EXTENSION);
				$jobcard_docName = 'job_'.round(microtime(true)) . '.' . $temp;
				$uploaddir = 'assets/documents/';
				$jobcard_file = $uploaddir.$jobcard_docName;
				move_uploaded_file($_FILES['jobcard_doc']['tmp_name'], $jobcard_file);
			}
			
			$bankac_doc = $_FILES["bankac_doc"]["name"];
			if(empty($bankac_doc)){
				$bankac_docName='';
			}else{
				$temp = pathinfo($bankac_doc, PATHINFO_EXTENSION);
				$bankac_docName = 'bankac_'.round(microtime(true)) . '.' . $temp;
				$uploaddir = 'assets/documents/';
				$bankac_file = $uploaddir.$bankac_docName;
				move_uploaded_file($_FILES['bankac_doc']['tmp_name'], $bankac_file);
			}

			$datas=$this->admissionmodel->ad_create($had_aadhar_card,$aadhar_card_num,$admission_location,$admission_date,$name,$sex,$fname,$mname,$dob_date,$age,$mobile,$sec_mobile,$email,$father_mobile,$mother_mobile,$head_family,$head_education,$yearly_income,$no_family,$languages,$address,$city,$state,$nationality,$religion,$mother_tongue,$community,$community_class,$identification_marks1,$identification_marks2,$blood_group,$prefer_trade,$disability,$qualification,$qualification_details,$promotion_status,$year_education,$year_passing,$institute_name,$edu_doc_type,$job_type,$status,$user_id,$aadhar_cardName,$community_docName,$disability_docName,$userPicName,$edu_docName,$rationcard_docName,$voterid_docName,$jobcard_docName,$bankac_docName);
			if($datas['status']=="success"){
				$this->session->set_flashdata('msg', 'Added Successfully');
					redirect('admission/view');
			}else if($datas['status']=="already"){
				$this->session->set_flashdata('msg', 'Student Already Exist');
				redirect('admission/home');
			}else{
				$this->session->set_flashdata('msg', 'Failed to Add');
				redirect('admission/home');
			}
		}else{
		  redirect('/');
		}
	}

	// GET ALL ADMISSION DETAILS

	public function view()
	{
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		$datas['result'] = $this->admissionmodel->get_all_admission($user_id);
		if($user_type==3){
			$this->load->view('pia/pia_header');
			$this->load->view('pia/admission/view',$datas);
			$this->load->view('pia/pia_footer');
		}else{
			redirect('/');
		}
	}

	public function pending()
	{
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		$datas['result'] = $this->admissionmodel->get_all_pending_prospects($user_id);
		if($user_type==3){
			$this->load->view('pia/pia_header');
			$this->load->view('pia/admission/pending_prospects',$datas);
			$this->load->view('pia/pia_footer');
		}else{
			redirect('/');
		}
	}
	public function confirmed()
	{
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		$datas['result'] = $this->admissionmodel->get_all_confirmed_prospects($user_id);
		if($user_type==3){
			$this->load->view('pia/pia_header');
			$this->load->view('pia/admission/confirmed_prospects',$datas);
			$this->load->view('pia/pia_footer');
		}else{
			redirect('/');
		}
	}
	public function rejected()
	{
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		$datas['result'] = $this->admissionmodel->get_all_rejected_prospects($user_id);
		if($user_type==3){
			$this->load->view('pia/pia_header');
			$this->load->view('pia/admission/rejected_prospects',$datas);
			$this->load->view('pia/pia_footer');
		}else{
			redirect('/');
		}
	}

	//-------------------------
	public function edit_stu_details($admission_id)
	{
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		$datas['res']=$this->admissionmodel->get_edit_details($admission_id);
		$datas['doc']=$this->admissionmodel->get_edit_details_docs($admission_id);
		$datas['blood'] = $this->admissionmodel->getall_blood_group();
		$datas['trade'] = $this->admissionmodel->getall_trade($user_id);
		if($user_type==3){
			$this->load->view('pia/pia_header');
			$this->load->view('pia/admission/edit',$datas);
			$this->load->view('pia/pia_footer');
		}else{
			redirect('/');
		}
	}


	public function save_ad()
	{
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		if($user_type==3)
		{
			//$had_aadhar_card=$this->input->post('had_aadhar_card');
			//$aadhar_card_num=$this->input->post('aadhar_card_num');
			$had_aadhar_card='1';
			$aadhar_old=$this->input->post('old_aadhar_card_num');
			$naadhar_card_num=$this->input->post('aadhar_card_num');
			if($naadhar_card_num !=''){
				$aadhar_card_num = $naadhar_card_num;
			} else {
				$aadhar_card_num = $aadhar_old;
			}
			
			$admission_location=$this->input->post('admission_location');
			$admit_date=$this->input->post('admission_date');
			$dateTime1 = new DateTime($admit_date);
			$admission_date=date_format($dateTime1,'Y-m-d' );
			$name=$this->input->post('name');
			$sex=$this->input->post('sex');
			$fname=$this->input->post('fname');
			$mname=$this->input->post('mname');
			$dob=$this->input->post('dob');
			$dateTime = new DateTime($dob);
			$dob_date=date_format($dateTime,'Y-m-d');
			$age=$this->input->post('age');
			$mobile=$this->input->post('mobile');
			$sec_mobile=$this->input->post('sec_mobile');
			$email=$this->input->post('email');
			$father_mobile=$this->input->post('father_mobile');
			$mother_mobile=$this->input->post('mother_mobile');
			$head_family=$this->input->post('head_family');
			$head_education=$this->input->post('head_education');
			$yearly_income=$this->input->post('yearly_income');
			$no_family=$this->input->post('no_family');
			$languages=$this->input->post('languages');
			$address=$this->input->post('address');
			$city=$this->input->post('city');
			$state=$this->input->post('state');
			$nationality=$this->input->post('nationality');
			$religion=$this->input->post('religion');
			$mother_tongue=$this->input->post('mother_tongue');
			$community=$this->input->post('community');
			$community_class=$this->input->post('community_class');
			$identification_marks1=$this->input->post('identification_marks1');	
			$identification_marks2=$this->input->post('identification_marks2');	
			$blood_group=$this->input->post('blood_group');
			$prefer_trade=$this->input->post('prefer_trade');
			$disability=$this->input->post('disability');
			
			
			$qualification=$this->input->post('qualification');
			$qualification_details=$this->input->post('qualification_details');
			$promotion_status=$this->input->post('promotion_status');
			$year_education=$this->input->post('year_education');
			$year_passing=$this->input->post('year_passing');
			$institute_name=$this->input->post('institute_name');
			$edu_doc_type=$this->input->post('edu_doc_type');
						
			$job_type=$this->input->post('job_type');
			$status=$this->input->post('status');
			
			$aadhar_card_doc = $_FILES["aadhar_card_doc"]["name"];
			if(empty($aadhar_card_doc)){
				$aadhar_cardName='';
			}else{
				$temp = pathinfo($aadhar_card_doc, PATHINFO_EXTENSION);
				$aadhar_cardName = 'aadhar_'.round(microtime(true)) . '.' . $temp;
				$uploaddir = 'assets/documents/';
				$aadharcard_file = $uploaddir.$aadhar_cardName;
				move_uploaded_file($_FILES['aadhar_card_doc']['tmp_name'], $aadharcard_file);
			}
			
			$community_doc = $_FILES["community_doc"]["name"];
			if(empty($community_doc)){
				$community_docName='';
			}else{
				$temp = pathinfo($community_doc, PATHINFO_EXTENSION);
				$community_docName = 'community_'.round(microtime(true)) . '.' . $temp;
				$uploaddir = 'assets/documents/';
				$community_file = $uploaddir.$community_docName;
				move_uploaded_file($_FILES['community_doc']['tmp_name'], $community_file);
			}
			
			$disability_doc = $_FILES["disability_doc"]["name"];
			if(empty($disability_doc)){
				$disability_docName='';
			}else{
				$temp = pathinfo($disability_doc, PATHINFO_EXTENSION);
				$disability_docName = 'disability_'.round(microtime(true)) . '.' . $temp;
				$uploaddir = 'assets/documents/';
				$disability_file = $uploaddir.$disability_docName;
				move_uploaded_file($_FILES['disability_doc']['tmp_name'], $disability_file);
			}
					
			
			$student_pic = $_FILES["student_pic"]["name"];
			if(empty($student_pic)){
				$userPicName='';
			}else{
				$temp = pathinfo($student_pic, PATHINFO_EXTENSION);
				$userPicName = 'profile_'.round(microtime(true)) . '.' . $temp;
				$uploaddir = 'assets/students/';
				$profilepic = $uploaddir.$userPicName;
				move_uploaded_file($_FILES['student_pic']['tmp_name'], $profilepic);
			}
			
			$edu_doc = $_FILES["edu_doc"]["name"];
			if(empty($edu_doc)){
				$edu_docName='';
			}else{
				$temp = pathinfo($edu_doc, PATHINFO_EXTENSION);
				$edu_docName = 'edu_'.round(microtime(true)) . '.' . $temp;
				$uploaddir = 'assets/documents/';
				$education_file = $uploaddir.$edu_docName;
				move_uploaded_file($_FILES['edu_doc']['tmp_name'], $education_file);
			}
			
			$rationcard_doc = $_FILES["rationcard_doc"]["name"];
			if(empty($rationcard_doc)){
				$rationcard_docName='';
			}else{
				$temp = pathinfo($rationcard_doc, PATHINFO_EXTENSION);
				$rationcard_docName = 'ration_'.round(microtime(true)) . '.' . $temp;
				$uploaddir = 'assets/documents/';
				$rationcard_file = $uploaddir.$rationcard_docName;
				move_uploaded_file($_FILES['rationcard_doc']['tmp_name'], $rationcard_file);
			}
			
			$voterid_doc = $_FILES["voterid_doc"]["name"];
			if(empty($voterid_doc)){
				$voterid_docName='';
			}else{
				$temp = pathinfo($voterid_doc, PATHINFO_EXTENSION);
				$voterid_docName = 'voter_'.round(microtime(true)) . '.' . $temp;
				$uploaddir = 'assets/documents/';
				$voterid_file = $uploaddir.$voterid_docName;
				move_uploaded_file($_FILES['voterid_doc']['tmp_name'], $voterid_file);
			}
			
			$jobcard_doc = $_FILES["jobcard_doc"]["name"];
			if(empty($jobcard_doc)){
				$jobcard_docName='';
			}else{
				$temp = pathinfo($jobcard_doc, PATHINFO_EXTENSION);
				$jobcard_docName = 'job_'.round(microtime(true)) . '.' . $temp;
				$uploaddir = 'assets/documents/';
				$jobcard_file = $uploaddir.$jobcard_docName;
				move_uploaded_file($_FILES['jobcard_doc']['tmp_name'], $jobcard_file);
			}
			
			$bankac_doc = $_FILES["bankac_doc"]["name"];
			if(empty($bankac_doc)){
				$bankac_docName='';
			}else{
				$temp = pathinfo($bankac_doc, PATHINFO_EXTENSION);
				$bankac_docName = 'bankac_'.round(microtime(true)) . '.' . $temp;
				$uploaddir = 'assets/documents/';
				$bankac_file = $uploaddir.$bankac_docName;
				move_uploaded_file($_FILES['bankac_doc']['tmp_name'], $bankac_file);
			}

			$datas=$this->admissionmodel->ad_create($had_aadhar_card,$aadhar_card_num,$admission_location,$admission_date,$name,$sex,$fname,$mname,$dob_date,$age,$mobile,$sec_mobile,$email,$father_mobile,$mother_mobile,$head_family,$head_education,$yearly_income,$no_family,$languages,$address,$city,$state,$nationality,$religion,$mother_tongue,$community,$community_class,$identification_marks1,$identification_marks2,$blood_group,$prefer_trade,$disability,$qualification,$qualification_details,$promotion_status,$year_education,$year_passing,$institute_name,$edu_doc_type,$job_type,$status,$user_id,$aadhar_cardName,$community_docName,$disability_docName,$userPicName,$edu_docName,$rationcard_docName,$voterid_docName,$jobcard_docName,$bankac_docName);
			
			/* $had_aadhar_card=$this->input->post('had_aadhar_card');
			$aadhar_old=$this->input->post('aadhar_old');
			$naadhar_card_num=$this->input->post('aadhar_card_num');
			$admission_location=$this->input->post('admission_location');
			$admit_date=$this->input->post('admission_date');
			$dateTime1 = new DateTime($admit_date);
			$admission_date=date_format($dateTime1,'Y-m-d' );
			$admission_id=$this->input->post('admission_id');
			$name=$this->input->post('name');
			$fname=$this->input->post('fname');
			$mname=$this->input->post('mname');
			$email=$this->input->post('email');
			$prefer_time=$this->input->post('prefer_time');
			$sex=$this->input->post('sex');
			$dob=$this->input->post('dob');
			$dateTime = new DateTime($dob);
			$dob_date=date_format($dateTime,'Y-m-d' );
			$age=$this->input->post('age');
			$nationality=$this->input->post('nationality');
			$religion=$this->input->post('religion');
			$community_class=$this->input->post('community_class');
			$community=$this->input->post('community');
			$mother_tongue=$this->input->post('mother_tongue');
			$course=$this->input->post('course');
			$blood_group=$this->input->post('blood_group');
			$status=$this->input->post('status');
			$mobile=$this->input->post('mobile');
			$sec_mobile=$this->input->post('sec_mobile');
			$institute_name=$this->input->post('institute_name');
			$last_studied=$this->input->post('last_studied');
			$qual=$this->input->post('qual');
			$tran_cert=$this->input->post('trn_cert');
			$address=$this->input->post('address');
			$disability=$this->input->post('disability');
			$city=$this->input->post('city');
			$state=$this->input->post('state');
			$user_pic_old=$this->input->post('user_pic_old');
			
			
			
			$student_pic = $_FILES["student_pic"]["name"];
			$temp = pathinfo($student_pic, PATHINFO_EXTENSION);
		    $userPicName = round(microtime(true)) . '.' . $temp;
			$uploaddir = 'assets/students/';
			$profilepic = $uploaddir.$userPicName;
			move_uploaded_file($_FILES['student_pic']['tmp_name'], $profilepic);
			if(empty($student_pic))
			{
				$userPicName=$user_pic_old;
			}
			
			if($naadhar_card_num !=''){
				$aadhar_card_num = $naadhar_card_num;
			} else {
				$aadhar_card_num = $aadhar_old;
			}
			
			
			$datas=$this->admissionmodel->update_details($admission_id,$had_aadhar_card,$aadhar_card_num,$admission_location,$admission_date,$name,$fname,$mname,$sex,$dob_date,$age,$nationality,$religion,$community_class,$community,$mother_tongue,$course,$mobile,$sec_mobile,$email,$userPicName,$institute_name,$last_studied,$qual,$tran_cert,$address,$disability,$city,$state,$blood_group,
			$status,$user_id,$prefer_time); */
			
			
			if($datas['status']=="success"){
				$this->session->set_flashdata('msg', 'Updated Successfully');
				redirect('admission/view');
			}else{
				$this->session->set_flashdata('msg', 'Failed to Add');
				redirect('admission/view');
			}
		}else{
		redirect('/');
		}
	}

	public function check_email_exist()
	{
		$email=$this->input->post('email');
		$data=$this->admissionmodel->check_email($email);

	}

	public function check_mobile(){
		$mobile=$this->input->post('mobile');
		$data=$this->admissionmodel->check_mobile($mobile);
	}



	public function check_aadhar_exist(){
		$aadhar_card_num=$this->input->post('aadhar_card_num');
	 	$datas['res']=$this->admissionmodel->check_aadhar_exist($aadhar_card_num);
	}

	public function check_aadhar_exist_already(){
	  $admission_id=$this->uri->segment(3);
		$aadhar_card_num=$this->input->post('aadhar_card_num');
		$datas['res']=$this->admissionmodel->check_aadhar_num_exist($aadhar_card_num,$admission_id);
	}

	public function check_email_exist_already()
	{
		$admission_id=$this->uri->segment(3);
		$email=$this->input->post('email');
		$data=$this->admissionmodel->check_email_exist_already($email,$admission_id);

	}

	public function check_mobile_already(){
		$admission_id=$this->uri->segment(3);
		$mobile=$this->input->post('mobile');
		$data=$this->admissionmodel->check_mobile_already($mobile,$admission_id);
	}



}
