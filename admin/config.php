<?php 

$host = "localhost";
$username = "root";
$password = ""; 
$database = "sms-php";

$conn = mysqli_connect($host, $username, $password, $database) or die(mysqli_connect_errno()); 

$page_tittle = "";