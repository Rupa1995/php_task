
<!DOCTYPE html>
<html>
<head>
	<title>task1</title>
	  <link rel="stylesheet" type="text/css" href="../stylesheets/task1.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
	<div class="container task1" >
		<div class="task-box">
			<h1>PHP TASK-1</h1>
		    <form action="task1_result.php" method="post">
		    	<div>
			        <label>First name: </label>
			        <input type="text" name="firstname" class="txtName" id="fname" required onblur="name_input()">
			    </div>
			    <div>
			    	<label>Last name: </label>
			        <input type="text" name="lastname" class="txtName" id="lname" required onblur="name_input()">
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
        if (e.shiftKey || e.ctrlKey || e.altKey) { //prevent all entry using shift , crtl or alt key 
          e.preventDefault();
        }
        else {
          var key = e.keyCode;  
          //prevent all entry except 8=backspace , 32=space, 46=period "." , arrows (35-40)and alphabets
         if (!((key == 8)||(key == 9)|| (key >= 97 && key <= 122) || (key >= 65 && key <= 90))) { 
            e.preventDefault();
          }
        }
      });
    });
		 
		 function name_input(){
		 	var firstname = document.getElementById("fname").value;
		 	var lastname = document.getElementById("lname").value;
		 	document.getElementById("fullname").value = firstname + " " + lastname; //concatnate input of first and last name 
		}

	</script>
</body>
</html>
