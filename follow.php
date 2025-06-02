<?php
session_start();
include "db.php";
$user_id = $_SESSION['user_id'];
$followed_id = $_GET['id'];

$check = $conn->query("SELECT * FROM follows WHERE follower_id='$user_id' AND followed_id='$followed_id'");
if ($check->num_rows == 0) {
    $conn->query("INSERT INTO follows (follower_id, followed_id, created_at) VALUES ('$user_id', '$followed_id', NOW())");
} else {
    $conn->query("DELETE FROM follows WHERE follower_id='$user_id' AND followed_id='$followed_id'");
}
echo "<script>window.location='index.php';</script>";
?>
