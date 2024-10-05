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

            // Handle image upload
            $image = $this->handleImageUpload();

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

            // Handle image upload
            $image = $this->handleImageUpload();
            if (!$image) {
                $image = $product['image']; // Keep the old image if no new image is uploaded
            }

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

    private function handleImageUpload() {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $targetDir = "app/uploads/";
            $targetFile = $targetDir . basename($_FILES["image"]["name"]);

            // Check if the file already exists
            if (file_exists($targetFile)) {
                throw new Exception("File already exists. Please rename the file and try again.");
            }

            // Attempt to move the uploaded file
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                return basename($_FILES["image"]["name"]);
            } else {
                throw new Exception("Error uploading the image. Please try again.");
            }
        } else {
            // Handle errors
            if (isset($_FILES['image']['error'])) {
                switch ($_FILES['image']['error']) {
                    case UPLOAD_ERR_INI_SIZE:
                        throw new Exception("The uploaded file exceeds the upload_max_filesize directive in php.ini.");
                    case UPLOAD_ERR_FORM_SIZE:
                        throw new Exception("The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.");
                    case UPLOAD_ERR_PARTIAL:
                        throw new Exception("The uploaded file was only partially uploaded.");
                    case UPLOAD_ERR_NO_FILE:
                        throw new Exception("No file was uploaded.");
                    default:
                        throw new Exception("Unknown upload error.");
                }
            }
            return null; // Return null if no image was uploaded
        }
    }
}
?>
