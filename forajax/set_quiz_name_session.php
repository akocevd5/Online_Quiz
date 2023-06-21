<?php
session_start();
error_reporting(E_ERROR);
include "../connection.php";
$quiz_name=$_GET["quiz_name"];
$_SESSION["quiz_name"]=$quiz_name;


?>