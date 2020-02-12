<?php

Class Schememodel extends CI_Model
{

  public function __construct()
  {
      parent::__construct();

  }

	function create_scheme($scheme_name,$scheme_info,$scheme_video_link,$status,$user_id){
	  $create_scheme="INSERT INTO edu_scheme_details(scheme_name,scheme_info,scheme_video,status,created_by,created_at) VALUES('$scheme_name','$scheme_info','$scheme_video_link','$status','$user_id',NOW())";
	  $result=$this->db->query($create_scheme);
		  
		 if($result){
			$data= array("status" => "success");
			return $data;
		  }else{
			$data= array("status" => "failed");
			return $data;
		  }
	}
	   
   function list_schemes(){
	  $select="SELECT * FROM edu_scheme_details ORDER BY id desc";
	  $get_all=$this->db->query($select);
	  return $get_all->result();
	}
	   

   function update_scheme($scheme_id,$scheme_name,$scheme_info,$scheme_video_link,$status,$user_id){
          $update_scheme="UPDATE edu_scheme_details SET scheme_name='$scheme_name',scheme_info='$scheme_info',scheme_video='$scheme_video_link',status='$status',updated_by='$user_id',updated_at=NOW() WHERE id='$scheme_id'";
          $result=$this->db->query($update_scheme);
          if($result){
            $data= array("status" => "success");
            return $data;
          }else{
            $data= array("status" => "failed");
            return $data;
          }
       }


    function create_gallery($scheme_id,$file_name,$user_id){

          $count_picture=count($file_name);

          for($i=0;$i<$count_picture;$i++){
            $check_batch="SELECT * FROM edu_scheme_photos WHERE scheme_id='$scheme_id'";
           $res=$this->db->query($check_batch);
            $res->num_rows();
            if($res->num_rows()>10){
            $data = array(
                "status" => "limit"
            );
            return $data;
          }else{
            $gal_l=$file_name[$i];
             $gall_img="INSERT INTO edu_scheme_photos(scheme_id,scheme_photo,status,created_by,created_at,updated_at,updated_by) VALUES('$scheme_id','$gal_l','Active','$user_id',NOW(),NOW(),'$user_id')";
             $res_gal   = $this->db->query($gall_img);
              }
            }

          if ($res_gal) {
              $data = array(
                  "status" => "success"
              );
              return $data;
          } else {
              $data = array(
                  "status" => "failed"
              );
              return $data;
          }

        }



        // Get all Scheme Pictures
        function get_scheme_gallery_img($scheme_id){
           $get_all_gallery_img="SELECT * FROM edu_scheme_photos WHERE scheme_id='$scheme_id'";
          $get_all=$this->db->query($get_all_gallery_img);
          return $get_all->result();
        }

        // Getting details about scheme
        function get_scheme_details($scheme_id){
         $get_all_gallery_img="SELECT * FROM edu_scheme_details WHERE id='$scheme_id'";
          $get_all=$this->db->query($get_all_gallery_img);
          return $get_all->result();
        }

        function delete_gal($scheme_photo_id){
          $get_all_gallery_img="DELETE  FROM edu_scheme_photos WHERE id='$scheme_photo_id'";
          $get_all=$this->db->query($get_all_gallery_img);
          if ($get_all) {
            echo "success";
          } else {
              echo "Something Went Wrong";
          }
        }
		
		
		// Getting details about scheme
        function getpia_scheme($user_id){
         $get_details = "SELECT
							sch.*
						FROM
							edu_users AS eu
						LEFT JOIN edu_pia AS ep
						ON
							eu.user_master_id = ep.id AND eu.user_type = '3'
						LEFT JOIN edu_scheme_details AS sch
						ON
							ep.scheme_id = sch.id 
						WHERE
							eu.user_id = '$user_id'";
			$get_all=$this->db->query($get_details);
			return $get_all->result();
        }
		
		// Get all Scheme Pictures
        function getpia_scheme_gallery($user_id){
           $get_all_gallery_img="SELECT
								sch.*
							FROM
								edu_users AS eu
							LEFT JOIN edu_pia AS ep
							ON
								eu.user_master_id = ep.id AND eu.user_type = '3'
							LEFT JOIN edu_scheme_photos AS sch
							ON
								ep.scheme_id = sch.scheme_id 
							WHERE
								eu.user_id = '$user_id'";
          $get_all=$this->db->query($get_all_gallery_img);
          return $get_all->result();
        }

        







}
?>
