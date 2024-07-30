<?php
require_once "Db.php";


class Product extends Db{
	private $dbconn;
	
	public function __construct(){
        $this->dbconn = $this->connect();
	}

    
        public function add_newproduct($name, $file, $desc, $price1, $price, $catid){
            // Upload file first
            $original = $file['name'];
            $temp = $file['tmp_name'];
            $r = explode(".", $original);
            $newname = time().rand().".".$r[1];
        
            move_uploaded_file($temp, "../uploads/$newname");
        
            // Insert into db
            try {
                $query = "INSERT INTO product (product_name, product_image, product_details, product_price1, product_price, category_id) VALUES (?,?,?,?,?,?)";
                $stmt = $this->dbconn->prepare($query);
                $result = $stmt->execute([$name, $newname, $desc, $price1, $price, $catid]);
                $_SESSION['admin_feedback'] = "$name successfully added";
                return $result;
            } catch (Exception $e) {
                $_SESSION['admin_errormsg'] = $e->getMessage();
                return 0;
            }
        }
        
	


      public function get_product_by_id($id){
        $sql = "SELECT * FROM product WHERE product_id = ?";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
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
    

       public function get_all_product(){
        $sql = "SELECT * FROM product";
        $sql = $this->dbconn->prepare($sql);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function get_total_products() {
        $sql = "SELECT COUNT(*) as total FROM product";
        $stmt = $this->dbconn->query($sql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function get_products_with_limit($offset, $limit) {
        $sql = "SELECT * FROM product LIMIT :offset, :limit";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    



public function update_product($name, $file, $desc, $price1, $price, $catid, $product_id){
    $newname = null;

    // Check if a new image file is uploaded
    if ($file['name']) {
        // Upload file
        $original = $file['name'];
        $temp = $file['tmp_name'];
        $r = explode(".", $original);
        $newname = time().rand().".".$r[1];
        move_uploaded_file($temp, "../uploads/$newname");
    }

    // Update the product in the database
    $sql = "UPDATE product SET product_name = ?, product_details = ?, product_price1 = ?, product_price = ?, category_id = ?";

    if ($newname) {
        $sql .= ", product_image = ?";
    }

    $sql .= " WHERE product_id = ?";
    $stmt = $this->dbconn->prepare($sql);

    if ($newname) {
        $response = $stmt->execute([$name, $desc, $price1, $price, $catid, $newname, $product_id]);
    } else {
        $response = $stmt->execute([$name, $desc, $price1, $price, $catid, $product_id]);
    }

    return $response;
}


public function delete_product($id){
    $sql = "DELETE FROM product WHERE product_id = ?";
    $stmt = $this->dbconn->prepare($sql);
    $result = $stmt->execute([$id]);
    return $result;
   }


}


    
    
      

    



     
    
       

