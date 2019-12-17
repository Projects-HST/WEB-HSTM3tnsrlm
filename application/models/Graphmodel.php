<?php
Class Graphmodel extends CI_Model
{
	  public function __construct()
	  {
		  parent::__construct();
	  }

	function yearly_graph($user_id){
          $select="SELECT pia_id, YEAR(created_at) as create_year,
					COUNT(CASE WHEN status LIKE '%Confirmed%' THEN 1 END) AS confirmed,
					COUNT(CASE WHEN status LIKE '%Rejected%' THEN 1 END) AS rejected,
					COUNT(CASE WHEN status LIKE '%Pending%' THEN 1 END) AS pending,
				   (COUNT(CASE WHEN status LIKE '%Confirmed%' THEN 1 END)+COUNT(CASE WHEN status LIKE '%Rejected%' THEN 1 END)+COUNT(CASE WHEN status LIKE '%Pending%' THEN 1 END))/3 as average_total FROM edu_student_prospects WHERE pia_id = '$user_id' AND YEAR(CURDATE()) - 12 <= YEAR(created_at) GROUP BY YEAR(created_at)";
          $get_result=$this->db->query($select);
          return $get_result->result();
        }

}
?>
