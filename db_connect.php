<?php
$url = parse_url(getenv("mysql://ba01a08f250dee:315b17ee@us-cdbr-east-06.cleardb.net/heroku_1b687dc500d9145?reconnect=true"));

$host = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$database = substr($url["path"], 1);

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");
?>
