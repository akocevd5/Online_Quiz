<?php
include "connection.php";
include "header.php";
?>

<div class="row">
    <div class="col-lg-6 col-lg-push-3 " style="min-height: 500px;">
    <h1>REGISTER</h1>
    <p>Already have an account <a href="login.php">Log in!</a></p>
    <form action="" name="form1" method="post">
        <div class="form">
            <input type="text" name="username" placeholder="Username">        
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="password_confirm" placeholder="Confirm Password">
            <button type="submit" name="submit1">REGISTER</button>
            <div class="alert alert-success" id="success" style="text-align: center; display:none;"  >
            <strong>Success!</strong> Account Registration successfully.
            </div>
            <div class="alert alert-danger" id="failure" style="text-align: center; display:none;">
            <strong>Allready Exist</strong> This account allready exist.
            </div>
            <div class="alert alert-danger" id="pass" style="text-align: center; display:none;"  >
            <strong>Password dismatch!</strong> You should repeat the same password.
            </div>
        </div>
    </form>
    </div>
    </div>
    
    <?php
        if(isset($_POST["submit1"]))
        {
            $count=0;
           $res=mysqli_query($link,"select * from registration where username='$_POST[username]'") or die(mysqli_error($link));
           $count = mysqli_num_rows($res);

           if($count>0)
           {
            ?>
            <script type="text/javascript">
                document.getElementById("success").style.display="none";
                document.getElementById("failure").style.display="block";
                document.getElementById("pass").style.display="none";
            </script>
                <?php
            }
            elseif($_POST["password"]==$_POST["password_confirm"])
            {
                mysqli_query($link,"insert into registration values (NULL,'$_POST[username]','$_POST[password]','$_POST[password_confirm]')") or die(mysqli_error($link));
                ?>
                <script type="text/javascript">
                    document.getElementById("success").style.display="block";
                    document.getElementById("failure").style.display="none";
                    document.getElementById("pass").style.display="none";
                </script>
                    <?php
            }
            else{
                ?>
                <script type="text/javascript">
                    document.getElementById("success").style.display="none";
                    document.getElementById("failure").style.display="none";
                    document.getElementById("pass").style.display="block";
                </script>
                    <?php
            }
        
        }
    ?>
    
<?php
include "footer.php";
?>