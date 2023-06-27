<?php
session_start();
include "connection.php";
include "header.php";
?>

<div class="row">
        <div class="col-lg-6 col-lg-push-3 " style="min-height: 500px;">
        <h1>Log in</h1>
        <p>No account? <a href="register.php">Register here!</a></p>
        
        <form action="" name="form1" method="post">
            <input type="text" name="username" placeholder="Username">        
            <input type="password" name="password" placeholder="Password">
            <button type="submit" name="submit">LOGIN</button>
                <div class="alert alert-danger" id="failure" style="text-align: center; display:none;">
                <strong>Does not match</strong> Invalid username or password.
                </div>
        </form>
    </div>
    </div>

    <?php
        if(isset($_POST["submit"]))
        {
            $count=0;
            $res=mysqli_query($link,"select * from registration where username='$_POST[username]' && password='$_POST[password]'");
            $count=mysqli_num_rows($res);

            if($count==0){
                ?>
                <script type="text/javascript">
                    
                    document.getElementById("failure").style.display="block";
                </script>
                    <?php

            } else {

                $_SESSION["username"]=$_POST["username"];
                ?>
                <script type="text/javascript">
                   window.location="login_user.php";
                </script>
                    <?php

            }
        }

    ?>
    
<?php
include "footer.php";
?>