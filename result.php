<?php
session_start();
include "connection.php";
include "header.php";
?>
   <div class="row">
        <div class="col-lg-6 col-lg-push-3" style="min-height: 500px;">
            
        <?php
            $correct=0;
            $wrong=0; 

            if(isset($_SESSION["answer"])){

                    for($i=1; $i<=sizeof($_SESSION["answer"]); $i++){
                        $answer="";
                        $res=mysqli_query($link,"select * from questions where quiz_name='$_SESSION[quiz_name]' && question_no=$i");
                        while($row=mysqli_fetch_array($res))
                        {
                            $answer=$row["answer"];
                        }

                        if(isset($_SESSION["answer"][$i]))
                        {
                            if($answer==$_SESSION["answer"][$i])
                            {
                                $correct=$correct+1;
                            }
                            else {
                                $wrong=$wrong+1;
                            }
                        }
                        else {
                            $wrong=$wrong+1;
                        }
                    }
            }
            $count=0;
            $res=mysqli_query($link,"select * from questions where quiz_name='$_SESSION[quiz_name]'");
            $count=mysqli_num_rows($res);
            $wrong=$count-$correct;
            echo "<br>"; echo "<br>";
            echo "<center>";
            echo "Total questions=".$count;
            echo "<br>";
            echo "Correct Answer= ".$correct;
            echo "<br>";
            echo "Wrong Answer= ".$wrong;
            echo "</center>";

        ?>
    </div>
  </div>
  <?php
        if (isset($_SESSION["username"])) {
            mysqli_query($link,"insert into quiz_results(id,username,quiz_name,total_question,correct_answer,wrong_answer) values (NULL,'$_SESSION[username]','$_SESSION[quiz_name]','$count','$correct','$wrong')") or die(mysqli_error($link));
        }
        else
        {
            mysqli_query($link,"insert into quiz_results(id,username,quiz_name,total_question,correct_answer,wrong_answer) values (NULL,' ','$_SESSION[quiz_name]','$count','$correct','$wrong')") or die(mysqli_error($link));
        }
        
    
    ?>
    <script type="text/javascript">
    indow.location.href=window.location.href;
    </script>
    
    
    <?php
include "footer.php";
?>
