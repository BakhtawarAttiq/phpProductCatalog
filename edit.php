<?php
require 'db.php';

if (!isset($_GET['id'])) {
    echo "Product ID not provided.";
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch();

if (!$product) {
    echo "Product not found.";
    exit;
}

$name = $product['name'];
$price = $product['price'];
$description = $product['description'];
$success = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $stmt = $pdo->prepare("UPDATE products SET name = ?, price = ?, description = ? WHERE id = ?");
    if ($stmt->execute([$name, $price, $description, $id])) {
        $success = "Product updated successfully!";
    } else {
        $success = "Failed to update product.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <?php if ($success): ?>
        <p><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>
    <form method="POST">
        <label>Name:</label><br>
        <input type="text" name="name" value="<?= htmlspecialchars($name) ?>" required><br><br>

        <label>Price:</label><br>
        <input type="number" step="0.01" name="price" value="<?= htmlspecialchars($price) ?>" required><br><br>

        <label>Description:</label><br>
        <textarea name="description" rows="5" cols="40"><?= htmlspecialchars($description) ?></textarea><br><br>

        <button type="submit">Update Product</button>
    </form>
    <br>
    <a href="index.php">Back to Product List</a>
</body>
</html>
