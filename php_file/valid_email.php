<?php
if(isset($_POST["text1"]))
  {
		// echo "your email id is:".$_POST["text1"];
		// set API Access Key
		$access_key = 'abaab6f93b4184ae2cdf7424e7f553a4';

		// set email address
		$email_address = $_POST["text1"];

		// Initialize CURL:
		$ch = curl_init('http://apilayer.net/api/check?access_key='.$access_key.'&email='.$email_address.'');  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// Store the data:
		$json = curl_exec($ch);
		curl_close($ch);

		// Decode JSON response:
		$validationResult = json_decode($json, true);

		// Access and use your preferred validation result objects
		//$validationResult['format_valid'];
		//$validationResult['smtp_check'];
		//$validationResult['score'];
		// echo "<pre>";
		// print_r($validationResult);
		// echo "</pre>";

		$public_domain = array('gmail','yahoo','hotmail','rediff');
		$domain_in = strtok($validationResult['domain'], ".");
		//print_r($domain_in);
		//echo '<br>';

		if ($validationResult['format_valid'] && $validationResult['smtp_check']) {
			if(!in_array($domain_in, $public_domain)){

			echo "email is valid, domain is not public domain.<br>So , accepted!!";
			}
			else
			{
			echo "email is valid but has public domain,so can't be accepted !!<br> Please try with another email";
			}
		}
		else{
			echo "invalid email";
		}
	}

?>