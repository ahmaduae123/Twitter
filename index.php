<?php
session_start();
include "db.php";

// Dummy user login
$_SESSION['user_id'] = 1;
$user_id = $_SESSION['user_id'];

// Get tweets
$tweets = $conn->query("SELECT tweets.*, users.username FROM tweets JOIN users ON tweets.user_id = users.id ORDER BY tweets.created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Mini Twitter</title>
  <style>
    body { font-family: Arial; background: #f4f4f4; padding: 20px; }
    .tweet-box, .tweet { background: white; padding: 15px; margin-bottom: 10px; border-radius: 8px; }
    textarea { width: 100%; height: 60px; margin-top: 10px; }
    .actions span { margin-right: 10px; color: blue; cursor: pointer; }
  </style><form method="POST" action="like.php" style="display:inline;">
  <input type="hidden" name="tweet_id" value="<?= $row['id'] ?>">
  <button type="submit" name="like">❤️ Like</button>
</form>

</head>
<body>

<h2>Welcome to Mini Twitter</h2>

<form method="POST" action="tweet.php">
  <div class="tweet-box">
    <textarea name="content" placeholder="What's on your mind?"></textarea><br>
    <button type="submit" name="post">Post Tweet</button>
  </div>
</form>

<?php while($row = $tweets->fetch_assoc()): ?>
  <div class="tweet">
    <b>@<?= htmlspecialchars($row['username']) ?></b> - <?= $row['created_at'] ?><br>
    <?= nl2br(htmlspecialchars($row['content'])) ?>
    <div class="actions">
      <span onclick="window.location='tweet.php?edit=<?= $row['id'] ?>'">Edit</span>
      <span onclick="window.location='tweet.php?delete=<?= $row['id'] ?>'">Delete</span>
    </div>
  </div>
<?php endwhile; ?>

</body>
</html>
