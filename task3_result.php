<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$str = $_POST['message'];
$array = explode("\n", $str);
$finalarr = array();
// $test = "                            /^[A-Za-z]+[|]+\b([0-9]{1,2}|100)\b$/";

for($i = 0; $i < count($array);$i++){
        $finalarr[$i] = explode("|", $array[$i]);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>task3_result</title>
    <link rel="stylesheet" type="text/css" href="stylesheets/task1.css">
</head>
<body>
    <div class="container task3">
        <table style="width: 100%;">
           
            <?php
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
</body>
</html>


