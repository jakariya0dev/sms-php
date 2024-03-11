<?php 

$host = $_SERVER["SERVER_NAME"];
$user = "root";
$password = "";
$db = "sms-php";

$conn = mysqli_connect($host, $user, $password, $db) or die("Database Connection failed: ". mysqli_error($conn));