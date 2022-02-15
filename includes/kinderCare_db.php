<?php

 $server = "localhost";
 $user = "root";
 $password = "";

 $conn = mysqli_connect($server, $user, $password);

 $sql = "CREATE DATABASE kinderCare_sys";

//  if(mysqli_query($conn, $sql)) {
//      die('database successful');
//  } else {
//     die('error'. mysqli_error($conn));

//  }

//select database to be used
 mysqli_select_db($conn, 'kinderCare_sys');

//  create teacher table
 $table = "CREATE TABLE teacher (
 teacherUsername VARCHAR(10) NOT NULL PRIMARY KEY,
 teacherPasscode VARCHAR(15) NOT NULL,
 teacherName VARCHAR(40) NOT NULL,
 teacherEmail VARCHAR(30) NOT NULL
 )";

// if(mysqli_query($conn, $table)) {
//     die('teacher successful');
// } else {
//    die('error'. mysqli_error($conn));

// }


//insert teachers into the database
$sql_command = "INSERT INTO teacher(teacherUsername, teacherPasscode, teacherName, teacherEmail ) 
VALUES('Raymond','1234','NSUBUGA RAYMOND','raymond@gmail.com');";
$sql_command .= "INSERT INTO teacher(teacherUsername, teacherPasscode, teacherName, teacherEmail ) 
VALUES('Benja','2468','JJUMBA ERIC BENJA','jjumba@gmail.com');";
$sql_command .= "INSERT INTO teacher(teacherUsername, teacherPasscode, teacherName, teacherEmail ) 
VALUES('Esther','1357','NABWIRE ESTHER','esther@gmail.com');";
$sql_command .= "INSERT INTO teacher(teacherUsername, teacherPasscode, teacherName, teacherEmail ) 
VALUES('DeGuzman','1234','DeGUZMAN ERNESTO','zziwa@gmail.com')";
// if(mysqli_multi_query($conn, $sql_command)) {
//     echo " successful";
// }else {
//     echo "error".mysqli_error($conn);
// }

//create pupil table
$pupil = "CREATE TABLE pupil(
Usercode INT NOT NULL PRIMARY KEY,
firstname VARCHAR(20) NOT NULL,
lastname VARCHAR(20) NOT NULL,
phonenumber VARCHAR(10) NOT NULL,
activeInactive VARCHAR(20) NOT NULL DEFAULT 'Active', 
teacherUsername VARCHAR(10) NOT NULL,
FOREIGN KEY (teacherUsername) REFERENCES teacher(teacherUsername)
)";

// if(mysqli_query($conn, $pupil)) {
//     echo "pupil successful";
// }else {
//     echo "error".mysqli_error($conn);
// }

//create assignment table
$assignment = "CREATE TABLE assignment(   
assignmentID INT NOT NULL PRIMARY KEY,
character1 CHAR,
character2 CHAR,
character3 CHAR,
character4 CHAR,
character5 CHAR,
character6 CHAR,
character7 CHAR,
character8 CHAR,
startDate DATE NOT NULL,
endDate DATE NOT NULL,
startTime TIME NOT NULL,
endTime TIME NOT NULL,
teacherUsername VARCHAR(10) NOT NULL,
FOREIGN KEY (teacherUsername) REFERENCES teacher(teacherUsername)
)";

// if(mysqli_query($conn, $assignment)) {
//     echo "assignment successful";
// }else {
//     echo "error".mysqli_error($conn);
//     }


//create marks table 
$marks = "CREATE TABLE mark (
Usercode INT NOT NULL,
teacherUsername VARCHAR(10) NOT NULL,
assignmentID INT NOT NULL,
ATTEMPT VARCHAR(200), 
comment VARCHAR(50) NOT NULL,
average FLOAT,
Duration,
FOREIGN KEY(Usercode) REFERENCES pupil(Usercode),
FOREIGN KEY(teacherUsername) REFERENCES teacher(teacherUsername),
FOREIGN KEY(assignmentID) REFERENCES assignment(assignmentID),
PRIMARY KEY(Usercode,teacherUsername,assignmentID)
)";
// if(mysqli_query($conn,$marks)) {
//     echo'mark successful';
// }else {
//     echo'error'.mysqli_error($conn);
// }

//create activation request table
$activate = "CREATE TABLE request(
requestID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
request VARCHAR(50) NOT NULL,
Usercode INT NOT NULL,
teacherUsername VARCHAR(10) NOT NULL,
FOREIGN KEY(Usercode) REFERENCES pupil(Usercode),
FOREIGN KEY(teacherUsername) REFERENCES teacher(teacherUsername)
)";
// if(mysqli_query($conn,$activate)) {
//     echo'request successful';
// }else {
//     echo'error'.mysqli_error($conn);
// }

