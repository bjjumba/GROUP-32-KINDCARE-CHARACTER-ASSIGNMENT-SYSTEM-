<?php
if(isset($_SESSION['userUid'])) {
    echo'<h2> Welcome '.$_SESSION['userUid'].'</h2></br>';
}



    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "kinderCare_sys";

    $conn = mysqli_connect($server, $user, $pass, $db);
    if($conn){
        // echo "Connected sister";
    }else{
        echo "Cant Connect";
    }
    $query = "SELECT Usercode, assignmentID, comment FROM mark";
    $result = mysqli_query($conn, $query);

   // $Connection=mysql_connect("localhost","root","");
    //$Con=mysql.select.d
?>  