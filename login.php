<!-- index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>User Authentication</title>
</head>
<body>

<?php
session_start();
require 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["register"])) {
        $username = $_POST["username"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password

        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);

        if ($stmt->execute()) {
            echo "Registration successful.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } elseif (isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($userId, $hashedPassword);
        $stmt->fetch();

        if (password_verify($password, $hashedPassword)) {
            $_SESSION["user_id"] = $userId;
            header("Location: index.html");
        } else {
            echo "Invalid username or password.";
        }

        $stmt->close();
    }
}
?>

<h2>Register</h2>
<form method="post">
    <label for="reg_username">Username:</label>
    <input type="text" id="reg_username" name="username" required><br>
    <label for="reg_password">Password:</label>
    <input type="password" id="reg_password" name="password" required><br>
    <input type="submit" name="register" value="Register">
</form>

<h2>Login</h2>
<form method="post">
    <label for="login_username">Username:</label>
    <input type="text" id="login_username" name="username" required><br>
    <label for="login_password">Password:</label>
    <input type="password" id="login_password" name="password" required><br>
    <input type="submit" name="login" value="Login">
</form>

</body>
</html>
