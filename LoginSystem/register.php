<?php
session_start();
include 'config.php';

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
<form method="POST" action="">
    username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    Email: <input type="email" name="email" required><br>
    Phone: <input type="text" name="phone" required><br>
    gender:
    <select name ="gender">
        <option>Male</option>
        <option>Female</option>
        <option>Other</option>
    </select><br>
    <button type="submit">Register</button>
</form>