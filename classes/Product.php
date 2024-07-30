<?php
error_reporting(E_ALL);
require_once("Db.php");



class Product extends Db{
    private $dbconn;

    public function __construct(){
        $this->dbconn = $this->connect();
    }




public function getProductById($productId) {
        try {
            $sql = "SELECT * FROM product WHERE product_id = ?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$productId]);
            $product = $stmt->fetch(PDO::FETCH_ASSOC);
            return $product;
        } catch(PDOException $e) {
           
            error_log("Error fetching product: " . $e->getMessage());
            return false;
        }
    }

    public function get_product_by_id($id) {
        $sql='SELECT * FROM product  WHERE product_id=?';
        $stmt= $this->dbconn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    
}
