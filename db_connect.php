<?php
$host = "localhost";
$dbname = "users";
$username = "root"; 
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Set the character set to UTF-8
$conn->set_charset("utf8");
?>