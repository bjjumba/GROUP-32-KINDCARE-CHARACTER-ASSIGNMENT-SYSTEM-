<?php
session_start();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KinderCare</title>
    <link rel="stylesheet" href="kinder.css">
</head>
<body class="tr-login">
    <div class="main-login">
    <h1 id="tr">Teacher Login</h1><br>
        <form action="includes/login.php" method="POST">
            Username/E-mail:<br>
            <div class="inputfeild">
            <input type="text" name="mailuname" placeholder="Username/E-mail"><br><br>
            </div>
            Passcode:<br>
            <div class="inputfeild">
            <input type="password" name="pcd" placeholder="Passcode"><br><br>
            </div>
            <button type="submit" name="login">Login</button><br><br>
            <!-- Don't have an account!<a href="signup.php">Signup</a> -->
        </form>
    </div>
   
</body>
</html>

<?php
require "footer.php";
?>