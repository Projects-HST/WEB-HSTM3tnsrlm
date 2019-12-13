<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Center extends CI_Controller {
	function __construct() {
		 parent::__construct();

		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('centermodel');
}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 // Class section




	 	public function home(){
			$datas=$this->session->userdata();
			$user_id=$this->session->userdata('user_id');
			$user_type=$this->session->userdata('user_type');
			if($user_type==3){
				$datas['res_center']=$this->centermodel->get_center_details($user_id);
				$this->load->view('pia/pia_header');
				$this->load->view('pia/centers/create_centers',$datas);
				$this->load->view('pia/pia_footer');
	 		 }
	 		 else{
				redirect('/');
	 		 }
	 	}


    public function create_center(){
				$datas=$this->session->userdata();
				$user_id=$this->session->userdata('user_id');
				$user_type=$this->session->userdata('user_type');
				
				if($user_type==3){
					$center_name=$this->input->post('center_name');
					$center_info= $this->db->escape_str($this->input->post('center_info'));
					$center_address= $this->db->escape_str($this->input->post('center_address'));
					$status= $this->db->escape_str($this->input->post('status'));
				
					$profilepic = $_FILES['center_banner']['name'];
					$temp = pathinfo($profilepic, PATHINFO_EXTENSION);
					$center_logo = round(microtime(true)) . '.' . $temp;
					$uploaddir = 'assets/center/logo/';
					$profilepic = $uploaddir.$center_logo;
					move_uploaded_file($_FILES['center_banner']['tmp_name'], $profilepic);

					$datas=$this->centermodel->create_center($center_name,$center_info,$center_address,$center_logo,$status,$user_id);
					
					if($datas['status']=="success"){
						$this->session->set_flashdata('msg', 'Created Successfully');
						redirect('center/home');
					}else{
						$this->session->set_flashdata('msg', 'Failed to Add');
						redirect('center/home');
					}
			}
			else{
				redirect('/');
			}
    }

	public function check_center_name(){
			$data=$this->session->userdata();
			$user_id=$this->session->userdata('id');
			$center_name= $this->db->escape_str($this->input->post('center_name'));
			$data=$this->centermodel->check_center_name($center_name,$user_id);
	}

	public function check_center_name_exist(){
			$data=$this->session->userdata();
			$user_id=$this->session->userdata('id');
			$center_id= $this->uri->segment(3);
			$center_name= $this->db->escape_str($this->input->post('center_name'));
			$data=$this->centermodel->check_center_name_exist($center_id,$center_name,$user_id);
	}



		public function create_videos(){
			$datas=$this->session->userdata();
			$user_id=$this->session->userdata('id');
			$user_type=$this->session->userdata('user_type');
			if($user_type==3){
					$center_id= $this->uri->segment(3);
					$datas['result']=$this->centermodel->get_all_videos($center_id);
					$this->load->view('pia/pia_header');
					$this->load->view('pia/centers/create_videos',$datas);
					$this->load->view('pia/pia_footer');
				}else{
					redirect('/');
			}
		}

		public function videos(){
				$datas=$this->session->userdata();
				$user_id=$this->session->userdata('user_id');
				$user_type=$this->session->userdata('user_type');
				if($user_type==3){
					$center_id=$this->input->post('center_id');
					$video_link= $this->db->escape_str($this->input->post('video_link'));
					$video_title= $this->db->escape_str($this->input->post('video_title'));
					$datas=$this->centermodel->add_video_link($center_id,$video_title,$video_link,$user_id);
					
					if($datas['status']=="success"){
						$this->session->set_flashdata('msg', 'Added Successfully');
						redirect('center/create_videos/'.$center_id.'');
					}else{
						$this->session->set_flashdata('msg', 'Failed to Add');
						redirect('center/create_videos/'.$center_id.'');
					}
			 }
			 else{
					redirect('/');
			 }
		}

		public function get_center_id_details($center_id){
			$datas=$this->session->userdata();
			$user_id=$this->session->userdata('user_id');
			$user_type=$this->session->userdata('user_type');
			if($user_type==3){
				 $datas['res_center']=$this->centermodel->get_center_id_details($center_id);
				 $this->load->view('pia/pia_header');
				 $this->load->view('pia/centers/edit_centers',$datas);
				 $this->load->view('pia/pia_footer');
			}else{
				redirect('/');
			}
		}

		public function update_center(){
			$datas=$this->session->userdata();
			$user_id=$this->session->userdata('user_id');
			$user_type=$this->session->userdata('user_type');
			if($user_type==3){
				$center_name=$this->input->post('center_name');
				$center_id=$this->input->post('center_id');
				$center_banner_old=$this->input->post('center_banner_old');
				$center_info= $this->db->escape_str($this->input->post('center_info'));
				$center_address= $this->db->escape_str($this->input->post('center_address'));
				$status= $this->db->escape_str($this->input->post('status'));
				
				$profilepic = $_FILES['center_banner']['name'];
				if($profilepic){
					$temp = pathinfo($profilepic, PATHINFO_EXTENSION);
					$center_logo = round(microtime(true)) . '.' . $temp;
					$uploaddir = 'assets/center/logo/';
					$profilepic = $uploaddir.$center_logo;
					move_uploaded_file($_FILES['center_banner']['tmp_name'], $profilepic);
				}else{
					$center_logo=$center_banner_old;
				}

				$datas=$this->centermodel->update_center($center_id,$center_name,$center_info,$center_address,$center_logo,$status,$user_id);
				if($datas['status']=="success"){
					$this->session->set_flashdata('msg', 'Updated Successfully');
					redirect('center/home');
				}else{
					$this->session->set_flashdata('msg', 'Failed to Add');
					redirect('center/home');
				}
			}else{
					redirect('/');
			}
		}

		public function create_gallery(){
			$datas=$this->session->userdata();
			$user_id=$this->session->userdata('id');
				$user_type=$this->session->userdata('user_type');
			if($user_type==3){
					$center_id= $this->uri->segment(3);
				$datas['res_img']=$this->centermodel->get_center_id_gallery($center_id);
				$this->load->view('pia/pia_header');
				$this->load->view('pia/centers/create_gallery',$datas);
				$this->load->view('pia/pia_footer');
				}else{
						redirect('/');
			}
		}

		public function gallery(){
				$datas=$this->session->userdata();
				$user_id=$this->session->userdata('user_id');
				$user_type=$this->session->userdata('user_type');
				if($user_type==3){
					$center_id=$this->input->post('center_id');
					$name_array = $_FILES['center_photos']['name'];
					$tmp_name_array = $_FILES['center_photos']['tmp_name'];
					$count_tmp_name_array = count($tmp_name_array);
					$static_final_name = time();
					for($i = 0; $i < $count_tmp_name_array; $i++){
				   $extension = pathinfo($name_array[$i] , PATHINFO_EXTENSION);
					 $file_name[]=$static_final_name.$i.".".$extension;
					move_uploaded_file($tmp_name_array[$i], "assets/center/gallery/".$static_final_name.$i.".".$extension);
					}
				$datas=$this->centermodel->create_gallery($center_id,$file_name,$user_id);
				if($datas['status']=="success"){
					$this->session->set_flashdata('msg', 'Gallery Updated Successfully');
					redirect('center/create_gallery/'.$center_id.'');
				}else if($datas['status']=="limit"){
					$this->session->set_flashdata('msg', 'Center Gallery  Maximum  images Exceeds');
					redirect('center/create_gallery/'.$center_id.'');
				}else{
					$this->session->set_flashdata('msg', 'Failed to Add');
						redirect('center/create_gallery/'.$center_id.'');
				}
			 }
			 else{
					redirect('/');
			 }
		}


		public function change_status(){
			$datas=$this->session->userdata();
			$user_id=$this->session->userdata('user_id');
			$user_type=$this->session->userdata('user_type');
			if($user_type==1 || $user_type==2){
				$status=$this->input->post('stat');
				$id=$this->input->post('id');
				$datas=$this->centermodel->change_status($status,$id,$user_id);
			}else{
				redirect('/');
			}
		}

		public function delete_videos(){
			$datas=$this->session->userdata();
			$user_id=$this->session->userdata('user_id');
			$user_type=$this->session->userdata('user_type');
			if($user_type==3){
					$id=$this->input->post('id');
					$datas=$this->centermodel->delete_videos($id);
			}else{
				redirect('/');
			}
		}

		public function delete_gal(){
			$datas=$this->session->userdata();
			$user_id=$this->session->userdata('user_id');
			$user_type=$this->session->userdata('user_type');
			if($user_type==3){
				 	$center_photo_id=$this->input->post('gal_id');
					$datas['res']=$this->centermodel->delete_gal($center_photo_id);
			}else{
				redirect('/');
			}
		}
}
