<?php
include 'config.php';
$topic_id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM topics WHERE id = ?");
$stmt->execute([$topic_id]);
$topic = $stmt->fetch();
$stmt = $pdo->prepare("SELECT * FROM replies WHERE topic_id = ?"); $stmt-
>execute([$topic_id]);
$replies = $stmt->fetchAll();
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
$content = $_POST['content'];
$stmt = $pdo->prepare("INSERT INTO replies (topic_id, content) VALUES (?,
?)");
$stmt->execute([$topic_id, $content]);
header("Location:
topic.php?id=$topic_id");
 exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo htmlspecialchars($topic['title']); ?></title>
<link rel="stylesheet" href="style.css">
</head>
<body><feildset>
<div class="container">
<h1><?php echo htmlspecialchars($topic['title']); ?></h1>
<p><?php echo htmlspecialchars($topic['content']); ?></p>
<h2>Replies</h2>
<?php foreach ($replies as $reply): ?>
<div class="reply">
<p><?php echo htmlspecialchars($reply['content']); ?></p>
</div>
<?php endforeach; ?>
<h3>Post a Reply</h3>
<form method="POST">
<textarea name="content" required></textarea><br>
<button type="submit" >post reply</button>
</form>
<a href="index.php"><button class="btn--pri">Back to Forum</button></a>
</div>
</fieldset>
</body>
</html>
