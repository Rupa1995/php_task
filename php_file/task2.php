<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_tmp =$_FILES['image']['tmp_name'];
      // $file_type=$_FILES['image']['type'];
      // echo $file_type;
      // $tmp = explode('.',$_FILES['image']['name']);
      $file_ext=strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
      // echo $file_ext;
      // print_r($_FILES);
      $text = $_POST['message'];
      
      $extensions= array("jpeg","jpg","png");

      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
    
      if(empty($errors)){
         move_uploaded_file($file_tmp,"../images/".$file_name);

         chmod("../images/".$file_name, 0777);
         
         // echo "Success:<br>-------------------------<br><br>";
         echo '<img src = "../images/'.$file_name.'">';
         echo '<br><b> Image Name : </b>' .$text;

      }else{
         print_r($errors);
      }
   }

?>
<!DOCTYPE html>
<html>
<head>
	<title>task2</title>
	 <link rel="stylesheet" type="text/css" href="../stylesheets/task1.css">
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