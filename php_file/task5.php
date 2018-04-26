<!--<<<<<<<<<<<<<<<<<<<<<<<<<<< email validation without using mailboxlayer <<<<<<<<<<<<<<<<<<<<<<<<<< -->
<?php
if(isset($_POST["text1"]))      //check if input is present
{
  $email = $_POST["text1"];  
  $email_demo = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
  if(preg_match($email_demo, $email))         //preg_match() matches input with regex 
  {
    $email_parts = explode('@', $email);      //explode with '@' and select domain part
    $domain = array_pop($email_parts);
    print_r($domain);
    if(preg_match("/(hotmail.com|gmail.com|yahoo.com|rediff.com)/i", $domain)) //check if domain of input matches
    {
        echo "  not accepted, has public domain";
    }
    else 
    {
      echo "  accepted";
    }
  }
  else
  {
    echo "  not valid,enter valid email id,with no public domain";
  }
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>task5</title>
	<link rel="stylesheet" type="text/css" href="../stylesheets/task1.css">
</head>
<body>
	<div class="container task1">
    <div class="task-box">
		<form action="valid_email.php" method="post" name="form1">          <!-- email validation using mailboxlayer-->
      <!-- <form action="" method="post" name="form1"> -->
			<input type="text" name="text1" placeholder="enter your email.." value=""> <!--for validation without using mailboxlayer -->
			<input type="submit" name="submit" value="Submit">
    </form>
  </div>
	</div>
<!--	<script>
		function Validateemail(inputtxt)
      {
        var email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if(inputtxt.value.match(email))
        {
         
        	 alert("Valid email");
            return true;
          
        }
        else
        {
           alert("Not a valid email, please enter valid email id");
           return false;
        }
        }
	</script>-->
</body>
</html>