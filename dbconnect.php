<?php
/*$sql = "CREATE DATABASE php_task";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
	} else {
    echo "Error creating database: " . $conn->error;
}*/
/*$sql = "CREATE TABLE php_task6(id INT NOT NULL PRIMARY 	KEY AUTO_INCREMENT,
								fname VARCHAR(200) NOT NULL,
								lname VARCHAR(200) NOT NULL,
								mobile INT NOT NULL,
								email VARCHAR(200) NOT NULL, 
								image VARCHAR(200) NOT NULL, 
								image_text VARCHAR(200),
								marks VARCHAR(200))";
if (mysqli_query($conn, $sql)) {

	echo "table created";
	}
	else{
	echo "could not create table" . mysqli_error($conn);
	}*/

		$servername = "localhost";
		$username = "root";
		$password = "tiger";
		$database = "php_task";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $database);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		    
		} 
		//else echo "connected";
		if(isset($_GET)){
				$fname = $_POST['firstname'];
				$lname = $_POST['lastname'];
				$mobile = $_POST['text1'];
				$email = $_POST['text2'];
				$image_upload = $_FILES['image']['name'];
				
				$marks = $_POST['message'];

				$sql = "INSERT INTO php_task6(fname,lname,mobile,email,image,marks) VALUES ('$fname','$lname','$mobile','$email','$image_upload','$marks');";

				// if(mysqli_query($conn,$sql))
				// {
				// 	echo "inserted";
				// }
				// else{
				// 	echo "not inserted";
				// }
}

//header("refresh:50; url=task6.php");

$conn->close();
?>

