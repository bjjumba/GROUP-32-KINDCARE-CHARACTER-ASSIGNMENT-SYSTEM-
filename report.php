<?php
require "header.php";
?>

<style>
    .chart {
        width:400px;

    }
    body{
        height: 130vh;
    }
</style>
<main>
    <div>
        <div>
                <h1>Assignment Result</h1>
                <form action="report.php" method="POST">
                    Enter assignmentID:</br>
                    <div class="inputfield">
                    <input type="text" name="ass">
                    <input type="submit" value="SUBMIT" name="retrieve">
                    </div>
                </form>
                <?php

                    if(isset($_POST['retrieve'])){
                        $id = $_POST['ass'];


                        $hostname = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "kinderCare_sys";

                        $conn = mysqli_connect($hostname, $username, $password, $dbname);

                        $query = "SELECT Usercode,average,assignmentID,Duration FROM mark WHERE assignmentID LIKE $id ";
                        $result = mysqli_query($conn, $query);   
                    
                echo '<table>';
                    echo'<tr>';
                        echo'<th>Usercode</th>';
                        echo'<th>Average Score</th>';
                        echo'<th>Duration</th>';
                        echo'<th>Comment</th>';
                        echo'<th>Submit</th>';
                    echo'</tr>';
                      while($row=mysqli_fetch_array($result)){
                        
                        $code = $row['Usercode'];
                        $average = $row['average'];
                        $duration = $row['Duration'];
                        
                    
                    echo'<tr>';
                        echo'<td>'; echo $code;
                        echo'</td>';
                        echo'<td>';echo $average;
                        echo'</td>';
                        echo'<td>';echo $duration;
                        echo'</td>';

                        echo'<form action="report.php" method="POST">';
                        echo'<td>';
                            echo'<div class="inputfield"><input type="text" name="comment" placeholder="Teacher Comment"></div>'; 
                            echo'<input type="hidden" name="Usercode" value='.$row['Usercode'].'>';
                            echo'<input type="hidden" name="assignID" value='.$row['assignmentID'].'>';  
                        echo'</td>'; 
                        echo'<td>';
                        echo'<div class="inputfield"><input type="submit" name="submit-comment" value="Add Comment"></div></td>'; 
                        echo'</form>';
                    echo'</tr>';  
                    }     
                echo'</table>'; 
                } else {
                    echo'<table>';
                    echo'<tr>';
                        echo'<th>';
                        echo'Usercode';
                        echo'</th>';
                        echo'<th>Average Score</th>';
                        echo'<th>Duration</th>';
                        echo'<th>Comment</th>';
                        echo'<th>Submit</th>';
                    echo'</tr>';
                    echo'</table>';

                    if(isset($_POST['submit-comment'])) {
                        $comment = $_POST['comment'];
                        $usercode = $_POST['Usercode'];
                        $assID = $_POST['assignID'];
            
                        require'includes/kinderCare_db.php';
            
                        $query = "UPDATE mark SET comment = ? WHERE Usercode LIKE ? AND assignmentID LIKE ?;";
                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt, $query)){
                            header("Location: ../report.php?error=CommentFailed");
                            exit();
                        }
                        else {
                            mysqli_stmt_bind_param($stmt, "sii",$comment, $usercode,$assID);
                            mysqli_stmt_execute($stmt);
                            // header("Location: ../report.php?CommentSuccess");
                            // exit();
                        }
                        mysqli_stmt_close($stmt);
                        mysqli_close($conn);
                    }else{
                        // header("Location: ../report.php?error=nouser");
                        // exit();
                    }
                }
                ?>   
        </div>
        <br>
        <div>
            <h3>Report on pupilPerformance/assignment</h3>
            <form action="report.php" method="POST">
            Enter AssignmentID:</br>
            <div class="inputfield">
            <input type="text" name="id">
            <input type="submit" name="assignment-report" value="VIEW REPORT">
            </div>
            </form>
            <?php
            if(isset($_POST['assignment-report'])){
                $assignmentID = $_POST['id'];

                $hostname = "localhost";
                $username = "root";
                $password = "";
                $dbname = "kinderCare_sys";

                $conn = mysqli_connect($hostname, $username, $password, $dbname);

                $ass_query = "SELECT Usercode,assignmentID,average,Duration FROM mark WHERE assignmentID = $assignmentID";
                $aquery = mysqli_query($conn, $ass_query);
                if(mysqli_num_rows($aquery) > 0){
                    while($row = mysqli_fetch_assoc($aquery)){
                        echo '<input type="text" class="average" hidden value='.$row['average'].'>';
                        echo '<input type="text" class="usercode" hidden value='.$row['Usercode'].'>';
                        echo '<input type="text" class="duration" hidden value='.$row['Duration'].'>';
                    }
                    unset($aquery);
                }else {
                    echo"No row found";
                }
            } else {

            }
            ?>
        </div>
    </div>
    <div class="chart">
    <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
    </div>
    
    <script>
        var marks = [];
        const mark = document.getElementsByClassName('average');
        for (let i = 0; i < mark.length; i++) {
            const element = mark[i].value;
            marks.push(element)
        }
        // console.log(mark);
        //var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
        //var yValues = [55, 49, 44, 24, 15];

        var usercodes = [];
        const usercode = document.getElementsByClassName('usercode');
        for (let x = 0; x < usercode.length; x++) {
            const element = usercode[x].value;
            usercodes.push(element)    
        }

        var durations = [];
        const duration = document.getElementsByClassName('duration');
        for (let y = 0; y < duration.length; y++) {
            const element = duration[y].value;
            durations.push(element)
        }
    
    
    var barColors = ["red", "green","blue","orange","brown","yellow","black"];
    var color = "white";

    new Chart("myChart", {
    type: "bar",
    data: {
        labels: usercodes,
        datasets: [{
        backgroundColor: barColors,
        yAxisID: 'A',
        data: marks
        },
        {
        backgroundColor: color,
        yAxisID: 'B',
        data: durations
        }]
    },
    options: {
        plugins: {
                            title: {
                                display: true,
                                text: "Summary about assignment"
                            },
                            legend: {
                                labels: {
                                    filter: (legendItem, data) => (typeof legendItem.text !== 'undefined')
                                }
                            }
                        },
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'Usercodes'
                                }
                            },
                            // y: [
                                // {
                                // title: {
                                //     display: true,
                                //     text: 'Score'
                                // }
    
                                        // {
                                        //     name: 'A',
                                        //     type: 'linear',
                                        //     position: 'left',
                                        //     scalePositionLeft: true
                                        // },
                                        // {
                                        //     name: 'B',
                                        //     type: 'linear',
                                        //     position: 'right',
                                        //     scalePositionLeft: false,
                                            // min: 0,
                                            // max: 1
        // scales: {
            A: {
                type: 'linear',
                position: 'left',
                title:{
                    display: true,
                    text: 'Average'
                }
            },
            B: {
                type: 'linear',
                position: 'right',
                title: {
                    display:true,
                    text: 'duration'
                }
                // ticks: {
                //     max: 1,
                //     min: 0
                // }
            }
                                        }
        
                            }
                        
    //     legend: {display: true},
    // title: {
    //   display: true,
    //   text: "Report per assignment"
    // }
    
});
    </script>
    <div>
    <h3>Report on pupilAssignmentAttempt</h3>
            <form action="report.php" method="POST">
            Enter Usercode:</br>
            <div class="inputfield">
            <input type="text" name="user-code">
            <input type="submit" name="pupil-report" value="VIEW REPORT">
            </div>
            </form>
            <?php
            if(isset($_POST['pupil-report'])) {
                $code = $_POST['user-code'];

                $hostname = "localhost";
                $username = "root";
                $password = "";
                $dbname = "kinderCare_sys";

                $conn = mysqli_connect($hostname, $username, $password, $dbname);

                $rquery = "SELECT * FROM assignment";
                $r_query = mysqli_query($conn,$rquery);
                $pquery = "SELECT assignmentID,Usercode,average FROM mark WHERE Usercode LIKE $code";
                $p_query = mysqli_query($conn, $pquery);

                $num = mysqli_num_rows($p_query);
                $rowcount = mysqli_num_rows($r_query);

                $ptage = ($num/$rowcount) * 100 ;

                echo'<table>';
                echo'<tr>';
                echo'<th>Assignments Attempted</th>';
                echo'<th>SCORE</th>';
                echo'</tr>';
                while ($row=mysqli_fetch_array($p_query)) {
                    $as_id = $row['assignmentID'];
                    $a_score = $row['average'];

                echo'<tr>';
                echo'<td>'; echo $as_id ;
                echo'</td>';
                echo'<td>'; echo $a_score;
                echo'</td>';
                echo '</tr>';
                }
                echo '</table>';

                echo("<p>OVERALL ASSIGNMENT ATTEMPTED(%):</p>");
                echo(round($ptage,1));
                mysqli_free_result($p_query);
                mysqli_free_result($r_query);
            }
            ?>
    </div>
</br>
</br>
</br>
</br>
</main>


<?php
require "footer.php";
?>