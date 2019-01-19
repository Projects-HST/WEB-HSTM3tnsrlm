<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobilization extends CI_Controller
{

  function __construct()
  {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('mobilizationmodel');
		// $this->load->model('mailmodel');
	  //  $this->load->model('notificationmodel');
   }


  public function home()
    {
	  $datas=$this->session->userdata();
	  $user_id=$this->session->userdata('user_id');
	  $user_type=$this->session->userdata('user_type');
	  if($user_type==3)
	  {
    // $datas['res']=$this->taskmodel->get_mobilizer_user($user_id);
	  $this->load->view('pia/pia_header');
	  $this->load->view('pia/plan/upload',$datas);
	  $this->load->view('pia/pia_footer');
	  }
	  else{

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
    }
    else{

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
     $profilepic = $_FILES['doc_file']['name'];
      if(empty($profilepic)){
        $doc_file=' ';
      }else{
        $temp = pathinfo($profilepic, PATHINFO_EXTENSION);
        $doc_file = round(microtime(true)) . '.' . $temp;
        $uploaddir = 'assets/mobilization_plan/';
        $profilepic = $uploaddir.$doc_file;
        move_uploaded_file($_FILES['doc_file']['tmp_name'], $profilepic);
      }
     $doc_month_year=$this->input->post('doc_month_year');
     $dateTime = new DateTime($dob_date);
     $doc_month_year=date_format($dateTime,'Y-m-d');
     $datas=$this->mobilizationmodel->upload_data($doc_name,$doc_month_year,$doc_file,$user_id);
     if($datas['status']=="success")
     {
       $this->session->set_flashdata('msg', ''.$doc_name.'   Plan Added Successfully');
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
