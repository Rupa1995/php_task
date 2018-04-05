<?php

  if(isset($_POST["text1"]))
  {
    $email = $_POST["text1"];
    
    $email_demo = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
    if(preg_match($email_demo, $email))
    {
      $email_parts = explode('@', $email);
    //print_r($email_parts);
     $domain = array_pop($email_parts);
      print_r($domain);
      if(preg_match("/(hotmail.com|gmail.com|yahoo.com|rediff.com)/i", $domain))
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
		<form action="valid_email.php" method="post" name="form1">
      <!-- <form action="" method="post" name="form1"> -->
			<input type="text" name="text1" placeholder="enter your email.." value="">
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