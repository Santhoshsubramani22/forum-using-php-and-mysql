<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $stmt = $pdo->prepare("INSERT INTO topics (title, content) VALUES (?, ?)");
    $stmt->execute([$title, $content]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Topic</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="container">
<fieldset>
<h1>Create Topic</h1>

<form method="POST">
    <label>Title:</label><br>
    <input type="text" name="title" required><br>

    <label>Content:</label><br>
    <textarea name="content" required></textarea><br>
    
    
    <button type="submit" value="Create Topic">create topic</button>
</form>
<a href="index.php"><button class="btn--pri">Back to
Forum</button></a></fieldset>
</div>
</body>
</html>
