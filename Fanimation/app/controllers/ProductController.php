<?php
require_once 'app/models/ProductModel.php';

class ProductController {
    public function index() {
        $productModel = new ProductModel();
        $products = $productModel->getAllProducts();
        require_once 'app/views/product/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];
            $category_id = $_POST['category_id'];
            $size_id = $_POST['size_id'];
            $image = $_POST['image'];

            $productModel = new ProductModel();
            $productModel->createProduct($name, $description, $price, $stock, $category_id, $size_id, $image);

            header('Location: index.php?controller=ProductController&action=index');
            exit;
        }
        require_once 'app/views/product/create.php';
    }

    public function edit($id) {
        $productModel = new ProductModel();
        $product = $productModel->getProductById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];
            $category_id = $_POST['category_id'];
            $size_id = $_POST['size_id'];
            $image = $_POST['image'];

            $productModel->updateProduct($id, $name, $description, $price, $stock, $category_id, $size_id, $image);

            header('Location: index.php?controller=ProductController&action=index');
            exit;
        }
        require_once 'app/views/product/edit.php';
    }

    public function delete($id) {
        $productModel = new ProductModel();
        $productModel->deleteProduct($id);
        header('Location: index.php?controller=ProductController&action=index');
        exit;
    }
}
?>
