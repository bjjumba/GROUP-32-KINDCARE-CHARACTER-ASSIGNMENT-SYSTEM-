<?php
require "header.php";
require_once('data.php');
?>
<style>
  body{
    height: 200vh;
  }
</style>
<main>
<div class="container1">
    <div class="row border border-success p-3">
        <div class="col-md-6 border border-success">
            <h2 class='text-center'>Results</h2>
          <!--form-->
           <form action="form.php" method="POST">
               <div class="form-group mb-3">
               <label for="Name"><b>Usercode</b></label>
               <div class="inputfeild">
               <input type="text" class="form-control"name="Usercode"required>
               </div>
               </div>
               <div class="form-group mb-3">
               <label for="Name"><b>Assignment-ID</b></label>
               <div class="inputfeild">
               <input type="text" class="form-control"name="assignmentID"required>
               </div>
               </div>
               <div class="form-group mb-3">
               <label for="Name"><b>Comment</b></label>
               <div class="inputfeild">
               <input type="text" class="form-control"name="comment"required>
                </div>
               </div>
               <div class="s_bttn">
               <input class="btn btn-primary" type="submit" name="submit" value="submit">
              </div>
           </form>

          
        </div>
        <div class="col-md-6 border border-success">
        <?php include("Reports.php");?>
        </div>
    </div>
  </div>
 <div class='row'>
   

<?php
      if(isset($_POST["submit"])){
          $Usercode =$_POST['Usercode'];
          $assignmentID =$_POST['assignmentID'];
          $comment=$_POST['comment'];
         $sql = "UPDATE mark SET comment= '$comment' WHERE Usercode= '$Usercode' AND assignmentID= '$assignmentID';";
         
          $query=mysqli_query($conn,$sql);
          var_dump($query);
         /* $stmtinsert= $db->prepare($sql);
          $result= $stmtinsert->execute([$Name, $Mark, $Comment]);*/
        //  var_dump($result);
          if($query){
            echo 'saved.';
          }else{
            echo'There were errors while saving the data.';
          echo $Usercode. " ". $assignmentID. " ". $comment;
      }
    }else{
      echo "mine ";
    }
 ?>
</main>
<?php
require "footer.php";
?>