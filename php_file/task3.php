
<!DOCTYPE html>
<html>
<head>
	<title>task3</title>
	<link rel="stylesheet" type="text/css" href="../stylesheets/task1.css">
</head>
<body>

	<div class="container task1">
		<div class="task-box">
		<form action="task3_result.php" method="post">
			<textarea name="message" rows="10" cols="30" placeholder="enter:- subject|marks" id="marks" onkeyup="marks_verify()"></textarea>
			
			<input type="submit" name="submit" value="submit">
		</form>
		</div>
	</div>
	<p id="demo"></p>
	<script>
	var marksheet = document.getElementById('marks');
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
	</script>
</body>
</html>

 	