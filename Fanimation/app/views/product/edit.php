<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
<?php include 'app/views/layout/header.php'; ?>
<h1>Edit Product</h1>
<form method="post" action="index.php?controller=ProductController&action=edit&id=<?= $product['id'] ?>">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?= $product['name'] ?>" required><br><br>
    <label for="description">Description:</label>
    <textarea id="description" name="description" required><?= $product['description'] ?></textarea><br><br>
    <label for="price">Price:</label>
    <input type="number" step="0.01" id="price" name="price" value="<?= $product['price'] ?>" required><br><br>
    <label for="stock">Stock:</label>
    <input type="number" id="stock" name="stock" value="<?= $product['stock'] ?>" required><br><br>
    <label for="category_id">Category ID:</label>
    <input type="number" id="category_id" name="category_id" value="<?= $product['category_id'] ?>" required><br><br>
    <label for="size_id">Size ID:</label>
    <input type="number" id="size_id" name="size_id" value="<?= $product['size_id'] ?>" required><br><br>
    <label for="image">Image:</label>
    <input type="text" id="image" name="image" value="<?= $product['image'] ?>" required><br><br>
    <button type="submit">Update</button>
</form>
<?php include 'app/views/layout/footer.php'; ?>
</body>
</html>
