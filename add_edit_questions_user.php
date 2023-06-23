<?php
session_start();
include "header.php";
include "connection.php";
?>
   <div class="row">
        <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
        
        <table>
                        <thead>
                            <tr>
                                <th scope="cool">#</th>
                                <th scope="cool">Quiz Name</th>
                                <th scope="cool">Username</th>
                                <th scope="cool">Select</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $count=0;
                                $res=mysqli_query($link,"select * from quiz_name where username='$_SESSION[username]'");
                                while($row=mysqli_fetch_array($res)){
                                    $count=$count+1;
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $count; ?></th>
                                        <td><?php echo $row["name"]; ?></td>
                                        <td><?php echo $row["username"]; ?></td>
                                        <td><a href="add_edit_questions.php?id=<?php echo $row["id"]; ?>">Select</a></td>
                                        
                                    </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
    </div>
  </div>
    
    <?php
include "footer.php";
?>
