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
    <nav class="list">
        <ul>
            <li>
                <a href="register.php">REGISTER PUPIL</a>
            </li>
            <li>
                <a href="assignment.php">ASSIGNMENTS</a>
            </li>
            <li>
                <a href="reports.php">REPORTS & RESULTS</a>
            </li>
            <li style="float:right">
            <form action="includes/logout.inc.php" method="post">
            <input type="submit" name="logout" value="LOGOUT">
            </form>
        
            </li>
        </ul>
    </nav>
</header>
</html>