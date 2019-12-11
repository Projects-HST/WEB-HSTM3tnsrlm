<?php

Class Trademodel extends CI_Model
{
   public function __construct()
   {
      parent::__construct();
   }



      function getall_trade($user_id)
      {
         $query="SELECT * FROM edu_trade WHERE pia_id='$user_id' ORDER BY id DESC";
         $resultset=$this->db->query($query);
         return $resultset->result();
      }

      //CREATE Trade NAME

      function add_trade($tradename,$status,$user_id)
      {
         $check_class="SELECT * FROM edu_trade WHERE trade_name='$tradename' AND pia_id='$user_id'";
         $res=$this->db->query($check_class);
		 
         if($res->num_rows()==0){
			 $query="INSERT INTO edu_trade(trade_name,status,pia_id,created_at,created_by) VALUES('$tradename','$status','$user_id',NOW(),'$user_id')";
			 $resultset=$this->db->query($query);
				if($resultset){
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

      //GET SPECIFIC Trade Name
      function get_trade_id($trade_id)
      {
         $id=base64_decode($trade_id)/98765;
         $query="SELECT * FROM edu_trade WHERE id='$id'";
         $resultset=$this->db->query($query);
         return $resultset->result();
      }


      //UPDATE Trade NAME
      function update_trade_details($trade_name,$trade_id,$status,$user_id)
      {
         $id=base64_decode($trade_id)/98765;
         $check_class="SELECT * FROM edu_trade WHERE trade_name='$trade_name'  AND id!='$id' AND pia_id='$user_id'";
         $res=$this->db->query($check_class);
        
		if($res->num_rows()==0){
			 $query="UPDATE edu_trade SET trade_name='$trade_name',status='$status',updated_at=NOW(),updated_by='$user_id' WHERE id='$id'";
			  $resultset=$this->db->query($query);
				if($resultset){
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

}
?>
