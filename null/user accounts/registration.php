<?php
Require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
      <title>User Registration|PHP</title>
<link rel="stylesheet"type="text/css"href="css/bootstrap.min.css">
<body >
 
 <div>
       <form action= "registration.php" method="POST">

         <div class="container">
             <div class="col-sm-3">  
             <h1>Registration</h1>
             <p>Fill up the form with the correct values.</p>
             <hr class="mb-3"
             <label for="Firstname"><b>Firstname</b></label>
             <input type="text" class="form-control"name="Firstname"required>

             <label for="Lastname"><b>Lastname</b></label>
             <input type="text" class="form-control"name="Lastname"required>

             <label for="usercode"><b>Usercode</b></label>
             <input type="text" class="form-control"name="Usercode"required>

             <label for="Phone number"><b>Phone number</b></label>
             <input type="text" class="form-control"name="Phone_number"required>

             <label for="Passcode"><b>Passcode</b></label>
             <input type="password" class="form-control"name="Passcode"required> <br>
             <input class="btn btn-primary" type="submit" name="submit" value="Sign Up">

         </div>
       </div>
      </div>
       </form>
</div>    

<?php
      if(isset($_POST["submit"])){
          
          $Firstname =$_POST['Firstname'];
          $Lastname =$_POST['Lastname'];
          $Usercode   =$_POST['Usercode'];
          $Phonenumber =$_POST['Phone_number'];
          $Passcode=$_POST['Passcode'];
          $sql="INSERT INTO users(Firstname,Lastname,Usercode,Phone_number,Passcode) VALUES(?,?,?,?,?)";
       
          $stmtinsert= $db->prepare($sql);
          $result= $stmtinsert->execute([$Firstname, $Lastname, $Usercode, $Phonenumber, $Passcode]);
         var_dump($result);
          if($result){
            echo 'successfully saved.';
          }
          else{
            echo'There were errors while saving the data.';
          echo $Firstname. " ". $Lastname. " ". $Usercode. " ". $Phonenumber. " ". $Passcode;
      }
    }else{
      echo "Oops ";
    }
 ?>

</body>
</html>       