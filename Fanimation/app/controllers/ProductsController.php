<?php
require_once 'app/models/ProductsModel.php';
require_once 'app/controllers/BaseController.php';

class ProductsController extends BaseController
{
    private $productModel;

    public function __construct() {
        $this->productModel = new ProductsModel();
    }

    public function showProducts() {
        $products = $this->productModel->getAllProducts();
        $this->view('products', ['products' => $products]);
    }

    public function createProductForm() {
        $this->view('add_product');
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $this->getProductDataFromForm();
            $this->productModel->insertProduct($data);
            header('Location: index.php?action=ShowProducts');
            exit;
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $this->getProductDataFromForm();
            $this->productModel->updateProduct($id, $data);
            header('Location: index.php?action=ShowProducts');
            exit;
        } else {
            $product = $this->productModel->getProductById($id);
            $this->view('edit_product', ['product' => $product]);
        }
    }

    public function delete($id) {

        $product = $this->productModel->getProductById($id);

        if ($product) {

            $imagePath = 'app/uploads/' . $product['Image'];


            $this->productModel->deleteProduct($id);

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        header('Location: index.php?action=ShowProducts');
        exit;
    }


    private function getProductDataFromForm() {
        return [
            "Name" => trim($_POST["Name"]),
            "Price" => trim($_POST["Price"]),
            "Description" => trim($_POST["Description"]),
            "fan_size" => trim($_POST["fan_size"]),
            "Color" => trim($_POST["Color"]),
            "Categories" => trim($_POST["Categories"]),
            "Quantity" => trim($_POST["Quantity"]),
            "Code" => (isset($_POST["Code"]) && $_POST["Code"] !== '') ? (int) trim($_POST["Code"]) : 0, // Chuyển đổi thành integer
            "Image" => $this->handleImageUpload()
        ];
    }

    private function handleImageUpload() {
        if (isset($_FILES['Image']) && $_FILES['Image']['error'] === UPLOAD_ERR_OK) {
            $targetDir = "app/uploads/";
            $targetFile = $targetDir . basename($_FILES["Image"]["name"]);
            if (move_uploaded_file($_FILES["Image"]["tmp_name"], $targetFile)) {
                return basename($_FILES["Image"]["name"]);
            } else {
                throw new Exception("Lỗi khi tải lên hình ảnh. Vui lòng thử lại."); // Thêm thông báo lỗi
            }
        }
        return null; // Hoặc xử lý hình ảnh mặc định nếu không có
    }
}
