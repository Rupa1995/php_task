<!DOCTYPE html>
<html>
<head>
	<title>task4</title>
	<link rel="stylesheet" type="text/css" href="stylesheets/task1.css">
</head>
<body>
  <div class="container task1">
	<div class="task-box">
		<form action="" method="post" name="form1">
			<input type="text" name="text1" placeholder="enter your mobile number..">
			<input type="submit" name="submit" value="Submit" onclick="phonenumber(document.form1.text1)">
		</form>
	</div>
</div>
	<script>
		function phonenumber(inputtxt)
{
  var phoneno = /^\+91?\d{10}$/;
  if(inputtxt.value.match(phoneno))
  {
  	 alert("Phone Number accepted");
      return true;
  }
  else
  {
     alert("Not a valid Phone Number");
     return false;
  }
  }
	</script>
</body>
</html>