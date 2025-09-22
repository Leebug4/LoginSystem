<?php
session_start();
include "config.php";

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
<form method="POST" action="">
        <head><link rel="stylesheet" href="main.css"></head>
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Login</button>
<p> need to registar? click <a href="register.php">here</a> to register. </p>
</form>
