<?php
require 'db_connect.php';

$id = $_GET['id'];

$sql = "SELECT * FROM user_info WHERE id=$id";
$result = mysqli_query($conn, $sql);

$user = mysqli_fetch_assoc($result);

echo json_encode($user);

mysqli_close($conn);