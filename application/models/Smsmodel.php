<?php
Class Smsmodel extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

//#################### SMS ####################//

	public function sendSMS($to_phone,$smsContent)
	{
        //Your authentication key
        $authKey = "308533AMShxOBgKSt75df73187";

        //Multiple mobiles numbers separated by comma
        $mobileNumber = "$to_phone";

        //Sender ID,While using route4 sender id should be 6 characters long.
        $senderId = "MADMIN";

        //Your message to send, Add URL encoding here.
        $message = urlencode($smsContent);

        //Define route
        $route = "transactional";

        //Prepare you post parameters
        $postData = array(
            'authkey'=> $authKey,
            'mobiles'=> $mobileNumber,
            'message'=> $message,
            'sender'=> $senderId,
            'route'=> $route
        );

        //API URL
        $url="https://control.msg91.com/api/sendhttp.php";

        // init the resource
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
            //,CURLOPT_FOLLOWLOCATION => true
        ));



        //Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


        //get response
        $output = curl_exec($ch);

        //Print error if any
        if(curl_errno($ch))
        {
            echo 'error:' . curl_error($ch);
        }

        curl_close($ch);
	}

//#################### SMS End ####################//


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

		echo $response = curl_exec($curl);
		echo $err = curl_error($curl);
exit;
		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			//echo $response;
		}

	}

}
?>
