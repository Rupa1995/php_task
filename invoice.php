<?php
session_start();
$user = $_SESSION['userId'];
$servername = "localhost";
$username = "root";
$password = "tiger";
$database = "php_task";
$conn = mysqli_connect($servername, $username, $password, $database);
$sql = "SELECT * FROM php_task6 WHERE mobile = '$user';";
$result = mysqli_query($conn , $sql);
$row = mysqli_fetch_array($result);

$str = $row['marks'];
$subject = array();
$marks = array();
$word = explode("\n", $str);
for ($i=0; $i < count($word); $i++) { 
    $arr = explode("|", $word[$i]);
    if(isset($arr[0]) && isset($arr[1]))
    {
        array_push($subject,$arr[0]);
        array_push($marks, $arr[1]);
    }
}

require_once "./vendor/autoload.php";
$phpWord = new \PhpOffice\PhpWord\PhpWord();
$phpWord->setDefaultParagraphStyle(
    array(
        'alignment'  => \PhpOffice\PhpWord\SimpleType\Jc::CENTER,
        'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(12),
        'spacing'    => 100,
    )
);
$section = $phpWord->addSection(array('borderSize'=>25,'borderColor'=>'FF4500'));
// Adding Text element with font customized using explicitly created font style object...
$fontStyle = new \PhpOffice\PhpWord\Style\Font();
$fontStyle->setBold(true);
$fontStyle->setName('Tahoma');
$fontStyle->setSize(13);
$section->addText("Final Report",array('bold'=>true,'italic'=>true,'size'=> 20, 'allCaps'=>true, 'color' => '7FFFD4','underline'=>'single'));
//$textrun = $section->addTextRun([$paragraphstyle]);
$section->addImage('images/'.$row['image'],array('width' => 150, 'height'=> 150, 'align'=>'center'));
$section->addTextBreak(2);
$section->addText("Name: ".$row['fname']." ".$row['lname'],$fontStyle);
$section->addText("Mobile no.: ".$row['mobile'], $fontStyle);
$section->addText("Email: ".$row['email'], $fontStyle);            
$section->addTextBreak(1);

$fancyTableStyleName = 'Fancy Table';
$fancyTableStyle = array('borderSize' => 15, 'borderColor' => '006699', 'cellMargin' => 50, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER, 'cellSpacing' => 50);
$fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '0000FF', 'bgColor' => '66BBFF');
$fancyTableCellStyle = array('valign' => 'center');
$fancyTableCellBtlrStyle = array('valign' => 'center', 'textDirection' => \PhpOffice\PhpWord\Style\Cell::TEXT_DIR_BTLR);
$fancyTableFontStyle = array('bold' => true);
$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
$table = $section->addTable(array('alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER,'borderSize' => 15, 'borderColor' => '006699', 'cellMargin' => 80,'cellSpacing' => 50));
$table->addRow(900);
$table->addCell(2000, $fancyTableCellStyle)->addText('Marksheet',$fontStyle);
for ($i = 1; $i <= 2; $i++) {
    $table->addRow();
    for($c=0;$c< count($marks);$c++){
        if($i==1)
        $table->addCell(2000,$fancyTableCellStyle)->addText($subject[$c],$fancyTableFontStyle);
        else
        $table->addCell(2000,$fancyTableCellStyle)->addText($marks[$c],$fancyTableFontStyle);
}
}
$file = 'profile.docx';
header("Content-Description: File Transfer");
header('Content-Disposition: attachment; filename="' . $file . '"');
header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
header('Content-Transfer-Encoding: binary');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Expires: 0');
$xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$xmlWriter->save('php://output');
// Saving the document as OOXML file...
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('profile.docx');
?>
