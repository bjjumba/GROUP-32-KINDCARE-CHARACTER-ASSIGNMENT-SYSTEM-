<?php 
include_once("dbaccess.php");

$dbAccesss = new DbAccess();

$Usercode = $_POST['Usercode'];
$average = $_POST['average'];
$comment = $_POST['comment'];
$dbAccesss->insert('mark', ['Usercode'=>$Usercode, 'average'=>$average, 'comment'=>$comment]);
header("Location:reports.php");
?>