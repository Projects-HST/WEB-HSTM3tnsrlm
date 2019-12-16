<?php
Class Graphmodel extends CI_Model
{
	  public function __construct()
	  {
		  parent::__construct();
	  }

	function get_mobilizer_id($user_id){
          $select="SELECT
					*
				FROM
					edu_users AS eu,
					 edu_staff_details AS es
				WHERE
					eu.user_type = '5' AND eu.pia_id = '$user_id' AND eu.user_master_id =es.id";
          $get_result=$this->db->query($select);
          return $get_result->result();
        }


}
?>
