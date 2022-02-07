
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
    <div class="summ">
        <?php
        require 'includes/kinderCare_db.php';

        // $conn = mysqli_connect("localhost","root","","kinderCare_sys");

        $pupils = "SELECT * FROM pupil";
        $open = "SELECT * FROM assignment";
        $closed = "SELECT * FROM mark";
        $request = "SELECT * FROM request";
        echo'<div class="summary">';
        if($result=mysqli_query($conn, $pupils)){
            $rowcount = mysqli_num_rows($result);
            printf("<h3>REGISTERED STUDENTS</h3></br>");
            printf(" <div class=No>%d</div>", $rowcount);
            mysqli_free_result($result);
        }
        echo'</div>';
        echo'<div class="summary">';
        if($assign=mysqli_query($conn,$open)) {
            $rowcount= mysqli_num_rows($assign);
            printf("<h3>OPEN ASSIGNMENTS</h3></br>");
            printf(" <div class=No>%d</div>", $rowcount);
            mysqli_free_result($assign);
        }
        echo'</div>';
        echo'<div class="summary">';
        if($done=mysqli_query($conn,$closed)) {
            $rowcount = mysqli_num_rows($done);
            printf("<h3>CLOSED ASSIGNMENTS</h3></br>");
            printf(" <div class=No>%d</div>", $rowcount);
            mysqli_free_result($done);
        }
        echo'</div>';
        echo'<div class="summary">';
        if($act=mysqli_query($conn,$request)) {
            $rowcount = mysqli_num_rows($act);
            printf("<h3>NUMBER OF ACTIVATION REQUESTS</h3></br>");
            printf(" <div class=No>%d</div>", $rowcount);
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