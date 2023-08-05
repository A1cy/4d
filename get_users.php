<?php
require 'db_connect.php';

$sql = "SELECT * FROM user_info";
$result = mysqli_query($conn, $sql);

$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode($users);

mysqli_close($conn);