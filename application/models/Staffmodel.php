<?php

Class Staffmodel extends CI_Model
{

  public function __construct()
  {
      parent::__construct();

  }


    function checkemail($email){
     $select="SELECT * FROM edu_staff_details Where email='$email'";
      $result=$this->db->query($select);
      if($result->num_rows()>0){
        echo "false";
        }else{
          echo "true";
      }
    }

    function checkmobile($mobile){
     $select="SELECT * FROM edu_staff_details Where phone='$mobile'";
      $result=$this->db->query($select);
      if($result->num_rows()>0){
        echo "false";
        }else{
          echo "true";
      }
    }

    function checkemail_edit($email,$staff_id){
      $select="SELECT * FROM edu_staff_details Where email='$email' AND id!='$staff_id'";
      $result=$this->db->query($select);
      if($result->num_rows()>0){
        echo "false";
        }else{
          echo "true";
      }
    }
    function checkmobile_edit($mobile,$staff_id){
     $select="SELECT * FROM edu_staff_details Where phone='$mobile' AND id!='$staff_id'";
      $result=$this->db->query($select);
      if($result->num_rows()>0){
        echo "false";
        }else{
          echo "true";
      }
    }

    function create_staff_details($select_role,$name,$address,$email,$class_tutor,$mobile,$sec_phone,$sex,$dob,$nationality,$religion,$community_class,$community,$qualification,$status,$staff_prof_pic,$user_id){

      $select="SELECT * FROM edu_staff_details Where email='$email' AND phone='$mobile'";
       $result=$this->db->query($select);
       if($result->num_rows()>0){
         $data = array(
             "status" => "already"
         );
         return $data;
         }else{
           $insert="INSERT INTO edu_staff_details (pia_id,role_type,name,sex,dob,nationality,religion,community_class,community,address,email,phone,sec_phone,profile_pic,trade_batch_id,qualification,status,created_by,created_at) VALUES('$user_id','$select_role','$name','$sex','$dob','$nationality','$religion','$community_class','$community','$address','$email','$mobile','$sec_phone','$staff_prof_pic','$class_tutor','$qualification','$status','$user_id',NOW())";
            $result=$this->db->query($insert);
            $insert_id = $this->db->insert_id();
            $digits = 6;
			$OTP = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
			$md5pwd=md5($OTP);
			
            if($select_role=='4'){
                $user_name=$mobile;
            }else if($select_role=='5'){
              $user_name=$mobile;
            }else{
              $data = array(
                  "status" => "something went wrong"
              );
                return $data;
            }
            $user_table="INSERT INTO edu_users (name,user_name,user_password,user_type,user_master_id,pia_id,created_date,status,last_login_date) VALUES('$name','$user_name','$md5pwd','$select_role','$insert_id','$user_id',NOW(),'Active',NOW())";
              $result_user=$this->db->query($user_table);
              $to =$email;
              $subject ='"Welcome Message"';
              $htmlContent = '
              <html>
              <head>  <title></title>
              </head>
              <body style="background-color:beige;">
              <table cellspacing="0" style=" width: 300px; height: 200px;">
              <tr>
              <th>Email:</th><td>'.$email.'</td>
              </tr>
              <tr>
              <th>Username :</th><td>'.$user_name.'</td>
              </tr>
              <tr>
              <th>Password:</th><td>'.$OTP.'</td>
              </tr>
              <tr>
              <th></th><td><a href="'.base_url() .'">Click here  to Login</a></td>
              </tr>
              </table>
              </body>
              </html>';
              // Set content-type header for sending HTML email
              $headers = "MIME-Version: 1.0" . "\r\n";
              $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
              // Additional headers
              $headers .= 'From: info<info@tnsrlm.com>' . "\r\n";
              mail($to,$subject,$htmlContent,$headers);
			  
            if ($result_user) {
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




    }

    function get_all_staff_details($user_id){
      $select="SELECT * FROM edu_staff_details WHERE pia_id='$user_id' ORDER BY id desc";
      $result=$this->db->query($select);
      return $result->result();
    }

    function get_all_staff_trainer($user_id){
      $select="SELECT * FROM edu_staff_details WHERE pia_id='$user_id' AND role_type='4' ORDER BY id desc";
      $result=$this->db->query($select);
      return $result->result();
    }

    function get_all_staff_mobilizer($user_id){
      $select="SELECT * FROM edu_staff_details WHERE pia_id='$user_id' AND role_type='5' ORDER BY id desc";
      $result=$this->db->query($select);
      return $result->result();
    }
    function get_all_staff_details_by_id($staff_id){
      $id=base64_decode($staff_id)/98765;
      $select="SELECT * FROM edu_staff_details WHERE id='$id'";
      $result=$this->db->query($select);
      return $result->result();
    }




    function update_staff_details_to_id($select_role,$name,$address,$email,$class_tutor,$mobile,$sec_phone,$sex,$dob,$nationality,$religion,$community_class,$community,$qualification,$status,$staff_prof_pic,$user_id,$staff_id){

    $update="UPDATE edu_staff_details SET role_type='$select_role',name='$name',sex='$sex',address='$address',email='$email',trade_batch_id='$class_tutor',phone='$mobile',sec_phone='$sec_phone',dob='$dob',nationality='$nationality',religion='$religion',community_class='$community',community='$community',      qualification='$qualification',status='$status',profile_pic='$staff_prof_pic',updated_at=NOW(),updated_by='$user_id' WHERE id='$staff_id'";

      $result=$this->db->query($update);

      $update_user="UPDATE edu_users SET name='$name',user_type='$select_role',status='$status' WHERE  user_master_id='$staff_id'";
      $result_user=$this->db->query($update_user);
      if ($result_user) {
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




}
?>
