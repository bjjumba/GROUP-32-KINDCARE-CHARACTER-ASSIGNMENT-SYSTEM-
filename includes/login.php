<?php

if(isset($_POST['login'])) {

    require 'kinderCare_db.php';

    $mailuname = $_POST['mailuname'];
    $passcode = $_POST['pcd'];

    if(empty($mailuname) || empty($passcode)) {
        header("Location: ../teacherLogin.php?error=emptyfields". $mailuname);
        exit();
    }
    else {
        $sql = "SELECT * FROM teacher WHERE teacherUsername = ? OR teacherEmail = ? AND  teacherPasscode= ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../teacherLogin.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "sss", $mailuname, $mailuname, $passcode);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)) {
                // $pcdCheck = password_verify($passcode, $row['teacherPasscode']);
                // if($pcdCheck == false) {
                //     header("Location: ../teacherLogin.php?error=wrongpcd");
                //     exit();
                // }
                // else if($pcdCheck == true){
                //     session_start();
                //     $_SESSION['trpcd'] = $row['teacherPasscode'];
                //     $_SESSION['userUid'] = $row['teacherUsername'];
                //     header("Location: ../welDash.php");
                //     exit();
                // } 
                // else{
                //     header("Location: ../teacherLogin.php?error=wrongpcd");
                //     exit();
                if($passcode == $row['teacherPasscode']) {
                    session_start();
                    $_SESSION['userUid'] = $row['teacherUsername']; 
                    header("Location: ../welDash.php");
                    exit();
                }
                else {
                    header("Location: ../teacherLogin.php?error=wrongpcd");
                    exit();
                }
            }
            else {
                header("Location: ../teacherLogin.php?error=nouser");
                exit();
            }
        }
    }
}
else {
    header("Location: ../teacherLogin.php");
    exit();
}