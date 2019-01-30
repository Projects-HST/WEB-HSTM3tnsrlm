<?php
Class Admissionmodel extends CI_Model
{

  public function __construct()
  {
      parent::__construct();

  }




     function getall_trade()
     {

      $query="SELECT * FROM edu_trade WHERE status='Active'";
      $resultset=$this->db->query($query);
      return $resultset->result();
     }

     function getall_session_details()
      {
      $query1="SELECT * FROM edu_timing WHERE status='Active' ORDER BY id DESC ";
      $res=$this->db->query($query1);
      return $res->result();
     }

    function ad_create($had_aadhar_card,$aadhar_card_num,$admission_location,$admission_date,$name,$fname,$mname,$sex,$dob_date,$age,$nationality,$religion,$community_class,$community,$mother_tongue,$course,$mobile,$sec_mobile,$email,$userFileName,$institute_name,$last_studied,$qual,$tran_cert,$address,$disability,$city,$state,$blood_group,$status,$user_id,$prefer_time)
    {
      $select="SELECT * FROM edu_student_prospects Where email='$email' AND mobile='$mobile'";
       $result=$this->db->query($select);
       if($result->num_rows()>0){
         $data = array(
             "status" => "already"
         );
         return $data;
       }else{
   $query="INSERT INTO edu_student_prospects(pia_id,have_aadhaar_card,aadhaar_card_number,name,sex,dob,age,nationality,religion,community_class,community,father_name,mother_name,mobile,sec_mobile,email,state,city,address,mother_tongue,disability,student_pic,blood_group,admission_date,admission_location,preferred_trade, preferred_timing,last_institute,last_studied,qualified_promotion,transfer_certificate, status,created_by,created_at)
   VALUES ('$user_id','$had_aadhar_card','$aadhar_card_num','$name','$sex','$dob_date','$age','$nationality','$religion','$community_class','$community','$fname','$mname','$mobile','$sec_mobile','$email','$state','$city','$address',
     '$mother_tongue','$disability','$userFileName','$blood_group','$admission_date','$admission_location','$course','$prefer_time','$institute_name','$last_studied','$qual','$tran_cert','$status','$user_id',NOW())";

          $resultset1=$this->db->query($query);
          $insert_id = $this->db->insert_id();
          $data=array("status" => "success","last_id"=>$insert_id);
          return $data;
       }

      }

       //GET ALL Admission Form
       function get_all_admission($user_id)
  	   {
          $query="SELECT esp.*,eu.name as added_by FROM edu_student_prospects as esp left join edu_users as eu on eu.user_id=esp.created_by where esp.pia_id='$user_id' ORDER BY esp.id desc";
           $res=$this->db->query($query);
           return $res->result();
         }

        function get_all_pending_prospects($user_id)
        {
         $query="SELECT esp.*,eu.name as added_by FROM edu_student_prospects as esp left join edu_users as eu on eu.user_id=esp.created_by where esp.pia_id='$user_id'  and esp.status='Pending' ORDER BY esp.id desc";
          $res=$this->db->query($query);
          return $res->result();
        }
        function get_all_rejected_prospects($user_id)
        {
           $query="SELECT esp.*,eu.name as added_by FROM edu_student_prospects as esp left join edu_users as eu on eu.user_id=esp.created_by where esp.pia_id='$user_id'  and esp.status='Rejected' ORDER BY esp.id desc";
          $res=$this->db->query($query);
          return $res->result();
        }
        function get_all_confirmed_prospects($user_id)
        {
         $query="SELECT esp.*,eu.name as added_by FROM edu_student_prospects as esp left join edu_users as eu on eu.user_id=esp.created_by where esp.pia_id='$user_id'  and esp.status='Confirmed' ORDER BY esp.id desc";      
          $res=$this->db->query($query);
          return $res->result();
        }


       function get_edit_details($admission_id){
         $id=base64_decode($admission_id)/98765;
         $query="SELECT * FROM edu_student_prospects WHERE id='$id'";
         $res=$this->db->query($query);
         return $res->result();
       }


       function getall_blood_group()
       {
        $blood="SELECT * FROM edu_blood_group WHERE status='Active'";
        $blood1=$this->db->query($blood);
        return $blood1->result();
       }


       function check_email($email){
         $query="SELECT * FROM edu_student_prospects WHERE email='$email'";
         $res=$this->db->query($query);
         if($res->num_rows()>0){
           echo "false";
           }else{
             echo "true";
         }
       }

       function update_details($admission_id,$had_aadhar_card,$aadhar_card_num,$admission_location,$admission_date,$name,$fname,$mname,$sex,$dob_date,$age,$nationality,$religion,$community_class,$community,$mother_tongue,$course,$mobile,$sec_mobile,$email,$userFileName,$institute_name,$last_studied,$qual,$tran_cert,$address,$disability,$city,$state,$blood_group,$status,$user_id,$prefer_time)
       {
        $id=base64_decode($admission_id)/98765;
         $query="UPDATE edu_student_prospects SET have_aadhaar_card='$had_aadhar_card',aadhaar_card_number='$aadhar_card_num',name='$name',sex='$sex',dob='$dob_date',age='$age',nationality='$nationality',religion='$religion',community_class='$community_class',community='$community',father_name='$fname',mother_name='$mname',mobile='$mobile',sec_mobile='$sec_mobile',email='$email',       state='$state',city='$city',address='$address',mother_tongue='$mother_tongue',disability='$disability',student_pic='$userFileName',blood_group='$blood_group',admission_date='$admission_date',admission_location='$admission_location',preferred_trade='$course',preferred_timing='$prefer_time',last_institute='$institute_name',last_studied='$last_studied',qualified_promotion='$qual',transfer_certificate='$tran_cert',status='$status',       updated_by='$user_id',updated_at=NOW() WHERE id='$id'";


       $res=$this->db->query($query);
         if($res){
         $data= array("status" => "success");
         return $data;
       }else{
         $data= array("status" => "Failed to Update");
         return $data;
       }

       }

	  function getData($email)
		{
			$query = "SELECT * FROM edu_student_prospects WHERE email='".$email."'";
			$resultset = $this->db->query($query);
			return count($resultset->result());
      }

		function check_mobile($mobile)
		{
      $select="SELECT * FROM edu_student_prospects Where mobile='$mobile'";
			$result = $this->db->query($select);
      if($result->num_rows()>0){
        echo "false";
        }else{
          echo "true";
      }
		}

    function check_aadhar_exist($aadhar_card_num){
     $select="SELECT * FROM edu_student_prospects Where aadhaar_card_number='$aadhar_card_num'";
      $result=$this->db->query($select);
      if($result->num_rows()>0){
        echo "false";
        }else{
          echo "true";
      }
    }

    function check_aadhar_num_exist($aadhar_card_num,$admission_id){
      $id=base64_decode($admission_id)/98765;
      $select="SELECT * FROM edu_student_prospects Where aadhaar_card_number='$aadhar_card_num' AND id!='$id'";
      $result=$this->db->query($select);
      if($result->num_rows()>0){
            echo 'false';
        }else{
          echo 'true';
      }
    }

    function check_email_exist_already($email,$admission_id){
      $id=base64_decode($admission_id)/98765;
      $select="SELECT * FROM edu_student_prospects Where email='$email' AND id!='$id'";
      $result=$this->db->query($select);
      if($result->num_rows()>0){
            echo 'false';
        }else{
          echo 'true';
      }
    }

    function check_mobile_already($mobile,$admission_id){
      $id=base64_decode($admission_id)/98765;
      $select="SELECT * FROM edu_student_prospects Where mobile='$mobile' AND id!='$id'";
      $result=$this->db->query($select);
      if($result->num_rows()>0){
            echo 'false';
        }else{
          echo 'true';
      }
    }

}
?>
