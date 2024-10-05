<?php
class CategoryModel {
    private $conn;

    public function __construct() {
        require 'app/configs/database.php';
        $this->conn = $conn;
    }

    public function getAllCategories() {
        $stmt = $this->conn->query('SELECT * FROM categories');
        return $stmt->fetchAll();
    }

    public function getCategoryById($id) {
        $stmt = $this->conn->prepare('SELECT * FROM categories WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function createCategory($name, $description) {
        $stmt = $this->conn->prepare('INSERT INTO categories (name, description) VALUES (:name, :description)');
        return $stmt->execute([
            'name' => $name,
            'description' => $description
        ]);
    }

    public function updateCategory($id, $name, $description) {
        $stmt = $this->conn->prepare('UPDATE categories SET name = :name, description = :description WHERE id = :id');
        return $stmt->execute([
            'id' => $id,
            'name' => $name,
            'description' => $description
        ]);
    }

    public function deleteCategory($id) {
        $stmt = $this->conn->prepare('DELETE FROM categories WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }
}
?>
