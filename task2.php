<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $tmp = explode('.',$_FILES['image']['name']);
      $file_ext=strtolower(end($tmp));
      $text = $_POST['message'];
      
      $expensions= array("jpeg","jpg","png");

      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
    
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/".$file_name);

         chmod("images/".$file_name, 0777);
         
         echo "Success:<br>-------------------------<br><br>";
         echo '<img src = "images/'.$file_name.'">';
         echo '<br> Image Name : ' .$text;

      }else{
         print_r($errors);
      }
   }

?>
<!DOCTYPE html>
<html>
<head>
	<title>task2</title>
	 <link rel="stylesheet" type="text/css" href="stylesheets/task1.css">
</head>
<body>
   <div class="container task1">
	<div class="task-box" >
	  <form action="" method="post" enctype="multipart/form-data">
		    	
		    	 <div id="image">
		    	 	<div>
			    		<input type="file" name="image">
			    	</div>
			    	<div>
			    		<textarea name="message" rows="10" cols="30" placeholder="say something...!!!!">
			    		</textarea>
			    	</div>
			    	<div>
				    	<input type="submit" name="upload" value="upload image">
				    </div>
			    </div>
		    </form>
		</div>
</div>
</body>
</html>