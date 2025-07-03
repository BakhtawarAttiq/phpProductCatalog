<?php
require 'db.php';

if (!isset($_GET['id'])) {
    echo "No product ID provided.";
    exit;
}

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
if ($stmt->execute([$id])) {
    header("Location: index.php");
    exit;
} else {
    echo "Failed to delete product.";
}
