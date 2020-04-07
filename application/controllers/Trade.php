<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trade extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('trademodel');
	}

	// Class section
	public function home()
	{
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		$datas['result'] = $this->trademodel->getall_trade($user_id);
		if($user_type==3){
			$this->load->view('pia/pia_header');
			$this->load->view('pia/trade/add_trade',$datas);
			$this->load->view('pia/pia_footer');
		}
		else{
			redirect('/');
		}
	}


	public function create_trade()
	{
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
			if($user_type==3){
				$tradename=$this->input->post('trade_name');
				$status=$this->input->post('status');
				$datas = $this->trademodel->add_trade($tradename,$status,$user_id);
				
				if($datas['status']=="success"){
					$this->session->set_flashdata('msg', 'You have just created a new course!');
					redirect('trade/home');
				}else{
					$this->session->set_flashdata('msg', 'Trade Already Exist');
					redirect('trade/home');
				}

			}else{
					redirect('/');
			}

	}

	public function edit_trade()
	{
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		if($user_type==3){
			$trade_id=$this->uri->segment(3);
			$datas['res'] = $this->trademodel->get_trade_id($trade_id);
			$datas['result'] = $this->trademodel->getall_trade($user_id);
			
			$this->load->view('pia/pia_header');
			$this->load->view('pia/trade/edit_trade',$datas);
			$this->load->view('pia/pia_footer');
		}
		else{
			redirect('/');
		}
	}

	public function update_trade()
	{
		$datas=$this->session->userdata();
		$user_id=$this->session->userdata('user_id');
		$user_type=$this->session->userdata('user_type');
		if($user_type==3){
			$trade_name=$this->input->post('trade_name');
			$trade_id=$this->input->post('trade_id');
			$status=$this->input->post('status');
			$datas = $this->trademodel->update_trade_details($trade_name,$trade_id,$status,$user_id);
			
				if($datas['status']=="success"){
					$this->session->set_flashdata('msg', 'Changes made in your course are saved.');
					redirect('trade/home');
				}else{
					$this->session->set_flashdata('msg', 'Trade Already Exist');
					redirect('trade/home');
				}
		}else{
				redirect('/');
		}
	}

}
?>
