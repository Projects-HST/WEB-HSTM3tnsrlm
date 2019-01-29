<?php

Class Loginmodel extends CI_Model
{

  public function __construct()
  {
      parent::__construct();

  }

       function login($email,$password)
       {
         $query = "SELECT * FROM edu_users WHERE  user_name = '$email'";
          $resultset=$this->db->query($query);
          if($resultset->num_rows()==1){
             $pwdcheck="SELECT * FROM edu_users WHERE user_name='$email' AND user_password='$password'";
            $res=$this->db->query($pwdcheck);

            if($res->num_rows()==1){
               foreach($res->result() as $rows){
                 $quer="SELECT status FROM edu_users WHERE user_id='$rows->user_id'";
                 $resultset=$this->db->query($quer);
                // return $resultset->result();
                 $status= $rows->status;
                 switch($status){
                    case "Active":
                      $data = array("user_name"  => $rows->user_name,"msg"  =>"success","name"=>$rows->name, "pia_id" => $rows->pia_id,"user_type"=>$rows->user_type,"status"=>$rows->status,"user_id"=>$rows->user_id,"user_pic"=>$rows->user_pic);
                      return $data;
                      //break;
                     //print_r($data);exit;
                      // break;
                    case "Inactive":
                            $data= array("status" => "Deactive","msg" => "Your Account Is De-Activated");
                            return $data;
                      break;


                 }


                //  if($rows->status=='A'){
                //    $data = array("user_name"  => $rows->user_name,"msg"  =>"success","name"=>$rows->name, "school_id" => $rows->school_id,"user_type"=>$rows->user_type,"status"=>$rows->status,"user_id"=>$rows->user_id,"user_pic"=>$rows->user_pic);
                //
                //  }

                   $data = array("user_name"  => $rows->user_name,"msg"  =>"success","name"=>$rows->name, "pia_id" => $rows->pia_id,"user_type"=>$rows->user_type,"status"=>$rows->status,"user_id"=>$rows->user_id,"user_pic"=>$rows->user_pic);
                   $this->session->set_userdata($data);
                   return $data;
                   }
                 }
                 else{
                  $data= array("status" => "notRegistered","msg" => "Password Wrong");
                  return $data;
                 }
                 }

                else{
                  $data= array("status" => "notRegistered","msg" => " Email invalid");
                  return $data;

            }

       }
	   
       function getuser($user_id){
         $query="SELECT ep.*,eu.* From edu_users as eu left join edu_pia as ep on eu.user_master_id=ep.id AND eu.user_type='3' WHERE eu.user_id='$user_id'";
         $resultset=$this->db->query($query);
         return $resultset->result();
       }

	   function getadminuser($user_id){
         $query="SELECT ep.*,eu.* From edu_users as eu left join edu_staff_details as ep on eu.user_master_id=ep.id AND eu.user_type='1' OR eu.user_type='2' WHERE eu.user_id='$user_id'";
         $resultset=$this->db->query($query);
         return $resultset->result();
       }
	   
       function password_update($new_password,$user_id){
            $pwd=md5($new_password);
            $query="UPDATE edu_users SET user_password='$pwd',	updated_date=NOW() WHERE user_id='$user_id'";
           $ex=$this->db->query($query);
           if($ex){
             echo "success";
           }else{
             echo "failed";
           }

       }

       function profile_update($pia_name,$pia_phone,$pia_email,$pia_address,$pia_id){
         $id=base64_decode($pia_id)/98765;
         $query="UPDATE edu_pia SET pia_address='$pia_address',pia_name='$pia_name',pia_phone='$pia_phone',pia_email='$pia_email' WHERE id='$id'";
         $ex=$this->db->query($query);
          if($ex){
            echo "success";
          }else{
              echo "failed";
          }
       }

       function checkemail_edit($email,$staff_id){
         $select="SELECT * FROM edu_pia Where pia_email='$email' AND id!='$staff_id'";
         $result=$this->db->query($select);
         if($result->num_rows()>0){
           echo "false";
           }else{
             echo "true";
         }
       }
       function checkmobile_edit($mobile,$staff_id){
       $select="SELECT * FROM edu_pia Where pia_phone='$mobile' AND id!='$staff_id'";
         $result=$this->db->query($select);
         if($result->num_rows()>0){
           echo "false";
           }else{
             echo "true";
         }
       }

       function check_password_match($old_password,$user_id){
         $pwd=md5($old_password);
         $select="SELECT * FROM edu_users Where user_password='$pwd' AND user_id='$user_id'";
           $result=$this->db->query($select);
           if($result->num_rows()==0){
             echo "false";
             }else{
               echo "true";
           }
       }

       function forgot_email($forgot_email){
         $query="SELECT pia_email,id,pia_name FROM edu_pia WHERE pia_email='$forgot_email'";
         $result=$this->db->query($query);
         if($result->num_rows()==0){
           echo "Email Not found";
         }else{
        foreach($result->result() as $row){}
             $name= $row->pia_name;
             $user_master_id= $row->id;
             $digits = 6;
             $OTP = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
             $reset_pwd=md5($OTP);
             $reset="UPDATE edu_users SET user_password='$reset_pwd' WHERE user_type='3' AND user_master_id='$user_master_id'";
             $result_pwd=$this->db->query($reset);
             $query="SELECT * FROM edu_pia WHERE id='$user_master_id'";
             $resultset=$this->db->query($query);
             foreach($resultset->result() as $rows){}
             $email=$rows->pia_email;
             $to=$email;
             $subject = '"Password Reset"';
             $htmlContent = '
               <html>
               <head>  <title></title>
               </head>
               <body>
               <p>Hi  '.$name.'</p>
               <center><p>Hi Your Account Password is Reset.Please Use Below Password to login</p></center>
                 <table cellspacing="0">

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
           $headers .= 'From: happysanz<info@happysanz.com>' . "\r\n";
           $sent= mail($to,$subject,$htmlContent,$headers);
           if($sent){
               echo "success";
           }else{
             echo "Somthing Went Wrong";
           }
     }

       }




}
?>
