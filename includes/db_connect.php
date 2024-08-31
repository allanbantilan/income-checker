<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "print_shop";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
    die("connection failed " . $conn->connect_error);
}
// echo "connected";
