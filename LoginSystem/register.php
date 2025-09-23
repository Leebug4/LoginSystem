<?php
session_start();
include "database.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];

    $stmt = $conns->prepare("INSERT INTO users (username, password, email, phone , gender) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $username, $password, $email, $phone , $gender);

    if($stmt->execute()){
        echo "Registration successful! <a href='login.php'>Login here</a>";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conns->close();
}
?>

<!-- HTML Form -->
<head><link rel="stylesheet" href="main.css"></head>

<form id="register-form" method="POST" action="">
    <h2 id="register-title">Register</h2>
    
    <label for="register-username">Username:</label>
    <input id="register-username" type="text" name="username" required><br>
    
    <label for="register-password">Password:</label>
    <input id="register-password" type="password" name="password" required><br>
    
    <label for="register-email">Email:</label>
    <input id="register-email" type="email" name="email" required><br>
    
    <label for="register-phone">Phone:</label>
    <input id="register-phone" type="text" name="phone" required><br>
    
    <label for="register-gender">Gender:</label>
    <select id="register-gender" name="gender">
        <option>Male</option>
        <option>Female</option>
        <option>Other</option>
    </select><br>
    
    <button id="register-btn" type="submit">Register</button>
    
    <p id="register-note">Need to login? Click <a href="login.php">here</a> to login.</p>
</form>
