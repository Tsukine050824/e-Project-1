<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
</head>
<body>
<?php include 'app/views/layout/header.php'; ?>
<h1>Product List</h1>
<a href="index.php?controller=ProductController&action=create">Create New Product</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Category ID</th>
        <th>Size ID</th>
        <th>Image</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?= $product['id'] ?></td>
            <td><?= $product['name'] ?></td>
            <td><?= $product['description'] ?></td>
            <td><?= $product['price'] ?></td>
            <td><?= $product['stock'] ?></td>
            <td><?= $product['category_id'] ?></td>
            <td><?= $product['size_id'] ?></td>
            <td><?= $product['image'] ?></td>
            <td>
                <a href="index.php?controller=ProductController&action=edit&id=<?= $product['id'] ?>">Edit</a>
                <a href="index.php?controller=ProductController&action=delete&id=<?= $product['id'] ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php include 'app/views/layout/footer.php'; ?>
</body>
</html>
