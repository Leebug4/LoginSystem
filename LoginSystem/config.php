<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$host = "localhost";
$user = "root";
$pass = "0vmarkleev0";
$db = "usersdb";

$conns = new mysqli($host, $user, $pass, $db);

if($conns->connect_error){
    die("Connection failed: " . $conns->connect_error);
}
?>