
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
			        <input type="text" name="firstname" class="txtName" id="fname" onkeyup="myfun()" required oninvalid="this.setCustomValidity('Enter your firstname')" oninput="setCustomValidity('')">
			    </div>
			    <div>
			    	<label>Last name: </label>
			        <input type="text" name="lastname" class="txtName" id="lname" onkeyup="myfun()" required oninvalid="this.setCustomValidity('Enter lastname')" oninput="setCustomValidity('')">
			    </div>
			    <div>   				
			        <label>Full Name: </label>
			        <input type="text" name="full" id="fullname" readonly style="background: #dedede">
			    </div>
			    <div>
			    	<label>Mobile no.:</label>
			    	<input maxlength="13" name="text1" placeholder="enter mobile number with +91 prefix.." onkeyup ="phonenumber()" onfocus="resetvalue()" id="mobile" required oninvalid="this.setCustomValidity('Enter 10 digit mobile no. with +91 as preffix,starting with 7,8 or 9')" oninput="setCustomValidity('')">
    				<div id="errors" type="hidden"></div>
			    </div>
			    <div>
			    	<label>Email Id:  </label>
			    	<input type="text" name="text2" placeholder="enter your email.." onblur ="emailverify()" onfocus="resetvalue()" id="email" required oninvalid="this.setCustomValidity('Enter valid email id')" oninput="setCustomValidity('')">
			    	<div id="email_error" type="hidden"></div>
			    </div>
			    <div id="image">
		    	 	<div>
		    	 		<label>Profile Image:  </label>
			    		<input type="file" name="image" id="img" required oninvalid="this.setCustomValidity('Enter image')" oninput="setCustomValidity('')">
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
	<script>
		var mobile = document.getElementById('mobile');
		var error = document.getElementById('errors');
		var error2 = document.getElementById('email_error');
		var email = document.getElementById('email');
		var marksheet = document.getElementById('marks');

	//-------------------- to enter only alphabets in name field----------------

		$(function () {
		      $('.txtName').keydown(function (e) {
		          if (e.shiftKey || e.ctrlKey || e.altKey) {
		              e.preventDefault();
		          } else {
		              var key = e.keyCode;
		              if (!((key == 8)||(key == 9)|| (key >= 97 && key <= 122) || (key >= 65 && key <= 90))) {
		                  e.preventDefault();
		              }
		          }
		      });
		  });
	//-----------------------full name field---------------------------------

				 function myfun(){
				 	var fn = document.getElementById("fname").value;
				 	var ln = document.getElementById("lname").value;
				 	document.getElementById("fullname").value = fn +" "+ ln;
				 	var full = document.getElementById("fullname").value; 
				}

	//-----------------------phone number validation-------------------------

				function phonenumber()
					{  
					  var phoneno = /^\+91?([7-9][0-9]{9})$/;
				            while(mobile.value !=""){
				            if(mobile.value.match(phoneno))
				            {	mobile.style.border = "2px solid MediumSeaGreen";
				        		error.innerHTML="";
				                return true;
				            }
				            else
				            {
				               error.innerHTML= "Enter 10 digit mobile no. with +91 as preffix,<br>starting with 7,8 or 9";
				               mobile.style.border = "2px solid red";
				               error.style.color = "red";
				               return false;
				            }
				          }
 					 }


 	//-------------------------reset error field values-----------------------------

 					 function resetvalue(){
				      	error.innerHTML="";
				      	mobile.innerHTML="";
				      	mobile.style.border="";
				      	error2.innerHTML="";	      	
				      	email.style.border="";
				      }
	//--------------------------------marks verify ----------------------------------------
					 function marks_verify()
					{
					  var marks = marksheet.value.split('\n');
					  var count = marks.length;
						console.log(count);
					  for(var i= count -1; i >= 0 ; i--){
					  		var patrn = /^[A-Za-z]+[|]+\b([0-9]{1,2}|100)\b$/;
				            while(marks[i] !=""){
				            	console.log(marks[i]);
				            if(marks[i].match(patrn))
				            {	marksheet.style.outline = "1px solid MediumSeaGreen";
				                return true;

				            }
				            else
				            {
				   
				               marksheet.style.outline = "1px solid red";
				               // error.style.color = "red";
				               return false;
				            }
				          }
 					 }
 					}
	//--------------------------email verify using mailbox--------------------------------------------

 					 function emailverify(){
  						// set endpoint and your access key
						var access_key = 'abaab6f93b4184ae2cdf7424e7f553a4';
						var email_address = document.getElementById('email').value;
						// verify email address via AJAX call
						$.ajax({
						    url: 'http://apilayer.net/api/check?access_key=' + access_key + '&email=' + email_address,   
						    dataType: 'jsonp',
						    success: function(json) {
                             	console.log(json.format_valid);
							    console.log(json.smtp_check);
						    // Access and use your preferred validation result objects
						    if(json.format_valid && json.smtp_check){   
							    var public_domain = ['gmail','yahoo','hotmail','rediff'];
							    var domain_in = public_domain.indexOf(json.domain.slice(0,json.domain.indexOf(".")));
							   		if(domain_in >= 0)
						                {	
						                	error2.innerHTML= "not accepted, has public domain";
						                	email.style.border = "1px solid red";
				               				error2.style.color = "red";
						                	// document.getElementById('email').value ="";
						                }
						                else{
						                	email.style.border = "2px solid MediumSeaGreen";
						                	return true;
						                }
						    }
						    else{
						    	error2.innerHTML= "not valid email id!";
			                	email.style.border = "1px solid red";
	               				error2.style.color = "red";
						    	// document.getElementById('email').value ="";
						    }
						}
						});
 					 }

 	//-------------------------email verification---------------------------------------				

 		 // function emailverify(){
 		 // 	var email_demo = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
 		 // 	var pattern = /gmail|yahoo|rediff|hotmail/g;
 		 // 	while(email.value !=""){
	   //          if(email.value.match(email_demo))
	   //          {	
	   //          	// var email_parts = email.value.split('@');
	   //          	// var domain = email_parts[1];
	   //          	// var domain_parts = domain.split('.');
	   //          	// var ext = domain_parts[0];
    // 				if(pattern.test(email.value) == true){
	   //  				error2.innerHTML= "Do not enter email with public domain";
		  //              	email.style.border = "2px solid red";
		  //              	error2.style.color = "red";
		  //              	return false;
    // 				}
    // 				else {
    // 					email.style.border = "2px solid MediumSeaGreen";
				//         error2.innerHTML="";
				//         return true;
    // 				}
	   //          }
	   //          else
	   //          {
	   //             error2.innerHTML= "Enter valid email";
	   //             email.style.border = "2px solid red";
	   //             error2.style.color = "red";
	   //             return false;
	   //          }
	   //        }
 		 // }

    //----------------------------------ajax code to return data without page refresh-----------------------------

		 $(function(){
			$('#form6').on('submit',function(event){
				event.preventDefault();
				var formData = new FormData(this);
				if($('#fname').val()!="" && $('#lname').val()!="" && $('#mobile').val()!="" && $('#email').val()!="" && $('#img').val()!="" && $('#marks').val()!=""){
 				
 				$.ajax({
 					type: 'POST',
 					url: 'task6_result.php',
 					data: formData,
 					contentType: false,
 					cache: false,
 					processData: false,
 					success: function(data){
 						// alert('form was submitted');
 						//$('#output').val(data);
 						$('.task1').empty();
 						$('.task1').append(data);
 					},
 					error: function(data){
 						alert('not submitted');

 					},
 					async: false

 				});
				}
	 		
	 	});
		 });



	</script>
</body>
</html>

