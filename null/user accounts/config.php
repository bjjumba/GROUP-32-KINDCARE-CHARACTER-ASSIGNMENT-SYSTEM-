<?php
try {
    $user="root";
    $password="";
    $db_name="Useraccounts";
    $host = "localhost";
/// database connection
	$db = new PDO("mysql:host=$host;dbname=$db_name;charset=UTF8", $user, $password);
    // var_dump($pdo);
	if ($db) {
		// echo "Connected to the $db_name database successfully!";
	}
} catch (PDOException $e) {
	echo $e->getMessage();
}
?>