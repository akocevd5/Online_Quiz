<?php
include "connection.php";
include "header.php";

function sanitizeInput($input) {
    global $link;
    $input = trim($input);
    $input = mysqli_real_escape_string($link, $input);
    return $input;
}

function escapeOutput($output) {
    return htmlspecialchars($output, ENT_QUOTES, 'UTF-8');
}

function generateCSRFToken() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
}

function validateCSRFToken($token) {
    if (!isset($_SESSION['csrf_token']) || $_SESSION['csrf_token'] !== $token) {
        die("CSRF token validation failed.");
    }
}

?>

<div class="row">
    <div class="col-lg-6 col-lg-push-3 " style="min-height: 500px;">
        <h1>REGISTER</h1>
        <p>Already have an account? <a href="login.php">Log in!</a></p>
        <form action="" name="form1" method="post">
            <div class="form">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <input type="password" name="password_confirm" placeholder="Confirm Password">

                
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

                <button type="submit" name="submit1">REGISTER</button>
                <div class="alert alert-success" id="success" style="text-align: center; display:none;">
                    <strong>Success!</strong> Account Registration successfully.
                </div>
                <div class="alert alert-danger" id="failure" style="text-align: center; display:none;">
                    <strong>Already Exist</strong> This account already exists.
                </div>
                <div class="alert alert-danger" id="pass" style="text-align: center; display:none;">
                    <strong>Password mismatch!</strong> You should repeat the same password.
                </div>
                <?php
                if (isset($_POST["submit1"])) {
                    $count = 0;
                    $username = sanitizeInput($_POST['username']);
                    $password = $_POST['password'];
                    $password_confirm = $_POST['password_confirm'];

                    
                    validateCSRFToken($_POST['csrf_token']);

                    $errors = array();
                    if (empty($username)) {
                        $errors[] = "Username is required.";
                    }
                    

                    if (count($errors) > 0) {
                        echo "<div class='alert alert-danger' style='text-align: center;'>";
                        foreach ($errors as $error) {
                            echo "<strong>Error:</strong> " . escapeOutput($error) . "<br>";
                        }
                        echo "</div>";
                    } else {
                        $res = mysqli_query($link, "SELECT * FROM registration WHERE username='$username'") or die(mysqli_error($link));
                        $count = mysqli_num_rows($res);

                        if ($count > 0) {
                            echo "<script type='text/javascript'>
                                    document.getElementById('success').style.display = 'none';
                                    document.getElementById('failure').style.display = 'block';
                                    document.getElementById('pass').style.display = 'none';
                                </script>";
                        } elseif ($password == $password_confirm) {
                            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                            mysqli_query($link, "INSERT INTO registration VALUES (NULL, '$username', '$passwordHash', '$passwordHash')") or die(mysqli_error($link));
                            echo "<script type='text/javascript'>
                                    document.getElementById('success').style.display = 'block';
                                    document.getElementById('failure').style.display = 'none';
                                    document.getElementById('pass').style.display = 'none';
                                </script>";
                        } else {
                            echo "<script type='text/javascript'>
                                    document.getElementById('success').style.display ='none';
                                    document.getElementById('failure').style.display = 'none';
                                    document.getElementById('pass').style.display = 'block';
                                </script>";
                        }
                    }
                }
                ?>
            </div>
        </form>
    </div>
</div>

<?php
generateCSRFToken();
include "footer.php";
?>