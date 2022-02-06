<?php

if(isset($_POST['statusChange'])) {
    $status = $_POST['status'];
    $usercode = $_POST['code'];

    require 'kinderCare_db.php';

    if($status == "Active") {
        $change="Inactive";
    }
    else if($status == "Inactive") {
        $change="Active";
    }

    $sql_command = "UPDATE pupil SET activeInactive = ? WHERE Usercode LIKE ?;";
    //use prepared statements

    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql_command)) {
        header("Location: ../register.php?error=failedtoUpdate");
        exit();
    }
    else {
        mysqli_stmt_bind_param($stmt,"ss",$change,$usercode);
        mysqli_stmt_execute($stmt);
        header("Location: ../register.php?statusChange=success");
        exit();
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}else {
    header("Location: ../register.php?failedtostatusChange");
    exit();
}