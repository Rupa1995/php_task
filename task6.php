<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>task6</title>
	<meta charset="utf-8">
	  <link rel="stylesheet" type="text/css" href="stylesheets/task1.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
	<div class="container task1" >
		<div class="task-box">
			<h1>PHP Form</h1>
		    <form enctype="multipart/form-data" id="form6" runat="server">
		    	<div>
			        <label>First name: </label>
			        <input type="text" name="firstname" class="txtName" id="fname" onblur="myfun()" required oninvalid="this.setCustomValidity('Enter your firstname')" oninput="setCustomValidity('')">
			    </div>
			    <div>
			    	<label>Last name: </label>
			        <input type="text" name="lastname" class="txtName" id="lname" onblur="myfun()" required oninvalid="this.setCustomValidity('Enter lastname')" oninput="setCustomValidity('')">

			    </div>
			    <div>   				
			        <label>Full Name: </label>
			        <input type="text" name="full" id="fullname" readonly style="background: #dedede">

			    </div>
			    <div>
			    	<label>Mobile no.:</label>
			    	<input maxlength="13" name="text1" placeholder="enter mobile number with +91 prefix.." onblur ="phonenumber()" id="mobile" required oninvalid="this.setCustomValidity('Enter 10 digit mobile no. with +91 as preffix,starting with 7,8 or 9')" oninput="setCustomValidity('')">
    				<div id="errors" type="hidden"></div>
    				<p style="color: red">
			    		<?php
			    			if (isset($_SESSION['error1'])) {
						  	echo $_SESSION['error1'];
						  	unset($_SESSION['error1']);
						  }
			    		?></p>
			    </div>
			    <div>
			    	<label>Email Id:  </label>
			    	<input type="text" name="text2" placeholder="enter your email.." onblur ="emailverify()" id="email" required oninvalid="this.setCustomValidity('Enter valid email id')" oninput="setCustomValidity('')">
			    	<div id="email_error" type="hidden"></div>
			    	<p style="color: red">
			    		<?php
			    			if (isset($_SESSION['error2'])) {
						  	echo $_SESSION['error2'];
						  	unset($_SESSION['error2']);
						  }
			    		?></p>
			    </div>
			    <div id="image">
		    	 	<div>
		    	 		<label>Profile Image:  </label>
			    		<input type="file" name="image" id="img" required oninvalid="this.setCustomValidity('Enter image')" oninput="setCustomValidity('')">
			    		<p style="color: red">
			    		<?php
			    			if (isset($_SESSION['error'])) {
						  	echo $_SESSION['error'];
						  	unset($_SESSION['error']);
						  }
			    		?></p>
			    	</div>
			    </div>
			    <p>Marks sheet :-</p>
			    <div id="marksheet">
			    	<textarea name="message" rows="5" cols="30" placeholder="Enter: (Subject|Marks)" id="marks" onkeyup ="marks_verify()" required oninvalid="this.setCustomValidity('Enter your marks')" oninput="setCustomValidity('')"></textarea>
			    	
			    </div>
			    <input type="submit" id="submit" name="submit">

		    </form>
		  
		</div>
	</div>
<script src="task6.js"></script>
</body>
</html>

