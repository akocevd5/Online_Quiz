<?php
session_start();
include "connection.php";
include "header.php";

function sanitizeInput($input) {
    global $link;
    $input = trim($input);
    $input = mysqli_real_escape_string($link, $input);
    return $input;
}

// Generate CSRF token if not already set
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

?>

<div class="row">
    <div class="col-lg-6 col-lg-push-3" style="min-height: 500px;">
        <h1>Log in</h1>
        <p>No account? <a href="register.php">Register here!</a></p>

        <form action="" name="form1" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <!-- Include CSRF token as a hidden input field -->
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <button type="submit" name="submit">LOGIN</button>
            <div class="alert alert-danger" id="failure" style="text-align: center; display:none;">
                <strong>Invalid username or password.</strong> Please try again.
            </div>
        </form>
    </div>
</div>

<?php
if (isset($_POST["submit"])) {
    // Sanitize username input
    $username = sanitizeInput($_POST['username']);
    $password = $_POST['password'];

    // Validate CSRF token
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die("CSRF token validation failed.");
    }

    $stmt = $link->prepare("SELECT password FROM registration WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($storedPassword);
    $stmt->fetch();
    $stmt->close();

    if ($storedPassword !== null && password_verify($password, $storedPassword)) {
        $_SESSION["username"] = $username;
        ?>
        <script type="text/javascript">
            window.location = "login_user.php";
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            document.getElementById("failure").style.display = "block";
        </script>
        <?php
    }
}
?>

<?php
include "footer.php";
?>