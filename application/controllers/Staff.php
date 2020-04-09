<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

	function __construct() {
		 parent::__construct();
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->model('staffmodel');
			$this->load->library('excel');
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
						$uploaddir1 = 'assets/profile/';
						
						$profilepic = $uploaddir.$staff_prof_pic;
						$profilepic1 = $uploaddir1.$staff_prof_pic;
						
						move_uploaded_file($_FILES['staff_pic']['tmp_name'], $profilepic);
						copy($profilepic, $profilepic1);
						
						/* $temp = pathinfo($profilepic, PATHINFO_EXTENSION);
						$staff_prof_pic = round(microtime(true)) . '.' . $temp;
						$uploaddir = 'assets/staff/';
						$profilepic = $uploaddir.$staff_prof_pic;
						move_uploaded_file($_FILES['staff_pic']['tmp_name'], $profilepic); */
					}
					$datas=$this->staffmodel->create_staff_details($select_role,$name,$address,$email,$class_tutor,$mobile,$sec_phone,$sex,$dob,$nationality,$religion,$community_class,$community,$qualification,$status,$staff_prof_pic,$user_id);
					
					if($datas['status']=="success"){
						$this->session->set_flashdata('msg', 'You have just created a profile for your staff!');
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
		
	public function view_mobilizer_list(){
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		if($user_type==3){
			 $datas['result']=$this->staffmodel->get_all_staff_mobilizer($user_id);
			 $this->load->view('pia/pia_header');
			 $this->load->view('pia/staff/view_mobilizer_list',$datas);
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
				$old_role=$this->input->post('staff_old_type');
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
				$datas=$this->staffmodel->update_staff_details_to_id($old_role,$select_role,$name,$address,$email,$class_tutor,$mobile,$sec_phone,$sex,$dob,$nationality,$religion,$community_class,$community,$qualification,$status,$staff_prof_pic,$user_id,$staff_id);
				if($datas['status']=="success"){
					$this->session->set_flashdata('msg', 'Changes made in staff profile are saved.');
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

				
	 public function chk_month(){
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		if($user_type==3){
			$staff_id = $this->input->post('staff_id');
			$syear = $this->input->post('syear');
			$data =$this->staffmodel->get_job_months($staff_id,$syear);
			echo json_encode($data);
		 }else{
				redirect('/');
		 }
	} 

	public function view_mobilizer_job(){
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		if($user_type==3){
			$staff_id=$this->uri->segment(3);
			$month=$this->input->post('month');
			$year=$this->input->post('year');

			if ($month == ''){
				$month = date("m");
			}
			if ($year == ''){
				$year = date("Y"); 
			}
			$datas['month'] = $month;
			$datas['year'] = $year;
			
			$datas['job_years']=$this->staffmodel->get_job_year($staff_id);
			$datas['mobilizer_details']=$this->staffmodel->get_all_staff_details_by_id($staff_id);
			$datas['consolidate_report']=$this->staffmodel->consolidate_report($staff_id,$month,$year);
			$datas['mob_jobs']=$this->staffmodel->list_mobilizer_job($staff_id,$month,$year);
			$this->load->view('pia/pia_header');
			$this->load->view('pia/staff/view_mobilizer_job',$datas);
			 $this->load->view('pia/pia_footer');
		 }else{
				redirect('/');
		 }
	}
		
	public function add_mobilizer_job(){
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		if($user_type==3){
				$staff_id=$this->uri->segment(3);
				$datas['mobilizer_details']=$this->staffmodel->get_all_staff_details_by_id($staff_id);
				$datas['work_types']=$this->staffmodel->get_work_type();
				$this->load->view('pia/pia_header');
				$this->load->view('pia/staff/add_mobilizer_job',$datas);
				$this->load->view('pia/pia_footer');
		 }else{
				redirect('/');
		 }
	}
				
	public function add_mob_job(){
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
			if($user_type==3){
				 $task_date=$this->input->post('task_date');
				 $select_type=$this->input->post('select_type');
				 $task_title_id= $this->input->post('task_title');
				 $task_desc=$this->input->post('task_desc');
				 $mob_id=$this->input->post('mob_id');
				 $user_master_id=$this->input->post('user_master_id');
				 
				$datas=$this->staffmodel->add_mob_job($task_date,$select_type,$task_title_id,$task_desc,$mob_id,$user_id,$user_master_id);
				//print_r($datas['mobilizer_details']);
				$red_id = base64_encode($mob_id*98765);
				
				if($datas['status']=="Success"){
					$this->session->set_flashdata('msg', 'You have scheduled work for mobilizer');
					redirect('staff/view_mobilizer_job/'.$red_id);
				}else if($datas['status']=="Already"){
					$this->session->set_flashdata('msg', 'Work Already Exists');
					redirect('staff/add_mobilizer_job/'.$red_id);
				}
				else{
					$this->session->set_flashdata('msg', 'Failed to Add');
					redirect('staff/add_mobilizer_job/'.$red_id);
				}
		}
		else{
		  redirect('/');
		}
	}
	
	public function edit_mobilizer_job(){
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		if($user_type==3){
				$job_id=$this->uri->segment(3);
				$datas['job_details']=$this->staffmodel->get_job_details($job_id);
				$datas['work_types']=$this->staffmodel->get_work_type();
				$this->load->view('pia/pia_header');
				$this->load->view('pia/staff/edit_mobilizer_job',$datas);
				$this->load->view('pia/pia_footer');
		 }else{
				redirect('/');
		 }
	}
	
	public function update_mobilizer_job(){
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
			if($user_type==3){
				 $job_id=$this->input->post('job_id');
				 $task_date=$this->input->post('task_date');
				 $select_type=$this->input->post('select_type');
				 $task_title= $this->input->post('task_title');
				 $task_desc=$this->input->post('task_desc');
				 $mob_id=$this->input->post('mob_id');
				 //$user_master_id=$this->input->post('user_master_id');
				 
				$datas=$this->staffmodel->update_mob_job($job_id,$task_date,$select_type,$task_title,$task_desc,$mob_id,$user_id);
				$red_id = base64_encode($mob_id*98765);
				
				if($datas['status']=="Success"){
					$this->session->set_flashdata('msg', 'Changes made in the work are saved');
					redirect('staff/view_mobilizer_job/'.$red_id);
				}else if($datas['status']=="Already"){
					$this->session->set_flashdata('msg', 'Work Already Exists');
					redirect('staff/add_mobilizer_job/'.$red_id);
				}
				else{
					$this->session->set_flashdata('msg', 'Failed to Update');
					redirect('staff/add_mobilizer_job/'.$red_id);
				}
		}
		else{
		  redirect('/');
		}
	}
	
	public function edit_job_details(){
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		if($user_type==3){
				$job_id=$this->uri->segment(3);
				$datas['job_details']=$this->staffmodel->get_job_details($job_id);
				$datas['job_gallery']=$this->staffmodel->get_job_gallery($job_id);
				$datas['work_types']=$this->staffmodel->get_work_type();
				$this->load->view('pia/pia_header');
				$this->load->view('pia/staff/edit_mobilizer_job',$datas);
				$this->load->view('pia/pia_footer');
		 }else{
				redirect('/');
		 }
	}
	
	
	public function view_job_details(){
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		if($user_type==3){
				$job_id=$this->uri->segment(3);
				$datas['job_details']=$this->staffmodel->get_job_details($job_id);
				$datas['job_gallery']=$this->staffmodel->get_job_gallery($job_id);
				$datas['work_types']=$this->staffmodel->get_work_type();
				$this->load->view('pia/pia_header');
				$this->load->view('pia/staff/view_job_details',$datas);
				$this->load->view('pia/pia_footer');
		 }else{
				redirect('/');
		 }
	}
	
	public function consolidated_report(){
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		if($user_type==3){
			$staff_id=$this->uri->segment(3);
			$year=$this->uri->segment(4);
			$month=$this->uri->segment(5);
			
			$datas['mobilizer_details']=$this->staffmodel->get_all_staff_details_by_id($staff_id);
			$datas['consolidate_report']=$this->staffmodel->consolidate_report_details($staff_id,$month,$year);
			//print_r ($datas['consolidate_report']);
			$this->load->view('pia/staff/consolidated_report',$datas);
			
		 }else{
				redirect('/');
		 }
	}
	
	public function detailed_report(){
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		if($user_type==3){
			$staff_id=$this->uri->segment(3);
			$year=$this->uri->segment(4);
			$month=$this->uri->segment(5);

			
			$datas['mobilizer_details']=$this->staffmodel->get_all_staff_details_by_id($staff_id);
			//$datas['mob_jobs']=$this->staffmodel->list_mobilizer_job($staff_id,$month,$year);
			$datas['detailed_report']=$this->staffmodel->detailed_report_details($staff_id,$month,$year);
			$datas['detailed_report_list']=$this->staffmodel->detailed_report_list($staff_id,$month,$year);
			//print_r ($datas['detailed_report_list']);
			//exit;
			//$this->load->view('pia/pia_header');
			$this->load->view('pia/staff/detailed_report',$datas);
			// $this->load->view('pia/pia_footer');
		 }else{
				redirect('/');
		 }
	}
	
		// create xlsx
    public function consolidate_generateXls() {      
        
		$staff_id=$this->uri->segment(3);
		$year=$this->uri->segment(4);
		$month=$this->uri->segment(5);
		
		//$datas['mobilizer_details']=$this->staffmodel->get_all_staff_details_by_id($staff_id);
		$consolidate_report=$this->staffmodel->consolidate_report_details($staff_id,$month,$year);

			$km_traveled = $consolidate_report['km_travel']; 
			if ($km_traveled >0) { 
				 $disp_kms = number_format($km_traveled,3).' Kms'; 
			} else { 
				$disp_kms =  "0";
			 }
		
		$filename =  date("Y-m-d-H-i-s").".xlsx";
		
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
		
		$objPHPExcel->setActiveSheetIndex(0)->mergeCells('D11:E11');
		$objPHPExcel->getActiveSheet()->getStyle('D11')->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
		$objPHPExcel->getActiveSheet()->getStyle('D11')->getAlignment()->applyFromArray(array('vertical' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth("35");
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth("35");
		
		
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('D6', 'PIA Name');
		$objPHPExcel->getActiveSheet()->SetCellValue('E6', $consolidate_report['pia_name']);
        $objPHPExcel->getActiveSheet()->SetCellValue('D7', 'Mobilizer Name');
		$objPHPExcel->getActiveSheet()->SetCellValue('E7', $consolidate_report['mob_name']);
        $objPHPExcel->getActiveSheet()->SetCellValue('D8', 'Reporting Manager');
		$objPHPExcel->getActiveSheet()->SetCellValue('E8', '');
		$objPHPExcel->getActiveSheet()->SetCellValue('D11', $consolidate_report['month_name'].' '.$consolidate_report['year']. '- Consolidated Report');
		$objPHPExcel->getActiveSheet()->SetCellValue('D14', $consolidate_report['month_name'].' '.$consolidate_report['year']);
		$objPHPExcel->getActiveSheet()->SetCellValue('E14', $consolidate_report['total_count']);
		$objPHPExcel->getActiveSheet()->SetCellValue('D15', 'Field work (in days)');
		$objPHPExcel->getActiveSheet()->SetCellValue('E15', $consolidate_report['field_count']);
		$objPHPExcel->getActiveSheet()->SetCellValue('D16', 'Distance Travelled (in kms)');
		$objPHPExcel->getActiveSheet()->SetCellValue('E16', $disp_kms);
		$objPHPExcel->getActiveSheet()->SetCellValue('D17', 'Office work (in days)');
		$objPHPExcel->getActiveSheet()->SetCellValue('E17', $consolidate_report['office_count']);
		$objPHPExcel->getActiveSheet()->SetCellValue('D18', 'Leave (in days)');
		$objPHPExcel->getActiveSheet()->SetCellValue('E18', $consolidate_report['leave_count']);
		$objPHPExcel->getActiveSheet()->SetCellValue('D19', 'Holiday (in days)');
		$objPHPExcel->getActiveSheet()->SetCellValue('E19', $consolidate_report['holiday_count']);
		$objPHPExcel->getActiveSheet()->SetCellValue('D28', 'Signature of the Mobilizer');
		$objPHPExcel->getActiveSheet()->SetCellValue('E28', 'Signature of the Reporting Manager');
		$objPHPExcel->getActiveSheet()->SetCellValue('D29', 'Date');
		$objPHPExcel->getActiveSheet()->SetCellValue('E29', 'Date');
     
		header('Content-Type: application/vnd.ms-excel'); 
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0'); 
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'HTML');
		//$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
		//ob_clean();
		$objWriter->save('php://output'); 
    }
	
	
	 function detailed_generateXls() {


		$staff_id=$this->uri->segment(3);
		$year=$this->uri->segment(4);
		$month=$this->uri->segment(5);
		
		//$datas['mobilizer_details']=$this->staffmodel->get_all_staff_details_by_id($staff_id);
		$detailed_report =$this->staffmodel->detailed_report_details($staff_id,$month,$year);
		$detailed_job_list = $this->staffmodel->detailed_report_list($staff_id,$month,$year);
		
		$filename = date("Y-m-d-H-i-s").".xlsx";
        $objPHPExcel = new PHPExcel();
        
		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->setActiveSheetIndex(0)->mergeCells('D11:N11');
		$objPHPExcel->setActiveSheetIndex(0)->mergeCells('K28:L28');
		$objPHPExcel->setActiveSheetIndex(0)->mergeCells('K29:L29');
		$objPHPExcel->getActiveSheet()->getStyle('D11')->getAlignment()->applyFromArray(array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER)); 
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth("20");
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth("20");
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth("20");
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth("20");
		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth("20");
		$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth("20");
		$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth("20");
		$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth("20");
		$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth("27");
		
		
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('D6', 'PIA Name');
		$objPHPExcel->getActiveSheet()->SetCellValue('E6', $detailed_report['pia_name']);
        $objPHPExcel->getActiveSheet()->SetCellValue('D7', 'Mobilizer Name');
		$objPHPExcel->getActiveSheet()->SetCellValue('E7', $detailed_report['mob_name']);
        $objPHPExcel->getActiveSheet()->SetCellValue('D8', 'Reporting Manager');
		$objPHPExcel->getActiveSheet()->SetCellValue('E8', '');
		$objPHPExcel->getActiveSheet()->SetCellValue('D11', $detailed_report['month_name'].' '.$detailed_report['year']. '- Monthly Report');

		$objPHPExcel->getActiveSheet()->SetCellValue('D14', 'Date');
		$objPHPExcel->getActiveSheet()->SetCellValue('E14', 'Day');
        $objPHPExcel->getActiveSheet()->SetCellValue('F14', 'Task Type');
		$objPHPExcel->getActiveSheet()->SetCellValue('G14', 'Distance Travelled');
        $objPHPExcel->getActiveSheet()->SetCellValue('H14', 'Task Title');
		$objPHPExcel->getActiveSheet()->SetCellValue('I14', 'Task Details');
		$objPHPExcel->getActiveSheet()->SetCellValue('J14', 'Mobilizer Comments');
		$objPHPExcel->getActiveSheet()->SetCellValue('K14', 'Task Added & Edited');
		$objPHPExcel->getActiveSheet()->SetCellValue('L14', 'Review by Reporting Manager');
		
		// set Row
        $rowCount = 15;
		
         foreach ($detailed_job_list as $list) {
			
			$mob_id = $list->mobilizer_id;
			$sdate = $list->attendance_date;
			$km_traveled = $list->km;
			$nameOfDay = date('l', strtotime($sdate));
			$date=date_create($list->attendance_date);
			$disp_date = date_format($date,"d-m-Y");
			if ($km_traveled >0) 
			{ 
				$disp_km = number_format($km_traveled,3)." Kms"; 
			} else {
				$disp_km =  "N/A";
			}
			$created_at = $list->created_at;
			$updated_by = $list->updated_by;  
			
			if ($updated_by != 0) { 
					$disp_updated = $list->updated_at; 
					$created_at = $created_at.' - '.$disp_updated;
			}
			
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $disp_date);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $nameOfDay);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $list->work_type);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $disp_km);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $list->title);
			$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $list->comments);
			$objPHPExcel->getActiveSheet()->getStyle('I'.$rowCount)->getAlignment()->setWrapText(true);
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $list->mobilizer_comments);
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $created_at);
			$objPHPExcel->getActiveSheet()->getStyle('K'.$rowCount)->getAlignment()->setWrapText(true);
            $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, '');
            
            $rowCount++;
        } 
		
		$objPHPExcel->getActiveSheet()->SetCellValue('D28', 'Signature of the Mobilizer');
		$objPHPExcel->getActiveSheet()->SetCellValue('K28', 'Signature of the Reporting Manager');
		$objPHPExcel->getActiveSheet()->SetCellValue('D29', 'Date');
		$objPHPExcel->getActiveSheet()->SetCellValue('K29', 'Date');
		
        
		
		
		header('Content-Type: application/vnd.ms-excel'); 
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0'); 
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'HTML');  
		//$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
		//ob_clean();
		$objWriter->save('php://output');

    }
	
	/* function convertpdf(){

		// Get output html
		
		$html = "html";
        //$html = $this->output->get_output();
		//$html = this->load->view('pia/staff/generatepdf');
		
        // Load pdf library
        $this->load->library('pdf');

       
        // Load HTML content
        $this->pdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation
        $this->pdf->setPaper('A4', 'landscape');
        
        // Render the HTML as PDF
        $this->pdf->render();
        
        // Output the generated PDF (1 = download and 0 = preview)
        $this->pdf->stream("welcome.pdf", array("Attachment"=>0));
   }
   
   
   public function generatepdf(){
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		if($user_type==3){
				 $job_id=$this->uri->segment(3);
				$datas['job_details']=$this->staffmodel->get_job_details($job_id);
				$datas['job_gallery']=$this->staffmodel->get_job_gallery($job_id);
				$datas['work_types']=$this->staffmodel->get_work_type(); 
				//$this->load->view('pia/pia_header');
				$this->load->view('pia/staff/generatepdf');
				//$this->load->view('pia/pia_footer');
		 }else{
				redirect('/');
		 }
	} 
	
	/* public function chk_jobtype(){
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		if($user_type==3){
				 $task_date=$this->input->post('task_date');
				 $mob_id=$this->input->post('mob_id');
				 $data =$this->staffmodel->checkmob_task($task_date,$mob_id);
				echo json_encode($data);
		 }else{
				redirect('/');
		 }
	}
		
	public function chk_task_title(){
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		if($user_type==3){
				 $task_title_id=$this->input->post('task_title_id');
				 $data =$this->staffmodel->check_task_id($task_title_id);
				echo json_encode($data);
		 }else{
				redirect('/');
		 }
	} */
	
		
		

}
?>