<?php
// if(isset($_POST['signup'])) {
    
//     require "kinderCare_db.php";

//     $username = $_POST['uname'];
//     $name = $_POST['fullname'];
//     $email = $_POST['mail'];
//     $passcode = $_POST['pcd'];
//     $passcodeRepeat = $_POST['pcd-repeat'];

//     if(empty($name) || empty($username) || empty($email) || empty($passcode) || empty($passcodeRepeat)) {
//         header("Location: ../signup.php?error=emptyfields&uname=".$username."&mail=".$email);
//         exit();
//     }
//     else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username) ) {
//         header("Loation: ../signup.php?errorinvalidmailuid");
//         exit();
//     }
//     else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//         header("Location: ../signup.php?error=invalidmail=".$username);
//         exit();
//     }
//     else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
//         header("Location: ../signup.php?error=invaliduname=".$email);
//         exit();
//     }
//     else if($passcode !== $passcodeRepeat) {
//         header("Location: ../signup.php?error=passcodecheck&uname=".$username."&mail=".$email);
//         exit();
//     }
//     else {
//         $sql = "SELECT teacherUsername from teacher WHERE teacherUsername = ?";
//         $stmt = mysqli_stmt_init($conn);
//         if(!mysqli_stmt_prepare($stmt, $sql)) {
//             header("Location: ../signup.php?error=sqlerror");
//             exit();
//         }
//         else {
//             mysqli_stmt_bind_param($stmt, "s", $username);
//             mysqli_stmt_execute($stmt);
//             mysqli_stmt_store_result($stmt);
//             $resultCheck = mysqli_stmt_num_rows($stmt);
//             if($resultCheck > 0) {
//                 header("Location: ../signup.php?error=usertaken&mail=".$email);
//                 exit();
//             }
//             else {
//                 $sql = "INSERT INTO teacher(teacherPasscode, teacherName, teacherEmail, teacherUsername) VALUES(?,?,?,?)";
//                 $stmt = mysqli_stmt_init($conn);
//                 if(!mysqli_stmt_prepare($stmt, $sql)) {
//                     header("Location: ../signup.php?error=sqlerror");
//                     exit();
//                 }
//                 else {
//                     $hashedPcd = password_hash($passcode, PASSWORD_DEFAULT);
//                     mysqli_stmt_bind_param($stmt, "isss", $passcode, $name, $email,$username);
//                     mysqli_stmt_execute($stmt);
//                     header("Location: ../teacherLogin.php");
//                     exit();
//                 }
           
//             }
//         }
//     }
//     mysqli_stmt_close($stmt);
//     mysqli_close($conn);
// }
// else {
//     header("Location: ../signup.php");
//     exit();
}