<?php
session_start();
include "connection.php";
include "header.php";
?>
   <div class="row">
        <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
        <form action="" name="form1" method="post">
            <div class="quiz_name">
                    <h4>Add Quiz</h4>
            
                    <hr>
                    <p>New Quiz</p>
                    <input type="text" name="name" placeholder="Quiz Name">
                    <button type="submit" name="submit">Add Quiz</button>
                    
            

            <div class="my_quiz">
                    <h4>My Quiz</h4>            
                    <hr>
                    <table>
                        <thead>
                            <tr>
                                <th scope="cool">#</th>
                                <th scope="cool">Quiz Name</th>
                                <th scope="cool">Edit</th>
                                <th scope="cool">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $count=0;
                                $res=mysqli_query($link,"select * from quiz_name");
                                while($row=mysqli_fetch_array($res)){
                                    $count=$count+1;
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $count; ?></th>
                                        <td><?php echo $row["name"]; ?></td>
                                        <td><a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
                                        <td><a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
                                    </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                     </form>
                    </div>
                </div>
        </div>
   </div>

   <?php
    if(isset($_POST["submit"])){
        mysqli_query($link,"insert into quiz_name values(NULL,'$_POST[name]')") or die(mysqli_error($link));
    
   ?>
    <script>
        alert("quiz added succesfully");
        window.location.href=window.location.href;
    </script>
    <?php
    }
    ?>
    <?php
include "footer.php";
?>