<?php

Class Centermodel extends CI_Model
{

  public function __construct()
  {
      parent::__construct();

  }

        function get_center_details($user_id){
          $select="SELECT * FROM edu_center_master WHERE pia_id='$user_id' ORDER BY id desc";
          $get_all=$this->db->query($select);
          return $get_all->result();
        }

          function create_center($center_name,$center_info,$center_address,$center_logo,$status,$user_id){
            $check_exist="SELECT * FROM edu_center_master WHERE center_name='$center_name'";
            $result = $this->db->query($check_exist);
                  if ($result->num_rows() == 0) {
                    $insert="INSERT INTO edu_center_master (center_name,center_info,center_banner,center_address,pia_id,status,created_by,created_at) VALUES ('$center_name','$center_info','$center_logo','$center_address','$user_id','$status','$user_id',NOW())";
                      $result = $this->db->query($insert);
                      if($result){
                        $data= array("status" => "success");
                        return $data;
                      }else{
                        $data= array("status" => "failed");
                        return $data;
                      }
                  }else{
                    $data= array("status" => "already");
                    return $data;
                  }

          }


          function check_center_name($center_name,$user_id){
            $select="SELECT * FROM edu_center_master WHERE center_name='$center_name'";
               $res=$this->db->query($select);
              if($res->num_rows()>0){
                echo "false";
              }else{
                echo "true";
              }
          }

          function check_center_name_exist($center_id,$center_name,$user_id){
            $id=base64_decode($center_id)/98765;
            $select="SELECT * FROM edu_center_master WHERE center_name='$center_name' AND id!='$id'";
               $res=$this->db->query($select);
              if($res->num_rows()>0){
                echo "false";
              }else{
                echo "true";
              }
          }

          function get_center_id_details($center_id){
            $id=base64_decode($center_id)/98765;
            $select="SELECT * FROM edu_center_master WHERE id='$id'";
            $get_all=$this->db->query($select);
            return $get_all->result();
          }

       function update_center($center_id,$center_name,$center_info,$center_address,$center_logo,$status,$user_id){
           $id=base64_decode($center_id)/98765;
          $update="UPDATE edu_center_master SET center_name='$center_name',center_info='$center_info',center_banner='$center_logo',center_address='$center_address',status='$status',updated_by='$user_id',updated_at=NOW() WHERE id='$id'";
          $result=$this->db->query($update);
          if($result){
            $data= array("status" => "success");
            return $data;
          }else{
            $data= array("status" => "failed");
            return $data;
          }
       }


       function update_center_logo($center_logo,$user_id){
         $update="UPDATE edu_center_videos SET center_banner='$center_logo',updated_by='$user_id',updated_at=NOW() WHERE id='1'";
         $result=$this->db->query($update);
         if($result){
           $data= array("status" => "success");
           return $data;
         }else{
           $data= array("status" => "failed");
           return $data;
         }
       }


       function add_video_link($center_id,$video_title,$video_link,$user_id){
          $id=base64_decode($center_id)/98765;
         $check_batch="SELECT * FROM edu_center_videos WHERE video_title='$video_title' AND center_id='$id'";
         $res=$this->db->query($check_batch);
         if($res->num_rows()==0){
         $insert="INSERT INTO edu_center_videos (center_id,video_title,center_videos,pia_id,status,created_by,created_at) values('$id','$video_title','$video_link','$user_id','Active','$user_id',NOW())";
         $result=$this->db->query($insert);
         if($result){
           $data= array("status" => "success");
           return $data;
         }else{
           $data= array("status" => "failed");
           return $data;
         }
       }else{
         $data= array("status" => "Already exist");
         return $data;
       }

       }

       //GET ALL gallery

        function create_gallery($center_id,$file_name,$user_id){
            $id=base64_decode($center_id)/98765;
            $count_picture=count($file_name);
          for($i=0;$i<$count_picture;$i++){
            $check_batch="SELECT * FROM edu_center_photos WHERE center_id='$center_id'";
            $res=$this->db->query($check_batch);
             $res->num_rows();
              if($res->num_rows()>10){
              $data = array(
                  "status" => "limit"
              );
              return $data;
            }else{

              $gal_l=$file_name[$i];
               $gall_img="INSERT INTO edu_center_photos(center_id,center_photos,pia_id,status,created_by,created_at,updated_at,updated_by) VALUES('$id','$gal_l','$user_id','Active','$user_id',NOW(),NOW(),'$user_id')";
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
        function get_center_id_gallery($center_id){
          $id=base64_decode($center_id)/98765;
           $get_all_gallery_img="SELECT * FROM edu_center_photos WHERE center_id='$id'";
          $get_all=$this->db->query($get_all_gallery_img);
          return $get_all->result();
        }

        function get_all_videos($center_id){
            $id=base64_decode($center_id)/98765;
           $get_all_gallery_img="SELECT * FROM edu_center_videos WHERE center_id='$id'";
          $get_all=$this->db->query($get_all_gallery_img);
          return $get_all->result();
        }





        function delete_gal($center_photo_id){
           $get_all_gallery_img="DELETE  FROM edu_center_photos WHERE id='$center_photo_id'";
          $get_all=$this->db->query($get_all_gallery_img);
          if ($get_all) {
            echo "success";
          } else {
              echo "Something Went Wrong";
          }
        }

        function delete_videos($id){
           $get_all_gallery_img="DELETE  FROM edu_center_videos WHERE id='$id'";

          $get_all=$this->db->query($get_all_gallery_img);
          if ($get_all) {
            echo "success";
          } else {
              echo "Something Went Wrong";
          }
        }








}
?>
