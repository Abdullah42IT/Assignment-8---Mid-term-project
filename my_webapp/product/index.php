<!-- product/index.php -->
<?php
session_start();
require '../db.php';

$stmt = $pdo->query('SELECT * FROM entities ORDER BY type');
$entities = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entity List</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Entity List</h2>
        <a href="create.php" class="btn btn-success mb-3">Create New Entity</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($entities as $entity): ?>
                    <tr>
                        <td><?= $entity['id'] ?></td>
                        <td><?= $entity['type'] ?></td>
                        <td><?= $entity['name'] ?></td>
                        <td><?= $entity['description'] ?></td>
                        <td>
                            <a href="detail.php?id=<?= $entity['id'] ?>" class="btn btn-info btn-sm">View</a>
                            <a href="edit.php?id=<?= $entity['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete.php?id=<?= $entity['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="../signout.php" class="btn btn-secondary mt-3">Sign Out</a>
    </div>
</body>
</html>
