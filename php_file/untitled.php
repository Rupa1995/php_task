<!--<?php
//$str = $_POST['message'];
//$str = explode("\n", $str);
//$string_version = implode("|", $str);
//$str1 = explode("|", $string_version);

//echo htmlspecialchars($_POST['message']);
//foreach ($str1 as $key => $value) {
//	if($key % 2 == 0){
//		$subject = $value;
//	}
//		else{
//		$marks = $value;
//	}
//}

//?>-->
<!--<!DOCTYPE html>
<html>
<head>
	<title>task3_result</title>
	<link rel="stylesheet" type="text/css" href="stylesheets/task1.css">
</head>
<body>
	<div class="container task1">
		<table style="width: 100%;">
			<caption><h2>Marksheet</h2></caption>
			<tr>
				<th>subject</th>
				<td><?php //echo $subject ?></td>
				

			</tr>
			<tr>
				<th>marks</th>
				<td><?php //echo $marks ?></td>

			</tr>
		</table>
	</div>
</body>
</html>-->
$arr = array("gmail","hotmail","yahoo","rediff");
if(!in_array(strtok($validatonresult['domain'],"."),$arr))
{
	echo $email "= is valid"; 
}


$str = $row['marks'];
$subject = array();
$marks = array();
$word = explode("\n", $str);
for ($i=0; $i < count($word); $i++) { 
    $arr = explode("|", $word[$i]);
    array_push($subject,$arr[0]);
    array_push($marks, $arr[1]);
}



success..
windows.location.href("/path");