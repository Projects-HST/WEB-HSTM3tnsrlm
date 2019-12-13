<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobilization extends CI_Controller
{

  function __construct()
	  {
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->model('mobilizationmodel');
	   }

	public function home()
    {
	  $datas=$this->session->userdata();
	  $user_id=$this->session->userdata('user_id');
	  $user_type=$this->session->userdata('user_type');
		  if($user_type==3)
		  {
			  $this->load->view('pia/pia_header');
			  $this->load->view('pia/plan/upload',$datas);
			  $this->load->view('pia/pia_footer');
		  }else{

		  }
	}

	public function view()
    {
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		
		if($user_type==3)
		{
			$datas['result']=$this->mobilizationmodel->view_plans($user_id);
			$this->load->view('pia/pia_header');
			$this->load->view('pia/plan/view',$datas);
			$this->load->view('pia/pia_footer');
		} else{

		}
	}

	public function upload_data()
	{
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		
		if($user_type==3)
		{
			$doc_name=$this->db->escape_str($this->input->post('doc_name'));
			$docfile = $_FILES['doc_file']['name'];
		
		if(empty($docfile)){
			$doc_file='';
		}else{
			$temp = pathinfo($docfile, PATHINFO_EXTENSION);
			$doc_file = round(microtime(true)) . '.' . $temp;
			$uploaddir = 'assets/mobilization_plan/';
			$docfile = $uploaddir.$doc_file;
			move_uploaded_file($_FILES['doc_file']['tmp_name'], $docfile);
		}
		
		$doc_month_year=$this->input->post('doc_month_year');
		$dateTime = new DateTime($doc_month_year);
		$doc_month_year=date_format($dateTime,'Y-m-d');
		$datas=$this->mobilizationmodel->upload_data($doc_name,$doc_month_year,$doc_file,$user_id);
		
		if($datas['status']=="success")	{
			$this->session->set_flashdata('msg', ''.$doc_name.' Plan Added Successfully');
			redirect('mobilization/view');
		}else{
			$this->session->set_flashdata('msg', 'Failed to Add');
			redirect('mobilization/view');
		}
		
		}else{
			redirect('/');
		}

	}

}
?>
