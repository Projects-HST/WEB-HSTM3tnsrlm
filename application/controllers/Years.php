<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Years extends CI_Controller
{
  function __construct() {
		parent::__construct();
		$this->load->model('yearsmodel');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('form_validation');
}


public function home()
{
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$datas['result'] = $this->yearsmodel->getall_years($user_id);
		$user_type=$this->session->userdata('user_type');
		if($user_type==3)
		{
		$this->load->view('pia/pia_header');
		$this->load->view('pia/years/add_years',$datas);
		$this->load->view('pia/pia_footer');
		}
		else{
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
		$from_month=$this->input->post('from_month');
		$end_month=$this->input->post('end_month');

		$dateTime = new DateTime($from_month);
		$formatted_date=date_format($dateTime,'Y-m-d' );

		$dateTime1 = new DateTime($end_month);
		$formatted_date1=date_format($dateTime1,'Y-m-d' );

		$status=$this->input->post('status');

		$datas['res']=$this->yearsmodel->add_years($formatted_date,$formatted_date1,$status,$user_id);
    echo $datas['res'];
		}
		else{
		redirect('/');
		}

}

public function edit_years($year_id)
{
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$datas['res']=$this->yearsmodel->edit_year($year_id);
    $datas['result'] = $this->yearsmodel->getall_years($user_id);
		$user_type=$this->session->userdata('user_type');
	  if($user_type==3)
		{

    $this->load->view('pia/pia_header');
    $this->load->view('pia/years/edit_years',$datas);
    $this->load->view('pia/pia_footer');
		}
		else{
		redirect('/');
		}
		
}

public function update_year()
{

		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		if($user_type==3)
		{
			$year_id=$this->input->post('year_id');
			$status=$this->input->post('status');
			$from_month=$this->input->post('from_month');
			$dateTime = new DateTime($from_month);
			$formatted_date=date_format($dateTime,'Y-m-d' );

			$end_month=$this->input->post('end_month');
			$dateTime = new DateTime($end_month);
			$formatted_date1=date_format($dateTime,'Y-m-d' );
			$datas['res']=$this->yearsmodel->update_years($year_id,$formatted_date,$formatted_date1,$status,$user_id);
      echo 	$datas['res'];
		}else{
       redirect('/');
		}

}



}
?>
