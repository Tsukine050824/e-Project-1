<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
<form action="index.php?action=Add" method="POST" enctype="multipart/form-data">
    <input type="text" name="Name" placeholder="Tên sản phẩm" required>
    <input type="text" name="Price" placeholder="Giá" required>
    <textarea name="Description" placeholder="Mô tả"></textarea>
    <input type="text" name="fan_size" placeholder="Kích thước quạt">
    <input type="text" name="Color" placeholder="Màu sắc">
    <input type="text" name="Categories" placeholder="Danh mục">
    <input type="number" name="Quantity" placeholder="Số lượng" required>
    <input type="file" name="Image">
    <input type="text" name="Code" placeholder="Mã sản phẩm">
    <button type="submit">Thêm sản phẩm</button>
</form>
</body>
</html>
