<?php
require "header.php";

?>
<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "kinderCare_sys";

$conn = mysqli_connect($hostname, $username, $password, $dbname);
$query = "SELECT Usercode, firstname, lastname FROM pupil";
$result = mysqli_query($conn, $query);

?>

<main>
    <style>
        .container {
            border: 1px solid lightskyblue;
            text-align: left;
            padding-right: 16px;
        }
        #reg {
            display: flex;
            width:100%;
        }
        .register{
            padding:30px;
            border: 1px solid lightskyblue;
            width: 40%;
        }
        th {
            text-align: center;
            padding-left: 10px;
        }    
    </style>
    
        <div id="reg">
        <div class="container">
            <h3>Registration</h3>
            <form action="includes/register.inc.php" method="POST">
                FirstName:<br>
                <input type="text" name="fName"><br>
                LastName:<br>
                <input type="text" name="lName"><br>
                Phone Number:<br>
                <input type="text" name="phone"><br>
                Assign usercode:<br>
                <input type="password" name="code"><br><br>
                <button type="submit" name="reg">Register</button>
            </form>
        </div>
        <div class="register">
            <table>
                <tr style="text-display:bold";>
                    <th>Name of Registered Student</th>
                    <th> Status </th>
                </tr>
                <?php while($row = mysqli_fetch_array($result)):;?>
                <tr>
                    <td><?php echo $row["lastname"]," ",$row["firstname"];?></td>
                    <td><button type="submit">ACTIVATE</button> or <button type="submit">DEACTIVATE</button></td>
                </tr>
                <?php endwhile;?>
            </table>
        </div>
        <div>
            <h4>Activation Requests</h4>
            <?php
            ?>
        </div>
    </div>
    
</main>

<?php
require "footer.php";
?>

