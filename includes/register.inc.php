<?php
 if(isset($_POST['reg'])) {

    require "kindercare_db.php"; //use the database containing the data
    $usercode = $_POST["code"];
    $firstname = $_POST["fName"];
    $lastname = $_POST["lName"];
    $phonenumber = $_POST["phone"];
    $username = $_POST['username'];

    //USE PREPARED STATEMENTS TO INJECT PUPIL INFORMATION INTO THE DATABASE
    $pupil_insert = "INSERT INTO pupil (Usercode, firstname, lastname, phonenumber,teacherUsername) VALUES(?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $pupil_insert)) {
        header("Location: ../register.php?error=sqlerror");
        exit();
    }
    else {
        // $trData = "SELECT teacherUsername FROM teacher";
        mysqli_stmt_bind_param($stmt, "issss", $usercode, $firstname, $lastname, $phonenumber,$username);
        mysqli_stmt_execute($stmt);
        header("Location: ../register.php?registration=success");
        exit();
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}
else {
    header("Location: ../register.php");
    exit();
}

// if (isset($_POST['deactivate'])) {
//     $status = "SELECT activeInactive FROM pupil";
//     $active = 1;
//     $inactive = 0;
//     $sql = "UPDATE pupil SET activeInactive = '$inactive' WHERE ";
//     if($status==1) {

//     }
// }
// else{
//     $status == TRUE;
// }
