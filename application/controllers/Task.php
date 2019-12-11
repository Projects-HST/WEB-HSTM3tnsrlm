<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller
{

  function __construct()
  {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('taskmodel');
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
    $datas['res']=$this->taskmodel->get_mobilizer_user($user_id);
	  $this->load->view('pia/pia_header');
	  $this->load->view('pia/task/create',$datas);
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
    $datas['result']=$this->taskmodel->view_task($user_id);
    $this->load->view('pia/pia_header');
    $this->load->view('pia/task/view',$datas);
    $this->load->view('pia/pia_footer');
    }
    else{

    }
  }
  public function view_mobilizer()
    {
    $datas=$this->session->userdata();
    $user_id=$this->session->userdata('user_id');
    $user_type=$this->session->userdata('user_type');
    if($user_type==3)
    {
    $datas['result']=$this->taskmodel->view_task_mobilizer($user_id);
    $this->load->view('pia/pia_header');
    $this->load->view('pia/task/view_mobilizer.php',$datas);
    $this->load->view('pia/pia_footer');
    }
    else{

    }
  }

	public function create()
	{
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		
		if($user_type==3)
	   {
			$task_title=$this->db->escape_str($this->input->post('task_title'));
			$task_desc=$this->db->escape_str($this->input->post('task_desc'));
			$select_user=$this->input->post('select_user');
			$dob_date=$this->input->post('task_date');
			$dateTime = new DateTime($dob_date);
			$task_date=date_format($dateTime,'Y-m-d');
			$task_status=$this->input->post('task_status');
			$datas=$this->taskmodel->create_task($task_title,$task_desc,$select_user,$task_date,$task_status,$user_id);

			if($datas['status']=="success")
			{
				$this->session->set_flashdata('msg', 'Task Added Successfully');
				redirect('task/view');
			}else{
				$this->session->set_flashdata('msg', 'Failed to Add');
				redirect('task/view');
			}
	   }else{
		  redirect('/');
	   }

	}




}
?>
