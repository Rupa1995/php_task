
<!DOCTYPE html>
<html>
<head>
	<title>task1</title>
	  <link rel="stylesheet" type="text/css" href="stylesheets/task1.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
	<div class="container task1" >
		<div class="task-box">
			<h1>PHP TASK-1</h1>
		    <form action="task1_result.php" method="post">
		    	<div>
			        <label>First name: </label>
			        <input type="text" name="firstname" id="fname" onkeyup="myfun()">
			    </div>
			    <div>
			    	<label>Last name: </label>
			        <input type="text" name="lastname"  id="lname" onkeyup="myfun()">
			    </div>
			    <div>   				
			        <label>Full Name: </label>
			        <input type="text" name="fullname" readonly id="fullname">
			    </div>
			   
			    <div id="submit">
			        <input type="submit" value="Submit">
			    </div>
		    </form>
		  
		</div>
	</div>
	<script>
		 
		 function myfun(){
		 	var fn = document.getElementById("fname").value;
		 	var ln = document.getElementById("lname").value;
		 	document.getElementById("fullname").value = fn +" "+ ln;
		 	var full = document.getElementById("fullname").value; 
		}
	</script>
</body>
</html>
