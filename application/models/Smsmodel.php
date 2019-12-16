<?php
Class Smsmodel extends CI_Model
{
	public function __construct()
	{
	  parent::__construct();

	}

	public function send_sms($to_phone,$smsContent)
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => "https://api.msg91.com/api/v2/sendsms?country=91",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => '{
				 "sender": "MADMIN",
				 "route": "4",
				 "country": "91",
				 "sms": [
				 {
				   "message": "'.urlencode($smsContent).'",
				   "to": [
				   "'.$to_phone.'"
				   ]
				 }
				 ]
			   }',
		CURLOPT_SSL_VERIFYHOST => 0,
		CURLOPT_SSL_VERIFYPEER => 0,
		CURLOPT_HTTPHEADER => array(
		"authkey: 308533AMShxOBgKSt75df73187",
		"content-type: application/json"
		),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			echo $response;
		}

	}

}
?>
