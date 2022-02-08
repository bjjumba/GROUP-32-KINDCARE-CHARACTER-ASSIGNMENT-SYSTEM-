<?php
require "header.php";

?>
<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "kinderCare_sys";

$conn = mysqli_connect($hostname, $username, $password, $dbname);
$query = "SELECT Usercode, firstname, lastname,phonenumber,activeInactive FROM pupil";
$r_query = "SELECT Usercode, request FROM request";
$result = mysqli_query($conn, $query);
$rq_query = mysqli_query($conn, $r_query);

?>

<main>    
        <div id="reg">
        <div class="container">
            <h3>Registration</h3>
            <form action="includes/register.inc.php" method="POST">
                FirstName:<br>
                <div class="inputfeild">
                <input type="text" name="fName" required><br>
                </div>
                LastName:<br>
                <div class="inputfeild">
                <input type="text" name="lName" required><br>
                </div>
                Phone Number:<br>
                <div class="inputfeild">
                <input type="text" name="phone" required><br>
                </div>
                Assign usercode:<br>
                <div class="inputfeild">
                <input type="password" name="code" required><br><br>
                </div>
                <?php
                echo'<input name="username" hidden value='.$_SESSION['userUid'].'>';
                ?>
                </br>
                <button type="submit" name="reg" class="button">Register</button>
            </form>
        </div>
        <div class="register">
        <table>
                
                <tr style="text-display:bold";>
                    <th>Usercode</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>phonenumber</th>
                    <th>Change Status</th>
                </tr>
                <?php while($row = mysqli_fetch_array($result)):;?>
                
                <tr>
                    <td><?php echo $row["Usercode"];?></td>
                    <td><?php echo $row["lastname"]," ",$row["firstname"];?></td>
                    <td><?php echo $row["activeInactive"];?></td>
                    <td><?php echo $row["phonenumber"];?></td>
                    <td>  
                    <form action="includes/status.inc.php" method="POST">  
                        <?php
                                
                                echo'<input type= "hidden" name="code" value="'.$row['Usercode'].'">';
                                echo'<input type="hidden" name="status" value="'.$row['activeInactive'].'">';
                            
                        if($row['activeInactive']=="Active") {
                            echo '<button name="statusChange" class="d_activate">Deactivate</button>';
                        }
                        else if($row['activeInactive']=="Inactive") {
                            echo '<button name="statusChange" class="activate">Activate</button>';
                        }
                        ?>   
                         </form>
                    </td>
                   
                </tr>
                <?php endwhile;?>
                
            </table>
        </div>
    </div>
    <div>
        <h4>Activation Requests</h4>
        
        
        <table>
        <tr>
        <th>Request</th>
        <th>Remove </th>
        </tr>
        <?php 
            while($row=mysqli_fetch_array($rq_query)):; ?>
                <tr>
                <td><?php echo $row['Usercode']," ",$row['request'];?></td>
                <td>
                <form action="includes/deleteRequest.inc.php" method="POST">
                <?php
                echo'<input type="hidden" name="usercode" value="'.$row['Usercode'].'">';
                echo'<button name="delete-request" class="d_activate">Delete</button>';
                ?>
                </form>
                </td>
                </tr>
                <?php endwhile; ?>
        </table>
        
    </div>
                    </br>
                    </br>
                    </br>
                    </br>
                    
    <script>
    
        // window.addEventListener("click",change,false)
        // function change() {
        //      document.getElementById('btn').style.backgroundColor='red';
        //    // button = 'Red';
        // }
        // window.addEventListener("click",start,false)
        // function start() {
        //      document.getElementById('btn2').style.backgroundColor = 'green';    
        // }
    </script>
</main>

<?php
require "footer.php";
?>

