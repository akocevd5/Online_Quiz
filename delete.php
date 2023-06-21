<?php
include "connection.php";
$id=$_GET["id"];
mysqli_query($link,"delete from quiz_name where id=$id");
?>
<script>
    window.location="login_user.php";
</script>