<!-- edit.php -->
<?php
session_start();
require '../db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../signin.php');
    exit();
}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM entities WHERE id = ?');
$stmt->execute([$id]);
$entity = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    $stmt = $pdo->prepare('UPDATE entities SET type = ?, name = ?, description = ? WHERE id = ?');
    $stmt->execute([$type, $name, $description, $id]);

    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Entity</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Entity</h2>
        <form action="edit.php?id=<?= $id ?>" method="POST">
            <div class="mb-3">
                <label for="type" class="form-label">Entity Type</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="Book" <?= $entity['type'] == 'Book' ? 'selected' : '' ?>>Book</option>
                    <option value="Recipe" <?= $entity['type'] == 'Recipe' ? 'selected' : '' ?>>Recipe</option>
                    <option value="Event" <?= $entity['type'] == 'Event' ? 'selected' : '' ?>>Event</option>
                    <option value="Project" <?= $entity['type'] == 'Project' ? 'selected' : '' ?>>Project</option>
                    <option value="Movie" <?= $entity['type'] == 'Movie' ? 'selected' : '' ?>>Movie</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Entity Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $entity['name'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" required><?= $entity['description'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
