<?php include
'config.php';
$topic_id = $_POST['topic_id'];
$stmt = $pdo->prepare("UPDATE topics SET votes = votes + 1 WHERE id = ?");
$stmt->execute([$topic_id]);
header("Location:
index.php"); exit;
?>
