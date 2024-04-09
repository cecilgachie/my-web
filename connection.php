<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "staff";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("connection failled". $conn->connect_error);
}



?>