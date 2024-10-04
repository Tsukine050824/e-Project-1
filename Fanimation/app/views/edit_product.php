<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
<form action="index.php?action=Edit&id=<?= $product['Id'] ?>" method="POST" enctype="multipart/form-data">
    <input type="text" name="Name" value="<?= htmlspecialchars($product['Name']) ?>" required>
    <input type="text" name="Price" value="<?= htmlspecialchars($product['Price']) ?>" required>
    <textarea name="Description"><?= htmlspecialchars($product['Description']) ?></textarea>
    <input type="text" name="fan_size" value="<?= htmlspecialchars($product['fan_size']) ?>">
    <input type="text" name="Color" value="<?= htmlspecialchars($product['Color']) ?>">
    <input type="text" name="Categories" value="<?= htmlspecialchars($product['Categories']) ?>">
    <input type="number" name="Quantity" value="<?= htmlspecialchars($product['Quantity']) ?>" required>
    <input type="file" name="Image">
    <input type="text" name="Code" value="<?= htmlspecialchars($product['Code']) ?>">
    <button type="submit">Cập nhật sản phẩm</button>
</form>
</body>
</html>
