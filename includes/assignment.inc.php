<?php

if(isset($_POST['assign-submit'])) {
    //assign variables
     //isset function to remove undefined Index Errors 
     if(isset($_POST['one'])) {
        $one = $_POST['one'];
    } else {
        $one = NULL;
    }
     if(isset($_POST['two'])) {
        $two = $_POST['two'];
    } else {
        $two = NULL;
    }
    if(isset($_POST['three'])) {
        $three = $_POST['three'];
    } else {
        $three = NULL;
    }
    if(isset($_POST['four'])) {
        $four = $_POST['four'];
    } else {
        $four = NULL;
    }
    if(isset($_POST['five'])) {
        $five = $_POST['five'];
    } else {
        $five = NULL;
    }
    if(isset($_POST['six'])) {
        $six = $_POST['six'];
    } else {
        $six = NULL;
    }
    if(isset($_POST['seven'])) {
        $seven = $_POST['seven'];
    } else {
        $seven = NULL;
    }
    if(isset($_POST['eight'])) {
        $eight = $_POST['eight'];
    } else {
        $eight = NULL;
    }
    $startDate = date("Y-m-d",strtotime($_POST['startdate']));  //change date to the required format
    $endDate = date("Y-m-d", strtotime($_POST['enddate']));
    $startTime = date("h:i:s",strtotime($_POST['starttime']));  //change time to the required format
    $endTime = date("h:i:s",strtotime($_POST['endtime']));
    $assignmentNo = $_POST['id'];
    $username = $_POST['username'];
    
    // echo $startDate;
    // echo $username;
    // echo $startTime;

    require 'kinderCare_db.php';

    // $sql="INSERT INTO assignment(assignmentID,character1,character2,character3,character4,character5,character6,character7,character8,startDate,endDate,startTime,endTime,teacherUsername) 
    // VALUES($assignmentNo,$one,$two,$three,$four,$five,$six,$seven,$eight,$startDate,$endDate,$startTime,$endTime,$username)";
    // mysqli_query($conn,$sql);
    // header("Location: ../assignment.php");

    // //use prepared statements to inject data into the database securely
    $query = "INSERT INTO assignment(assignmentID,character1,character2,character3,character4,character5,character6,character7,character8,startDate,endDate,startTime,endTime,teacherUsername)
             VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query)) {
        header("Location: ../assignment.php?error=failedtoUpload");
        exit();
    }
    else {
        // $trData = "SELECT teacherUsername from teacher WHERE teacherUsername='$username'"; //"NSUBUGA RAYMOND"";
        mysqli_stmt_bind_param($stmt,'isssssssssssss',$assignmentNo,$one,$two,$three,$four,$five,$six,$seven,$eight,$startDate,$endDate,$startTime,$endTime,$username);
        mysqli_stmt_execute($stmt);
        header("Location: ../assignment.php?uploadsuccessful");
    }
    mysqli_stmt_close($stmt); //close statement 
    mysqli_close($conn);  //close database connection
}
else {
    header("Location: ../assignment.php?error=nouser");
    exit();
}