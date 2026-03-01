<?php
include 'config.php';
$stmt = $pdo->query("SELECT * FROM topics ORDER BY pinned DESC, created_at
DESC");
$topics = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Discussion Forum</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h1>Discussion Forum</h1>
<a href="create_topic.php"><button>create topic</button></a>
<h2>Topics</h2>
<?php foreach ($topics as $topic): ?>
<div class="topic">
<?php
echo "<h3><a
href='topic.php?id={$topic['id']}'>{$topic['title']}</a></h3>";?>
<p><?php echo htmlspecialchars($topic['content']); ?></p>
<p>Votes: <?php echo $topic['votes']; ?></p>
<a href="topic.php?id=<?php echo $topic['id']; ?>">View
Replies</a><br><br>
<form method="POST" action="vote.php">
<input type="hidden" name="topic_id" value="<?php echo $topic['id']; ?>">
<button type="submit" value="Vote" class="btn--vot">vote</button>
</form>
<form method="POST" action="pin.php">
<input type="hidden" name="topic_id" value="<?php echo $topic['id']; ?>">
<button type="submit" class="btn--thi"><?php echo $topic['pinned'] ?
'Unpin' : 'Pin'; ?></button>
</form>
</div>
<?php endforeach; ?>
</div>
</body>
</html>
