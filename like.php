<?php
session_start();
include "db.php";
$user_id = $_SESSION['user_id'];

if (isset($_POST['like'])) {
    $tweet_id = $_POST['tweet_id'];

    // Check if already liked
    $check = $conn->query("SELECT * FROM likes WHERE tweet_id='$tweet_id' AND user_id='$user_id'");
    if ($check->num_rows == 0) {
        $conn->query("INSERT INTO likes (tweet_id, user_id, created_at) VALUES ('$tweet_id', '$user_id', NOW())");
    }
    echo "<script>window.location='index.php';</script>";
}
?>
