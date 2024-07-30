<?php
error_reporting(E_ALL);
require_once("Db.php");



class Category extends Db{
    private $dbconn;

    public function __construct(){
        $this->dbconn = $this->connect();
    }

    public function getAllCategory() {
        $sql = 'SELECT * FROM category';
        $sql = $this->dbconn->prepare($sql);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        
    }

   
    public function get_category_name_by_id($category_id) {
        $sql = "SELECT category_name FROM category WHERE category_id=?";
        $sql = $this->dbconn->prepare($sql);
        $sql->execute([$category_id]);
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        return $result["category_name"];

    }

    
    

    public function getCategoryById($categoryId) {
        try {
            $sql = "SELECT * FROM product JOIN category ON category.category_id = product.category_id WHERE product.category_id = ?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$categoryId]);
            $category = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $category;
        } catch(PDOException $e) {
           
            error_log("Error fetching category: " . $e->getMessage());
            return false;
        }
    }


    public function get_product_by_id($product_id) {
        $sql = "SELECT * FROM product WHERE product_id=?";
        $sql = $this->dbconn->prepare($sql);
        $sql->execute([$product_id]);
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        return $result;

    }
   

    
    
}