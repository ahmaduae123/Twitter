<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include "db.php";

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1; // Default for now

if (isset($_POST['post'])) {
    $content = $conn->real_escape_string($_POST['content']);

    // Check if user exists
    $check = $conn->query("SELECT id FROM users WHERE id = '$user_id'");
    if ($check->num_rows > 0) {
        $sql = "INSERT INTO tweets (user_id, content, created_at) VALUES ('$user_id', '$content', NOW())";
        if ($conn->query($sql)) {
            echo "<script>window.location='index.php';</script>";
        } else {
            echo "❌ Tweet failed: " . $conn->error;
        }
    } else {
        echo "❌ User not found. Please create a user with ID = $user_id in your database.";
    }
}
?>
