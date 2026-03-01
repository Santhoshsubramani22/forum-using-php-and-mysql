<?php include
'config.php';
$topic_id = $_POST['topic_id'];
$stmt = $pdo->prepare("UPDATE topics SET pinned = NOT pinned WHERE id = ?");
$stmt->execute([$topic_id]);
header("Location:
index.php"); exit; ?>
