<?php
require_once('data.php');
?>
<?php
      if(isset($_POST["submit"])){
          $Usercode =$_POST['Usercode'];
          $assignmentID =$_POST['assignmentID'];
          $comment=$_POST['comment'];
         $sql = "UPDATE mark SET comment= '$comment' WHERE Usercode= '$Usercode' AND assignmentID= '$assignmentID';";
         
          $query=mysqli_query($conn,$sql);
          var_dump($query);
          if($query){
            header("Location:reports.php");
            //echo 'saved.';
          }else{
            echo'There were errors while saving the data.';
          echo $Usercode. " ". $assignmentID. " ". $comment;
      }
    }else{
      echo "mine ";
    }
 ?>