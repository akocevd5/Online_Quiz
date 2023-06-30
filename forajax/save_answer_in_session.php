<?php
session_start();
include "../connection.php";
$questionno=$_GET["questionno"];
$value1=$_GET["value1"];
$_SESSION["answer"][$questionno]=$value1;

?>