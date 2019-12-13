<?php
Class Taskmodel extends CI_Model
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

  function create_task($task_title,$task_desc,$select_user,$task_date,$user_id){
    $insert_query="INSERT INTO edu_task (user_id,task_title,task_description,task_date,pia_id,status,created_by,created_at) VALUES('$select_user','$task_title','$task_desc','$task_date','$user_id','Assigned','$user_id',NOW())";
    $exec_query=$this->db->query($insert_query);
    if ($exec_query) {
        $data = array("status" => "success");
    } else {
        $data = array("status" => "failed");
    }
	  return $data;
  }

  function view_task($user_id)
  {
		$query123="SELECT et.*,eu.name,eu.user_type from edu_task as et LEFT join edu_users as eu on  et.user_id=eu.user_id where et.created_by='$user_id'  ORDER by et.id desc";
		$res112=$this->db->query($query123);
		$result123=$res112->result();
		return $result123;
  }

  function view_task_mobilizer($user_id)
  {
		$query123="SELECT et.*,eu.name,eu.user_type from edu_task as et LEFT join edu_users as eu on et.created_by=eu.user_id where et.pia_id='$user_id' AND eu.user_type='5' ORDER by et.id desc";
		$res112=$this->db->query($query123);
		$result123=$res112->result();
		return $result123;
  }


  function task_details($task_id)
  {
    $query="SELECT * from edu_task WHERE id='$task_id'";
    $resultset=$this->db->query($query);
    return $resultset->result();
  }
  
		function update_task($id,$task_title,$task_desc,$task_comments,$select_user,$task_date,$task_status,$user_id){
          $id=base64_decode($id)/98765;
          $update="UPDATE edu_task SET task_title='$task_title',task_description='$task_desc',task_comments='$task_comments',user_id='$select_user',task_date = '$task_date', status='$task_status',updated_by='$user_id',updated_at=NOW() WHERE id='$id'";
          $result=$this->db->query($update);
          if($result){
            $data= array("status" => "success");
            return $data;
          }else{
            $data= array("status" => "failed");
            return $data;
          }
       }
}
?>
