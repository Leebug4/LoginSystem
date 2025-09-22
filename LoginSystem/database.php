<?php
$conn = mysqli_connect(
    "db.pxxl.pro", 
    "user_3ad78d96", 
    "6bc9799e4d09a1b259c25cb58209afe5", 
    "db_811a151d", 
    16690
);

if (!$conn) {
    die("❌ Connection failed: " . mysqli_connect_error());
}
// echo "✅ Connected successfully!";
?>
