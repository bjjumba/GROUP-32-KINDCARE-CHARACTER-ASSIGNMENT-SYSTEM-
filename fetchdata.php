<?php
session_start();
include_once("dbaccess.php");

$dbAccesss = new DbAccess();

if (isset($_POST['action'])) {

    $marks =  $dbAccesss->select("mark");

    echo  json_encode($marks);
} else {
    echo "not sent";
}