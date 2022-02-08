<?php

if(isset($_POST['delete-request'])) {
    $usercode = $_POST['usercode'];

    require'kinderCare_db.php';

    $query = "DELETE FROM request WHERE Usercode LIKE ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query)) {
        header("Location: ../register.php?error=failedto Connect");
        exit();
    }else {
        mysqli_stmt_bind_param($stmt, "s", $usercode);
        mysqli_stmt_execute($stmt);
        header("Location: ../register.php");
        exit();
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else {
    header("Location: ../register.php?error=nouser");
    exit();
}