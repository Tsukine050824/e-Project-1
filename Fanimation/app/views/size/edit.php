<!DOCTYPE html>
<html>
<head>
    <title>Edit Size</title>
</head>
<body>
<?php include 'app/views/layout/header.php'; ?>
<h1>Edit Size</h1>
<form method="post" action="index.php?controller=SizeController&action=edit&id=<?= $size['id'] ?>">
    <label for="size_name">Size Name:</label>
    <input type="text" id="size_name" name="size_name" value="<?= $size['size_name'] ?>" required><br><br>
    <button type="submit">Update</button>
</form>
<?php include 'app/views/layout/footer.php'; ?>
</body>
</html>
