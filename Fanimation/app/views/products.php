<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
<button><a href="index.php?action=CreateProductForm">Add New</a></button>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Description</th>
        <th>Fan Size</th>
        <th>Color</th>
        <th>Categories</th>
        <th>Quantity</th>
        <th>Image</th>
        <th>Code</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?= htmlspecialchars($product['Id']) ?></td>
            <td><?= htmlspecialchars($product['Name']) ?></td>
            <td><?= htmlspecialchars($product['Price']) ?></td>
            <td><?= htmlspecialchars($product['Description']) ?></td>
            <td><?= htmlspecialchars($product['fan_size']) ?></td>
            <td><?= htmlspecialchars($product['Color']) ?></td>
            <td><?= htmlspecialchars($product['Categories']) ?></td>
            <td><?= htmlspecialchars($product['Quantity']) ?></td>
            <td>
                <?php if (!empty($product['Image'])): ?>
                    <img src='app/uploads/<?= htmlspecialchars($product['Image']) ?>' alt='<?= htmlspecialchars($product['Name']) ?>'>
                <?php else: ?>
                    No Image
                <?php endif; ?>
            </td>
            <td><?= htmlspecialchars($product['Code']) ?></td>
            <td>
                <a href='index.php?action=Edit&id=<?= $product['Id'] ?>'>Edit</a> |
                <a href='index.php?action=Delete&id=<?= $product['Id'] ?>' onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
