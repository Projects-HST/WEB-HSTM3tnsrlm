<?php
Class Admissionmodel extends CI_Model
{

  public function __construct()
  {
      parent::__construct();

  }

     function getall_trade($user_id)
     {
		  $query="SELECT * FROM edu_trade WHERE pia_id = '$user_id' AND status='Active'";
		  $resultset=$this->db->query($query);
		  return $resultset->result();
     }

     function getall_session_details()
     {
		  $query1="SELECT * FROM edu_timing WHERE status='Active' ORDER BY id DESC ";
		  $res=$this->db->query($query1);
		  return $res->result();
     }

    function ad_create($had_aadhar_card,$aadhar_card_num,$admission_location,$admission_date,$name,$sex,$fname,$mname,$dob_date,$age,$mobile,$sec_mobile,$email,$father_mobile,$mother_mobile,$head_family,$head_education,$yearly_income,$no_family,$languages,$address,$city,$state,$nationality,$religion,$mother_tongue,$community,$community_class,$identification_marks1,$identification_marks2,$blood_group,$prefer_trade,$disability,$qualification,$qualification_details,$promotion_status,$year_education,$year_passing,$institute_name,$edu_doc_type,$job_type,$status,$user_id,$aadhar_cardName,$community_docName,$disability_docName,$userPicName,$edu_docName,$rationcard_docName,$voterid_docName,$jobcard_docName,$bankac_docName)
    {
      $select="SELECT * FROM edu_student_prospects Where email='$email' AND mobile='$mobile'";
      $result=$this->db->query($select);
		 if($result->num_rows()>0){
			 $data = array(
				 "status" => "already"
			 );
			 return $data;
		 }else{
			 $query = "INSERT INTO `edu_student_prospects` (`pia_id`, `admission_date`, `admission_location`, `have_aadhaar_card`, `aadhaar_card_number`, `name`, `sex`, `dob`, `age`, `nationality`, `religion`, `community_class`, `community`, `mobile`, `sec_mobile`, `email`, `state`, `city`, `address`, `father_name`, `father_mobile`, `mother_name`, `mother_mobile`, `mother_tongue`, `lang_known`, `disability`, `blood_group`, `identification_mark_1`, `identification_mark_2`, `head_family_name`, `head_family_edu`, `no_family`, `yearly_income`, `preferred_trade`, `qualification`, `qualification_details`, `year_of_edu`, `year_of_pass`, `qualified_promotion`, `last_institute`, `edu_certificate`, `student_pic`, `jobcard_type`, `status`, `created_by`, `created_at`) VALUES ('$user_id', '$admission_date', '$admission_location', '$had_aadhar_card', '$aadhar_card_num', '$name', '$sex', '$dob_date', '$age', '$nationality', '$religion', '$community_class', '$community', '$mobile', '$sec_mobile', '$email', '$state', '$city', '$address', '$fname', '$father_mobile', '$mname', '$mother_mobile', '$mother_tongue', '$languages', '$disability', '$blood_group', '$identification_marks1', '$identification_marks2', '$head_family', '$head_education', '$no_family', '$yearly_income', '$prefer_trade', '$qualification', '$qualification_details', '$year_education', '$year_passing', '$promotion_status', '$institute_name', '$edu_doc_type', '$userPicName', '$job_type', '$status', '$user_id', NOW())";
			
          $resultset1=$this->db->query($query);
          $insert_id = $this->db->insert_id();
		  
		  if ($aadhar_cardName != ""){
				$sQuery = "INSERT INTO `document_details` (`prospect_student_id`, `doc_master_id`, `file_name`, `status`, `created_at`, `created_by`) VALUES ('$insert_id', '1', '$aadhar_cardName', 'Active', '$user_id', NOW())";
				$resultset=$this->db->query($sQuery);
		  }
		  if ($edu_docName != ""){
				$sQuery = "INSERT INTO `document_details` (`prospect_student_id`, `doc_master_id`, `file_name`, `status`, `created_at`, `created_by`) VALUES ('$insert_id', '2', '$edu_docName', 'Active', '$user_id', NOW())";
				$resultset=$this->db->query($sQuery);
		  }
		  if ($community_docName != ""){
				$sQuery = "INSERT INTO `document_details` (`prospect_student_id`, `doc_master_id`, `file_name`, `status`, `created_at`, `created_by`) VALUES ('$insert_id', '3', '$community_docName', 'Active', '$user_id', NOW())";
				$resultset=$this->db->query($sQuery);
		  }
		  if ($rationcard_docName != ""){
				$sQuery = "INSERT INTO `document_details` (`prospect_student_id`, `doc_master_id`, `file_name`, `status`, `created_at`, `created_by`) VALUES ('$insert_id', '4', '$rationcard_docName', 'Active', '$user_id', NOW())";
				$resultset=$this->db->query($sQuery);
		  }
		  if ($voterid_docName != ""){
				$sQuery = "INSERT INTO `document_details` (`prospect_student_id`, `doc_master_id`, `file_name`, `status`, `created_at`, `created_by`) VALUES ('$insert_id', '5', '$voterid_docName', 'Active', '$user_id', NOW())";
				$resultset=$this->db->query($sQuery);
		  }
		  if ($jobcard_docName != ""){
				$sQuery = "INSERT INTO `document_details` (`prospect_student_id`, `doc_master_id`, `file_name`, `status`, `created_at`, `created_by`) VALUES ('$insert_id', '6', '$jobcard_docName', 'Active', '$user_id', NOW())";
				$resultset=$this->db->query($sQuery);
		  }
		  if ($disability_docName != ""){
				$sQuery = "INSERT INTO `document_details` (`prospect_student_id`, `doc_master_id`, `file_name`, `status`, `created_at`, `created_by`) VALUES ('$insert_id', '7', '$disability_docName', 'Active', '$user_id', NOW())";
				$resultset=$this->db->query($sQuery);
		  }
		  if ($bankac_docName != ""){
				$sQuery = "INSERT INTO `document_details` (`prospect_student_id`, `doc_master_id`, `file_name`, `status`, `created_at`, `created_by`) VALUES ('$insert_id', '8', '$bankac_docName', 'Active', '$user_id', NOW())";
				$resultset=$this->db->query($sQuery);
		  }
          $data=array("status" => "success","last_id"=>$insert_id);
          return $data;
       }

      }

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

		function get_edit_details_docs($admission_id){
         $id=base64_decode($admission_id)/98765;
         $query="SELECT * FROM document_details WHERE prospect_student_id='$id'";
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

     function update_details($admission_id,$had_aadhar_card,$aadhar_card_num,$admission_location,$admission_date,$name,$sex,$fname,$mname,$dob_date,$age,$mobile,$sec_mobile,$email,$father_mobile,$mother_mobile,$head_family,$head_education,$yearly_income,$no_family,$languages,$address,$city,$state,$nationality,$religion,$mother_tongue,$community,$community_class,$identification_marks1,$identification_marks2,$blood_group,$prefer_trade,$disability,$qualification,$qualification_details,$promotion_status,$year_education,$year_passing,$institute_name,$edu_doc_type,$job_type,$userPicName,$status,$user_id)
       {
			$id=base64_decode($admission_id)/98765;	
			
			if ($disability == 0){
				$sQuery = "SELECT * FROM `document_details` WHERE `prospect_student_id` = '$id' AND `doc_master_id` = '7'";
				$doc_result = $this->db->query($sQuery);
				if($doc_result->num_rows()>0)
					{
						foreach ($doc_result->result() as $rows)
						{
							$doc_id = $rows->id;
							$doc_file_name = $rows->file_name;
							
							$query = "DELETE FROM `document_details` WHERE `id` = '$doc_id'";
							$resultset = $this->db->query($query);
							
							$uploaddir = 'assets/documents/'.$doc_file_name;
							unlink($uploaddir);
							
						}
					}
			}
			if ($community_class=='BC' || $community_class=='MBC' || $community_class=='OC'){
				$sQuery = "SELECT * FROM `document_details` WHERE `prospect_student_id` = '$id' AND `doc_master_id` = '3'";
				$doc_result = $this->db->query($sQuery);
				if($doc_result->num_rows()>0)
					{
						foreach ($doc_result->result() as $rows)
						{
							$doc_id = $rows->id;
							$doc_file_name = $rows->file_name;
							
							$query = "DELETE FROM `document_details` WHERE `id` = '$doc_id'";
							$resultset = $this->db->query($query);
							
							$uploaddir = 'assets/documents/'.$doc_file_name;
							unlink($uploaddir);
							
						}
					}
			}
			
			
			
			$query="UPDATE edu_student_prospects SET admission_date='$admission_date',admission_location='$admission_location',have_aadhaar_card='$had_aadhar_card',aadhaar_card_number='$aadhar_card_num',name='$name',sex='$sex',dob='$dob_date',age='$age',nationality='$nationality',religion='$religion',community_class='$community_class',community='$community',mobile='$mobile',sec_mobile='$sec_mobile',email='$email',state='$state',city='$city',address='$address',father_name='$fname',father_mobile='$father_mobile',mother_name='$mname',mother_mobile='$mother_mobile',mother_tongue='$mother_tongue',lang_known='$languages',disability='$disability',blood_group='$blood_group',identification_mark_1='$identification_marks1', identification_mark_2='$identification_marks2',head_family_name='$head_family',head_family_edu='$head_education',no_family='$no_family',yearly_income='$yearly_income',preferred_trade='$prefer_trade',qualification='$qualification',qualification_details='$qualification_details',year_of_edu='$year_education',year_of_pass='$year_passing',qualified_promotion='$promotion_status',last_institute='$institute_name',edu_certificate='$edu_doc_type',student_pic='$userPicName',jobcard_type='$job_type',status='$status',updated_by='$user_id',updated_at=NOW() WHERE id='$id'";
		   $res=$this->db->query($query);
		if($res){
				$data= array("status" => "success");
				return $data;
		   }else{
				$data= array("status" => "Failed to Update");
				return $data;
		   }
       }
		function check_doc_exist($admission_id,$doc_master_id,$doc_Name,$user_id)
		{
			$id = base64_decode($admission_id)/98765;
		
			$sQuery = "SELECT * FROM `document_details` WHERE `prospect_student_id` = '$id' AND `doc_master_id` = '$doc_master_id'";
			$doc_result = $this->db->query($sQuery);
			if($doc_result->num_rows()>0)
			{
				foreach ($doc_result->result() as $rows)
				{
					$doc_id = $rows->id;
					$doc_file_name = $rows->file_name;
					
					$query = "DELETE FROM `document_details` WHERE `id` = '$doc_id'";
					$resultset = $this->db->query($query);
					
					$uploaddir = 'assets/documents/'.$doc_file_name;
					unlink($uploaddir);

					 $sQuery = "INSERT INTO `document_details` (`prospect_student_id`, `doc_master_id`, `file_name`, `status`, `created_at`, `created_by`) VALUES ('$id', '$doc_master_id', '$doc_Name', 'Active', NOW(),'$user_id')";
					$resultset=$this->db->query($sQuery);
				
					
				}
			} else {
					 $sQuery = "INSERT INTO `document_details` (`prospect_student_id`, `doc_master_id`, `file_name`, `status`, `created_at`, `created_by`) VALUES ('$id', '$doc_master_id', '$doc_Name', 'Active', NOW(),'$user_id')";
					$resultset=$this->db->query($sQuery);
		
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
