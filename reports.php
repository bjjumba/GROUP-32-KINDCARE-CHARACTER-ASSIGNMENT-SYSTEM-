<?php
require "header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reports</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <style>
    .f_bttn input{
    border: 5px solid #5b5469;
    background-color: black;
    width: 150px;
    color: rgb(139, 131, 255);
    outline: none;
    border-radius: 25px;
    padding: 5px;
    font: 400 15px Ubuntu,Arial;
    cursor: pointer;
    margin-top: 10px;
    transition: all 0.3s ease 0s;
}
.f_bttn input:hover{
    color: rgb(255, 255, 255);
    background-color: #3b0000;
}
header{
    display: flex;
    background: linear-gradient(to right, #00a149 0%, #008697 100%);
    margin: 0;
    border-radius: 5px;
    box-shadow: 0 2px 3px 0 rgba(0, 0, 0, .1);
    justify-content: space-between;
    align-items: center;
    padding: 0px 1%;
}
nav{
    padding: 0;
}
.logo{
    cursor: pointer;
    border: 2px solid rgba(0, 0, 0, 0);
    border-radius: 35px;
    height: 50px;
    width: 50px;
}
nav h4{
    display: inline;
    padding: 0px 25px;
    border-radius: 7px;
}
nav h4 a{
    transition: all 0.3s ease 0s;
    text-decoration: none;
    color: #ffff;
    margin:0px;
    font: 400 17px Ubuntu,Arial;
}
nav h4 a:hover {
    color: #1a0836;
}
    footer{
    align-items:center;
    justify-content: center;
    background-color: #02abb8;
    color: white;
    padding: 5px;
    position: fixed;
    bottom: 0;
    border: none;
    border-radius: 15px;
    width: 98%;
    display:flex;
    flex-direction:row;
    font-size: 13px;
}
  </style>
	
</head>

<body class="hold-transition login-page">
     <div class="container mt-4">
        <div class="row ">
         <div class="col-md-6 border border-success border-1 ">
         <h3 class="text-center m-2">Comment Student Marks</h3>
         <form action="form.php" method="POST">
               <div class="form-group mb-3">
               <label for="Name"><b>Usercode</b></label>
               <input type="text" class="form-control" placeholder="Enter student usercode " name="Usercode"required>
               </div>
               <div class="form-group mb-3">
               <label for="Name"><b>Assignment-ID</b></label>
               <input type="text" class="form-control" placeholder="Enter assignment id " name="assignmentID"required>
               </div>
               <div class="form-group mb-3">
               <label for="Name"><b>Comment</b></label>
               <input type="text" class="form-control" placeholder="Enter comment " name="comment"required>
               </div>
               <input class="btn btn-primary" type="submit" name="submit" value="submit">
           </form>
         </div>
         <div class="col-md-6 border border-success border-1 ">
            <form action="fetchstudent.php" method="POST">
                 <h3 class="text-center m-2">Reports</h3>
            <div class="form-group mb-3 ">
                    <label for="">Assigment Id </label>
                    <input type="text" name="assignmentID" class="form-control" placeholder="Enter assignment id " required/>
                </div>
                <div class="form-group mb-3 ">
                    <label for="">Usercode</label>
                    <input type="text" name="Usercode" class="form-control" placeholder="Enter student usercode " required/>
                </div>
                <div class="form-group mb-3 ">
                  <button type="submit" class="btn btn-primary btn-block m-2">submit</button>
                </div>
                    
            </form>
                <!--details-->
             <?php 
               $student_usercode = isset($_SESSION['Usercode'])?$_SESSION['Usercode']:null;
               $student_average = isset($_SESSION['average'])?$_SESSION['average']:null;
               $student_comment = isset($_SESSION['comment'])?$_SESSION['comment']:null;
             ?>
          <div class="form-group mb-3 ">
                <label for="">Usercode</label>
                <input type="text" name="Usercode" class="form-control" disabled value="<?=$student_usercode?>"
                placeholder="Usercode" />
            </div>
              <div class="form-group mb-3 ">
                <label for="">Average </label>
                <input type="text" name="average" class="form-control" 
                placeholder="student marks " disabled value="<?=$student_average?>" />
              </div>
              <div class="form-group mb-3 ">
                <label for="">Comment</label>
                <input type="text" name="comment"  disabled value="<?=$student_comment?>"
                 class="form-control" placeholder="Comment " />
            </div>

          <!--details-->
         </div>
        <div> 
            <!--chart-->
            <div class="row">
                <div class="col-md-10 m-2">
                    <?php include("chart.html");?>
                </div>
            </div>
            
            <!--chart-->
     </div>
</br>
</br>
</br>
</br>
</body>
<?php
require "footer.php";
?>
</html>

