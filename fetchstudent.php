<?php
session_start();
include_once("dbaccess.php");

$dbAccesss = new DbAccess();
$assID = $_POST['assignmentID'];
$id = $_POST['Usercode'];
$details = $dbAccesss->select("mark", ['average', 'comment', 'Usercode'],['Usercode'=>$id, 'assignmentID'=>$assID]);
$_SESSION['Usercode'] = $details[0]['Usercode'];
$_SESSION['average'] = $details[0]['average'];
$_SESSION['comment'] = $details[0]['comment'];
 header("Location:reports.php");