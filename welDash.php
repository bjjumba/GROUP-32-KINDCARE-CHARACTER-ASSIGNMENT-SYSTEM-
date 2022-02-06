
<?php
require 'header.php';


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        background-image: url("img/kindercare_logo.jpg");
    }
</style>
<body>
    <?php
    if(isset($_SESSION['userUid'])) {
        echo'<h2> WELCOME '.$_SESSION['userUid'].'</h2>';
    }
    ?>
    <div>
        <?php
        require 'includes/kinderCare_db.php';

        // $conn = mysqli_connect("localhost","root","","kinderCare_sys");

        $pupils = "SELECT * FROM pupil";
        $open = "SELECT * FROM assignment";
        $closed = "SELECT * FROM mark";
        $request = "SELECT * FROM request";
        echo'<div>';
        if($result=mysqli_query($conn, $pupils)){
            $rowcount = mysqli_num_rows($result);
            printf("REGISTERED STUDENTS");
            printf(" %d", $rowcount);
            mysqli_free_result($result);
        }
        echo'</div>';
        echo'<div>';
        if($assign=mysqli_query($conn,$open)) {
            $rowcount= mysqli_num_rows($assign);
            printf("OPEN ASSIGNMENTS");
            printf(" %d", $rowcount);
            mysqli_free_result($assign);
        }
        echo'</div>';
        echo'<div>';
        if($done=mysqli_query($conn,$closed)) {
            $rowcount = mysqli_num_rows($done);
            printf("CLOSED ASSIGNMENTS");
            printf(" %d", $rowcount);
            mysqli_free_result($done);
        }
        echo'</div>';
        echo'<div>';
        if($act=mysqli_query($conn,$request)) {
            $rowcount = mysqli_num_rows($act);
            printf("NUMBER OF ACTIVATION REQUESTS");
            printf(" %d", $rowcount);
            mysqli_free_result($act);
        }
        echo'</div>';
    echo'</div>';
    ?>
</body>
</html>

<?php
require "footer.php";
?>