<?php
$host = "db.pxxl.pro";
$port = 16690;
$dbname = "db_811a151d";
$username = "user_3ad78d96";
$password = "6bc9799e4d09a1b259c25cb58209afe5";

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "✅ Database connected successfully!";
} catch (PDOException $e) {
    die("❌ Connection failed: " . $e->getMessage());
}
?>
