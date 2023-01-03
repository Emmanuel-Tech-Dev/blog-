<?php 

$host = "localhost";
$server = "root";
$password = "";
$dbname = "blog";



$conn = new MySQLi ($host, $server, $password, $dbname);

if($conn -> connect_error){

    die("Database connection error: " . $conn->connect_error);
}






?>