<!-- delete.php -->
<?php
session_start();
require '../db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../signin.php');
    exit();
}

$id = $_GET['id'];

$stmt = $pdo->prepare('DELETE FROM entities WHERE id = ?');
$stmt->execute([$id]);

header('Location: index.php');
exit();
?>
