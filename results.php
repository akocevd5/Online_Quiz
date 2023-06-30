<?php
session_start();
include "header.php";
include "connection.php";
?>
   <div class="row">
        <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; ">
            <center>
            <h1>Quiz Results</h1>
            </center>
            <?php
                $res = mysqli_query($link, "SELECT DISTINCT quiz_name FROM quiz_results");
                $count = mysqli_num_rows($res);
                
                if ($count > 0) {
                    while ($row = mysqli_fetch_array($res)) {
                        $quizName = $row["quiz_name"];
                        $quizRes = mysqli_query($link, "SELECT * FROM quiz_results WHERE quiz_name='$quizName' ORDER BY correct_answer DESC");
                
                        echo "<h2>Quiz Name: $quizName</h2>";
                        echo "<table class='table table-bordered'>";                        
                        echo "<tr>";
                        echo "<th>Username</th>"; 
                        echo "<th>Total Questions</th>";
                        echo "<th>Correct Answers</th>";
                        echo "<th>Wrong Answers</th>";                   
                        echo "</tr>";
                
                        while ($resultRow = mysqli_fetch_array($quizRes)) {
                            echo "<tr>";
                            echo "<td>" . $resultRow["username"] . "</td>"; 
                            echo "<td>" . $resultRow["total_question"] . "</td>";
                            echo "<td>" . $resultRow["correct_answer"] . "</td>";
                            echo "<td>" . $resultRow["wrong_answer"] . "</td>";                   
                            echo "</tr>";
                        }
                
                        echo "</table>";
                    }
                }
                
                else {
                    ?>
                    <center>
                    <h1>No Results Found</h1>
                    </center>
                    <?php
                }
            ?>
    </div>
  </div>
    
    <?php
include "footer.php";
?>
