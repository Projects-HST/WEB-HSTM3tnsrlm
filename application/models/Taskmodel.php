<?php
Class Taskmodel extends CI_Model
{
    public function __construct()
    {
      parent::__construct();
		$this->load->model('mailmodel');
		$this->load->model('smsmodel');
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
		
		$sQuery = "SELECT
					B.name,B.email,B.phone
				FROM
					`edu_users` A, edu_staff_details B
				WHERE
					A.`user_id` = '$select_user' AND A.`user_master_id` = B.id";
		$user_result = $this->db->query($sQuery);
		$ress = $user_result->result();
		if($user_result->num_rows()>0)
		{
			foreach ($user_result->result() as $rows)
			{
				$name = $rows->name;
				$email = $rows->email;
				$mobile = $rows->phone;
			}
					
		$subject ='M3 - New Task Assigned';
		$htmlContent = '<html>
							<head> <title></title>
							</head>
							<body>
							<p>Hi  '.$name.'</p>
							<p>New Task Assined for you</p>
							<p>Task Title: '.$task_title.'</p>
							</body>
							</html>';
							
			$smsContent = 'Hi  '.$name.' New Task Assined for you, '.$task_title.'';
			
			$this->mailmodel->sendEmail($email,$subject,$htmlContent);
			$this->smsmodel->sendSMS($mobile,$smsContent);
		}
		

		
		
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
		  
		  $sQuery = "SELECT
					B.name,B.email,B.phone
				FROM
					`edu_users` A, edu_staff_details B
				WHERE
					A.`user_id` = '$select_user' AND A.`user_master_id` = B.id";
		$user_result = $this->db->query($sQuery);
		$ress = $user_result->result();
		if($user_result->num_rows()>0)
		{
			foreach ($user_result->result() as $rows)
			{
				$name = $rows->name;
				$email = $rows->email;
				$mobile = $rows->phone;
			}
					
		$subject ='M3 - Task Updated';
		$htmlContent = '<html>
							<head> <title></title>
							</head>
							<body>
							<p>Hi  '.$name.'</p>
							<p>New Task Updated</p>
							<p>Task Title: '.$task_title.'</p>
							<p>Task Status: '.$task_status.'</p>
							</body>
							</html>';
			
			$smsContent = 'Hi  '.$name.' New Task Updated, '.$task_title.' - '.$task_status.'';
			
			$this->mailmodel->sendEmail($email,$subject,$htmlContent);
			$this->smsmodel->sendSMS($mobile,$smsContent);
		}
		  
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
