<?php
require 'db.php';

$name = $price = $description = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $stmt = $pdo->prepare("INSERT INTO products (name, price, description) VALUES (?, ?, ?)");
    if ($stmt->execute([$name, $price, $description])) {
        $success = "Product added successfully!";
    } else {
        $success = "Failed to add product.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>
    <h1>Add New Product</h1>
    <?php if ($success): ?>
        <p><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>
    <form method="POST">
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Price:</label><br>
        <input type="number" step="0.01" name="price" required><br><br>

        <label>Description:</label><br>
        <textarea name="description" rows="5" cols="40"></textarea><br><br>

        <button type="submit">Add Product</button>
    </form>
</body>
</html>
