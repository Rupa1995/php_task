
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
			        <input type="text" name="firstname" class="txtName" id="fname" onkeyup="myfun()">
			    </div>
			    <div>
			    	<label>Last name: </label>
			        <input type="text" name="lastname" class="txtName" id="lname" onkeyup="myfun()">
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
		$(function () {
      $('.txtName').keydown(function (e) {
          if (e.shiftKey || e.ctrlKey || e.altKey) {
              e.preventDefault();
          } else {
              var key = e.keyCode;
              if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                  e.preventDefault();
              }
          }
      });
  });
		 
		 function myfun(){
		 	var fn = document.getElementById("fname").value;
		 	var ln = document.getElementById("lname").value;
		 	document.getElementById("fullname").value = fn +" "+ ln;
		 	var full = document.getElementById("fullname").value; 
		}

	</script>
</body>
</html>
