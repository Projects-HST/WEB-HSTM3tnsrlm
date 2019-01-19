<?php
Class Mobilizationmodel extends CI_Model
{
    public function __construct()
    {
      parent::__construct();
    }





  function get_mobilizer_user($user_id)
  {
    $query="SELECT u.user_id,u.name,u.user_type,u.user_master_id,u.status FROM edu_users AS u, edu_staff_details AS mb WHERE  u.user_master_id=mb.id AND u.user_type='5' AND u.user_type=mb.role_type AND u.status='Active' AND u.pia_id='$user_id'";
    $resultset=$this->db->query($query);
    return $resultset->result();
  }

  function upload_data($doc_name,$doc_month_year,$doc_file,$user_id){
    $insert_query="INSERT INTO edu_mobilization_plan (pia_id,doc_name,doc_file,doc_month_year,status,created_by,created_at) VALUES('$user_id','$doc_name','$doc_file','$doc_month_year','Active','$user_id',NOW())";
    $exec_query=$this->db->query($insert_query);
    if ($exec_query) {
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

  function view_plans($user_id)
  {
    $query123="SELECT * FROM edu_mobilization_plan WHERE pia_id='$user_id' ORDER BY id desc";
    $res112=$this->db->query($query123);
    $result123=$res112->result();
    return $result123;
  }




}
?>
