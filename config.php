<?php 

include_once 'static-data.php';

// $host = $_SERVER["SERVER_NAME"];
$host = 'localhost';
$user = "root";
$password = "";
$db = "municipality-badarganj";

$conn = mysqli_connect($host, $user, $password, $db) or die("Database Connection failed: ". mysqli_error($conn));