<?php
session_start();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kindercare_header</title>
    <link rel="stylesheet" href="kinder.css">
</head>
<header>
    <img class="logo" src="logo.png" alt="logo">
    <nav>
        <h4>
            <a href="register.php">Register Pupil</a>
        </h4>
        <h4>
            <a href="assignment.php">Assignments</a>
        </h4>
        <h4>
            <a href="reports.php">Reports & Results</a>
        </h4>
       <!-- <div class="animation start-register"></div> -->
    </nav>
    <form action="includes/logout.inc.php" method="post">
    <div class="f_bttn">
    <input type="submit" name="logout" value="LOGOUT">
    </div>
    </form>

</header>
</html>