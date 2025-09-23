<?php
session_start();
include "database.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conns->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $hashed_password);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && password_verify($password, $hashed_password)) {
        $_SESSION['user_id'] = $id;
        header("Location: profile.php");
        exit();
    } else {
        echo "Invalid username or password!";
    }

    $stmt->close();
}
?>

<!-- HTML Form -->
<head><link rel="stylesheet" href="main.css"></head>

<form id="login-form" method="POST" action="">
    <h2 id="login-title">Login</h2>
    <label for="login-username">Username:</label>
    <input id="login-username" type="text" name="username" required><br>
    
    <label for="login-password">Password:</label>
    <input id="login-password" type="password" name="password" required><br>
    
    <button id="login-btn" type="submit">Login</button>

    <p id="login-note">Not yet registered? Click <a href="register.php"><i>here</i></a> to register.</p>
</form>
