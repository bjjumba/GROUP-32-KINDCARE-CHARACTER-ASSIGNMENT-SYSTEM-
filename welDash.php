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
<body>
    <?php
    if(isset($_SESSION['userUid'])) {
        echo'<h2> WELCOME '.$_SESSION['userUid'].'</h2>';
    }
    ?>
    <img src="img/kindercare_logo.jpg" alt="welcomeImage" width="100%" height="100%" position="fixed">
</body>
</html>

<?php
require "footer.php";
?>