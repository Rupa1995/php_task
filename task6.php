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
			        <input type="text" name="firstname" id="fname" onkeyup="myfun()" required oninvalid="this.setCustomValidity('Enter your firstname')"
    oninput="setCustomValidity('')">
			    </div>
			    <div>
			    	<label>Last name: </label>
			        <input type="text" name="lastname"  id="lname" onkeyup="myfun()" required oninvalid="this.setCustomValidity('Enter lastname')"
    oninput="setCustomValidity('')">
			    </div>
			    <div>   				
			        <label>Full Name: </label>
			        <input type="text" name="full" id="fullname" readonly>
			    </div>
			    <div>
			    	<label>Mobile no.:</label>
			    	<input type="text" name="text1" placeholder="enter your mobile number.." onblur="phonenumber()" id="mobile" required oninvalid="this.setCustomValidity('Enter 10 digit mobile no. with +91 as preffix')"
    oninput="setCustomValidity('')">
			    </div>
			    <div>
			    	<label>Email Id:  </label>
			    	<input type="text" name="text2" placeholder="enter your email.." onblur="emailverify()" id="email" required oninvalid="this.setCustomValidity('Enter valid email id')"
    oninput="setCustomValidity('')">
			    </div>
			    <div id="image">
		    	 	<div>
		    	 		<label>Profile Image:  </label>
			    		<input type="file" name="image" id="img">
			    	</div>
			    	<!-- <div>
			    		<textarea name="about" rows="2" cols="30" placeholder="say something...!!!!">
			    		</textarea>
			    	</div> -->
			    </div>
			    <p>Marks sheet :-</p>
			    <div id="marksheet">
			    	<textarea name="message" rows="10" cols="30" placeholder="Enter your marks...!!!!" id="marks"></textarea>
			    </div>
			    <input type="submit" id="submit" name="submit">

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
				function phonenumber()
					{
					  var mobile = document.getElementById('mobile');
					  var phoneno = /^\+91?\d{10}$/;
					  if(mobile.value.match(phoneno))
					  {
					      return true;
					  }
					  else
					  {	
					  	alert("enter valid number");
					  	mobile.value ="";
					     return false;
					  }
 					 }

 					//  function emailverify(){
  				// 		// set endpoint and your access key
						// var access_key = 'abaab6f93b4184ae2cdf7424e7f553a4';
						// var email_address = document.getElementById('email').value;
						
						
						// //var domain_in = $('#email :selected').val().split("@")[0];

						// // verify email address via AJAX call
						// $.ajax({
						//     url: 'http://apilayer.net/api/check?access_key=' + access_key + '&email=' + email_address,   
						//     dataType: 'jsonp',
						//     success: function(json) {
      //                        	console.log(json.format_valid);
						// 	    console.log(json.smtp_check);
						//     // Access and use your preferred validation result objects
						//     if(json.format_valid && json.smtp_check){
							   
						// 	    //console.log(json.score);
						// 	    var public_domain = ['gmail','yahoo','hotmail','rediff'];
						// 	    var domain_in = public_domain.indexOf(json.domain.slice(0,json.domain.indexOf(".")));
						// 	   	//var email_in = email_address.indexOf(json.domain.slice(json.domain.indexOf("@"),json.domain.indexOf(".")));
						// 	   		//console.log(domain_in);
						// 	   		if(domain_in >= 0)
						//                 {	
						//                 	alert("not accepted, has public domain");
						//                 	return false;

						//                 	document.getElementById('email').value ="";
						//                 }
						//                 else{
						//                 	//alert("accepted");
						//                 	return true;

						//                 }
						//     }
						//     else{
						    	
						//     	document.getElementById('email').value ="";
						//     }
						// }
						// });
 					//  }

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
				 						alert('form was submitted');
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

