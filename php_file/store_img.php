<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "tiger", "imagesDB");

  


  if (isset($_POST['upload'])) {
  
  	$image = $_FILES['myimage']['name'];
    $tmp_img =$_FILES['myimage']['tmp_name']

  	$target = "../images/".basename($_FILES['myimage']['name']);

  	$sql = "INSERT INTO images (image, name) VALUES ('$image')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($tmp_img, $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM images");
?>
