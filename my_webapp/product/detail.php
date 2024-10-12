<!-- detail.php -->
<?php
session_start();
require '../db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM entities WHERE id = ?');
$stmt->execute([$id]);
$entity = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entity Details</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Entity Details</h2>
        <p><strong>Type:</strong> <?= $entity['type'] ?></p>
        <p><strong>Name:</strong> <?= $entity['name'] ?></p>
        <p><strong>Description:</strong> <?= $entity['description'] ?></p>
        <a href="index.php" class="btn btn-secondary">Back to List</a>
    </div>
</body>
</html>
