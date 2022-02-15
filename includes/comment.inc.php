<?php 

if(isset($_POST['submit-comment'])) {
    $comment = $_POST['comment'];
    $usercode = $_POST['Usercode'];
    $assID = $_POST['assignID'];

    require'kinderCare_db.php';

    $query = "UPDATE mark SET comment = ? WHERE Usercode LIKE ? AND assignmentID LIKE ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $query)){
        header("Location: ../report.php?error=CommentFailed");
        exit();
    }
    else {
        mysqli_stmt_bind_param($stmt, "sii",$comment, $usercode,$assID);
        mysqli_stmt_execute($stmt);
        header("Location: ../report.php?CommentSuccess");
        exit();
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}else{
    header("Location: ../report.php?error=nouser");
    exit();
}