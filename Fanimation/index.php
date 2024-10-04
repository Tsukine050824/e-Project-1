<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'app/configs/database.php';
require_once 'app/controllers/ProductsController.php';

$controller = new ProductsController();

// Xử lý hành động từ URL
$action = isset($_GET['action']) ? $_GET['action'] : 'ShowProducts';
$id = isset($_GET['id']) ? $_GET['id'] : null;

switch ($action) {
    case 'ShowProducts':
        $controller->showProducts();
        break;
    case 'CreateProductForm':
        $controller->createProductForm();
        break;
    case 'Add':
        $controller->add();
        break;
    case 'Edit':
        $controller->edit($id);
        break;
    case 'Delete':
        $controller->delete($id);
        break;
    default:
        echo "Action không hợp lệ.";
        break;
}
?>
