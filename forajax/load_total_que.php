<?php
session_start();
include "../connection.php";
$total_que=0;
$res1=mysqli_query($link,"select * from questions where quiz_name='$_SESSION[quiz_name]'");
$total_que=mysqli_num_rows($res1);
echo $total_que;
?>