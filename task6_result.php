<?php
session_start();
?>
<?php
//----------------------- image insertion -----------------------

   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_tmp =$_FILES['image']['tmp_name'];
	  /*$file_type=$_FILES['image']['type'];
      $tmp = explode('.',$_FILES['image']['name']);*/
      																   //pathinfo() returns array of info of that file
      $file_ext=strtolower(pathinfo($file_name, PATHINFO_EXTENSION));  //pathinfo_extension returns extension of $file_name.
                                                                     //strtolower() converts to lowercase

      $text = $_POST['message'];
      $expensions= array("jpeg","jpg","png");
      if(in_array($file_ext,$expensions)=== false){			//checks if extension of input file is present in $extension array,
         
         redirect('task6.php');
         $_SESSION['error']="extension not allowed, please choose a JPEG or PNG file.";
      }
      if(empty($errors)==true){								//if extension of image matches ,upload it to $file_tmp file
         move_uploaded_file($file_tmp,"images/".$file_name);

         chmod("images/".$file_name, 0777);					//change permission of image
      }else{
      	redirect('task6.php');
         $_SESSION['error']="please choose a JPEG or PNG file image.";
      }
   }
//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< email verification using mailboxlayer  <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

/*   if(isset($_POST["text2"]))
  {
		$access_key = 'abaab6f93b4184ae2cdf7424e7f553a4';		// set API Access Key

		$email_address = $_POST["text2"];						// set email address

		// Initialize CURL:
	$ch = curl_init('http://apilayer.net/api/check?access_key='.$access_key.'&email='.$email_address.'');  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$json = curl_exec($ch);					// Store the data:
		curl_close($ch);

		// Decode JSON response:
		$validationResult = json_decode($json, true);
		$public_domain = array('gmail','yahoo','hotmail','rediff');
		$domain_in = strtok($validationResult['domain'], ".");
		if ($validationResult['format_valid'] && $validationResult['smtp_check']) {
			if(!in_array($domain_in, $public_domain)){
			}
			else
			{	redirect('task6.php');
         		$_SESSION['error2']="email not allowed, has public domain";
				// $_POST["text2"] ="";
				// header('location:../task6.php');
				// exit;
			}
		}
		else{
			redirect('task6.php');
         	$_SESSION['error2']="invalid email";
			// $_POST["text2"] ="";
			// // echo "invalid email";
			// header('location:../task6.php');
			// exit;
		}
	}*/

//----------------------------------------phone number validation -------------------------------
	if(isset($_POST["text1"])){
		$phone = "/^\+91?([6-9][0-9]{9})$/";
		$phone_input = $_POST['text1'];
		if(!(preg_match($phone, $phone_input))){
			redirect('task6.php');
         	$_SESSION['error1']="invalid mobile number";
		}
	}

function redirect($url){						//redirect to home page if error occur
    $string = '<script type="text/javascript">';
    $string .= 'window.location = "' .$url. '"';
    $string .= '</script>';
    echo $string;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>result</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="stylesheets/task1.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<div class="container" id="mydiv">
		<div class="image_bg">
			<div class="image">
				<?php
					echo '<img src = "images/'.$_FILES['image']['name'].'"><br>';
				?>
			</div>
		</div>
		<div class="abc">Welcome Onboard !!</div>
		<div class="container detail">
			<div class="Name">
				<b>Name: </b>
				<?php 
				echo $_POST['full']."<br>";
				?>
			</div>
			<div class="mob">
				<b>Mobile no.: </b>
				<?php
					echo $_POST['text1']."<br>";
				?>
			</div>
			<div class="email">
				<b>email: </b>
				<?php
					echo $_POST['text2']."<br>";
				?>
			</div>
		</div>
	    <div class="container marksheet">
        <table style="width: 100%;">
           
            <?php
            ini_set('display_errors', 1);
			ini_set('display_startup_errors', 1);
			error_reporting(E_ALL);
			$test = "/^[A-Za-z]+[|]+\b([0-9]{1,2}|100)\b$/";
			$str = $_POST['message'];
			$str=trim($str);
			$array = explode("\n", $str);					//seperate entry of each row
			$finalarr = array();
			for($k = count($array)-1 ; $k>=0; $k--){
				/*$flag = 0;*/
			if(preg_match($test, $array[$k])){				//comparing if each row entry matches																				// the criteria of (string|integer)
				
				for($i = 0; $i < count($array);$i++){
				    $finalarr[$i] = explode("|", $array[$i]);

				}
	            echo "<td colspan=".count($finalarr)."><h2>Marksheet</h2></td>";
	            for($j=0;$j<2;$j++)
	            {	 
	                echo '<tr>';
	                for ($i=0; $i < count($finalarr) ; $i++) { 
	                        $subject = $finalarr[$i][$j];
	                        echo '<td>' . $subject . '</td>';
	                            
	                }
	                echo '</tr>';
	            }
        	}
        }
            ?>
        </table>
    </div>
</div>
   <form id="docform" method="post" action="invoice.php">
		<input type="hidden" name="htmlstring" id="htmlstring" value="">
		<input type="submit" id="docx-button" value="Generate docx">    	
    </form>
    <script> //for docx file download
    	$('#docx-button').click(function(){
    		$('#htmlstring').val($('#mydiv').html());
    	});
    </script>
</body>
</html>
<?php
	include 'dbconnect.php';
	$_SESSION['userId'] = $_POST['text1']; //session for fetching data to print in docx file
?>