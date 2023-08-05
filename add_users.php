<?php

// Connect to database
require 'db_connect.php';

// Get input data  
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$dob = $_POST['birth_date'];

// Input validation
if (empty($name) || empty($email) || empty($dob)) {
  echo "Please fill all fields";
  exit;
}

// SQL query
$sql = "INSERT INTO user_info (name, email, birth_date) VALUES ('$name', '$email', '$dob')";

// Execute query
if (mysqli_query($conn, $sql)) {

  // Success
  echo "User added successfully";
} else {

  // Error
  echo "Error: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
