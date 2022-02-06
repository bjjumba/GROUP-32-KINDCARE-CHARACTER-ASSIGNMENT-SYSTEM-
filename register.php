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
$result = mysqli_query($conn, $query);

?>

<main>    
        <div id="reg">
        <div class="container">
            <h3>Registration</h3>
            <form action="includes/register.inc.php" method="POST">
                FirstName:<br>
                <div class="inputfeild">
                <input type="text" name="fName"><br>
                </div>
                LastName:<br>
                <div class="inputfeild">
                <input type="text" name="lName"><br>
                </div>
                Phone Number:<br>
                <div class="inputfeild">
                <input type="text" name="phone"><br>
                </div>
                Assign usercode:<br>
                <div class="inputfeild">
                <input type="password" name="code"><br><br>
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
                <form action="includes/status.inc.php" method="POST">
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
                
                    </td>
                </tr>
                <?php endwhile;?>
                </form>
            </table>
        </div>
    </div>
    <div class="activation">
        <h4>Activation Requests</h4>
        <?php
        ?>
    </div>
    <script>
    
        window.addEventListener("click",change,false)
        function change() {
             document.getElementById('btn').style.backgroundColor='red';
           // button = 'Red';
        }
        window.addEventListener("click",start,false)
        function start() {
             document.getElementById('btn2').style.backgroundColor = 'green';    
        }
    </script>
</main>

<?php
require "footer.php";
?>

