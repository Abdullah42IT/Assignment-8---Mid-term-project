<!-- create.php -->
<?php
session_start();
require '../db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../signin.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    $stmt = $pdo->prepare('INSERT INTO entities (type, name, description) VALUES (?, ?, ?)');
    $stmt->execute([$type, $name, $description]);

    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Entity</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Create New Entity</h2>
        <form action="create.php" method="POST">
            <div class="mb-3">
                <label for="type" class="form-label">Entity Type</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="Book">Book</option>
                    <option value="Recipe">Recipe</option>
                    <option value="Event">Event</option>
                    <option value="Project">Project</option>
                    <option value="Movie">Movie</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Entity Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
