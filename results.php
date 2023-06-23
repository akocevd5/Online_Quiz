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
                $res=mysqli_query($link,"select * from quiz_results order by id desc");
                $count=mysqli_num_rows($res);

                if($count==0){
                    ?>
                    <center>
            <h1>No Results Found</h1>
            </center>
            <?php
                }
                else {
                    echo "<table class='table table-bordered'>";
                    echo "<tr>";
                    echo "<th>"; echo "username"; echo "</th>"; 
                    echo "<th>"; echo "quiz name"; echo "</th>";
                    echo "<th>"; echo "total quiestions"; echo "</th>";
                    echo "<th>"; echo "correct answers"; echo "</th>";
                    echo "<th>"; echo "wrong answers"; echo "</th>";                   
                    echo "</tr>";

                        while($row=mysqli_fetch_array($res)){
                            echo "<tr>";
                            echo "<td>"; echo $row["username"]; echo "</td>"; 
                            echo "<td>"; echo $row["quiz_name"]; echo "</td>";
                            echo "<td>"; echo $row["total_question"]; echo "</td>";
                            echo "<td>"; echo $row["correct_answer"]; echo "</td>";
                            echo "<td>"; echo $row["wrong_answer"]; echo "</td>";                   
                            echo "</tr>";
                        }
                    echo "</table>";
                }
            ?>
    </div>
  </div>
    
    <?php
include "footer.php";
?>
