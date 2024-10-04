<?php
require_once 'app/configs/database.php';

class ProductsModel
{
    private $conn;

    public function __construct() {
        $this->conn = $GLOBALS['conn'];
    }

    public function getAllProducts() {
        $stmt = $this->conn->prepare("SELECT * FROM Product");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM Product WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insertProduct($data) {

        if (!is_int($data['Code'])) {

            $data['Code'] = 0;
        }

        $sql = "INSERT INTO Product (Name, Price, Description, fan_size, Color, Categories, Quantity, Image, Code) 
                VALUES (:Name, :Price, :Description, :fan_size, :Color, :Categories, :Quantity, :Image, :Code)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function updateProduct($id, $data) {
        $sql = "UPDATE Product SET Name = :Name, Price = :Price, Description = :Description, 
                fan_size = :fan_size, Color = :Color, Categories = :Categories, 
                Quantity = :Quantity, Image = :Image, Code = :Code 
                WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $data['id'] = $id;
        $stmt->execute($data);
    }

    public function deleteProduct($id) {
        $stmt = $this->conn->prepare("DELETE FROM Product WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
