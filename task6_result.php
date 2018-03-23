<?php
session_start();
?>
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
         
         //echo "Success:<br>-------------------------<br><br>";
         //echo '<img src = "images/'.$file_name.'">';
         //echo '<br> Image Name : ' .$text;

      }else{
         print_r($errors);
      }
   }

?>
<!DOCTYPE html>
<html>
<head>
	<title>result</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="stylesheets/task1.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<div class="container" id="mydiv">
		<div class="image_bg">
			<div class="image">
				<?php
					echo '<img src = "images/'.$_FILES['image']['name'].'"><br>';
				?>
			</div>
		</div>
		<div class="abc">Welcome Onboard !!</div>
		<div class="container detail">
			<div class="Name">
				<b>Name: </b>
				<?php 
				echo $_POST['full']."<br>";
				?>
			</div>
			<div class="mob">
				<b>Mobile no.: </b>
				<?php
					echo $_POST['text1']."<br>";
				?>
			</div>
			<div class="email">
				<b>email: </b>
				<?php
					echo $_POST['text2']."<br>";
				?>
			</div>
		</div>
	    <div class="container marksheet">
        <table style="width: 100%;">
           
            <?php
            ini_set('display_errors', 1);
			ini_set('display_startup_errors', 1);
			error_reporting(E_ALL);

			$str = $_POST['message'];
			$array = explode("\n", $str);
			$finalarr = array();

			for($i = 0; $i < count($array);$i++){
			    $finalarr[$i] = explode("|", $array[$i]);
			}
            echo "<td colspan=".count($finalarr)."><h2>Marksheet</h2></td>";
            for($j=0;$j<2;$j++)
            {	 
                echo '<tr>';
                for ($i=0; $i < count($finalarr) ; $i++) { 
                        $subject = $finalarr[$i][$j];
                        echo '<td>' . $subject . '</td>';
                            
                }
                echo '</tr>';
            }
            ?>
        </table>
    </div>
</div>
   <form id="docform" method="post" action="invoice.php">
		<input type="hidden" name="htmlstring" id="htmlstring" value="">
		<input type="submit" id="docx-button" value="Generate docx">    	
    </form>
    <script>
    	$('#docx-button').click(function(){
    		$('#htmlstring').val($('#mydiv').html());
    	});
    </script>
</body>
</html>
<?php
	include 'dbconnect.php';

	//$_SESSION['full'] = $_POST['full'];
	//$_SESSION['mobile'] = $_POST['text1'];
	$_SESSION['userId'] = $_POST['text2'];
	//$_SESSION['marks'] = $_POST['message'];
	//$_SESSION['image_upload'] = $_FILES['image']['name'];
	// print_r($_SESSION['full']);
	// print_r($_SESSION['mobile']);
	//print_r($_SESSION['userId']);
	// print_r($_SESSION['marks']);
	// print_r($_SESSION['image_upload']);
?>