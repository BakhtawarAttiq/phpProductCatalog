<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM products ORDER BY created_at DESC");
$products = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Catalog</title>
</head>
<body>
    <h1>All Products</h1>
    <a href="create.php">Add New Product</a>
    <hr>

    <?php if (count($products) > 0): ?>
        <ul>
            <?php foreach ($products as $product): ?>
                <li>
                    <strong><?= htmlspecialchars($product['name']) ?></strong><br>
                    Price: $<?= htmlspecialchars($product['price']) ?><br>
                    <?= nl2br(htmlspecialchars($product['description'])) ?><br>
                    <a href="edit.php?id=<?= $product['id'] ?>">Edit</a> |
                    <a href="delete.php?id=<?= $product['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                    <hr>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No products found.</p>
    <?php endif; ?>
</body>
</html>
