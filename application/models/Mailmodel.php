<?php
Class Mailmodel extends CI_Model
{
	public function __construct()
	{
	  parent::__construct();
	  $this->load->helper('url');
	}


	function send_mail($to_email,$subject,$htmlContent)
	{
		// Set content-type header for sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		// Additional headers
		$headers .= 'From: M3 Administrator<info@happysanztech.com>' . "\r\n";
		mail($to,$subject,$htmlContent,$headers);
	}
}
?>
