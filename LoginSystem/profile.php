<?php
session_start();
include "config.php";

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch user data
$stmt = $conns->prepare("SELECT username FROM users WHERE id = ?");
$stmt->bind_param("s", $user_id);
$stmt->execute();
$stmt->bind_result($username);
$stmt->fetch();
$stmt->close();
?>
    <head><link rel="stylesheet" href="main.css"></head>
<h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
<p><a href="register.php">Logout</a></p>
