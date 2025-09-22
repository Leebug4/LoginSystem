<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$host = "db.pxxl.io";    // from Pxxl dashboard
$user = "pxxluser";      // from Pxxl dashboard
$pass = "mypassword";    // from Pxxl dashboard
$db   = "pxxldb";        // from Pxxl dashboard

$conns = new mysqli($host, $user, $pass, $db);

if($conns->connect_error){
    die("Connection failed: " . $conns->connect_error);
}
?>