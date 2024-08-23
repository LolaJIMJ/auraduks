<?php


    error_reporting(E_ALL);
    require_once("Db.php");
    class Admin extends Db{
        private $dbconn;

        public function __construct(){
            $this->dbconn = $this->connect();
        }

        public function admin_logout(){
          unset($_SESSION['adminonline']);
           session_destroy();
        }
        
        public function admin_login($email, $password){
            try{
                $query = "SELECT * FROM admin WHERE admin_email=?";
                $stmt = $this->dbconn->prepare($query);
                $result = $stmt->execute([$email]);
                $record = $stmt->fetch(PDO::FETCH_ASSOC);
                // $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if($record){ //username is correct

                    $hashed = $record['admin_password'];
                    echo "Hashed Password from Database: " . $hashed . "<br>"; // Debug output
                    $chk = password_verify($password, $hashed); //true/false
                    echo "Password Input: " . $password . "<br>"; // Debug output
                    if($chk){ //login is correct
                        $_SESSION['adminonline'] = $record['admin_id'];
                        $_SESSION['admin'] = true;
                        return 1;
                    
                    }else{
                        $_SESSION['admin_errormsg'] = "Invalid Password";
                        return 0;
                    }
                }else{ //username is not correct
                    $_SESSION['admin_errormsg'] = "Invalid email";
                    return 0;
                }
          
            }catch(PDOException $p){
                $_SESSION['admin_errormsg'] = $p->getMessage();
                return 0;
            }catch(Exception $e){
                $_SESSION['admin_errormsg'] = $e->getMessage();
                return 0;
            }
        }

          public function get_admin_by_id($admin_id){
            $sql = "SELECT * FROM admin WHERE admin_id = ?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$admin_id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        public function get_all_category(){
            $sql = "SELECT * FROM category";
            $sql = $this->dbconn->prepare($sql);
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    
        public function get_all_product(){
            $sql = "SELECT * FROM product";
            $sql = $this->dbconn->prepare($sql);
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function get_all_user(){
            $sql = "SELECT * FROM user";
            $sql = $this->dbconn->prepare($sql);
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function get_all_admin(){
            $sql = "SELECT * FROM admin";
            $sql = $this->dbconn->prepare($sql);
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function get_all_users(){
            $sql="SELECT * FROM  user";
            $stmt= $this->dbconn->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function fetch_product($product_id){
            $sql = 'SELECT * FROM `product` WHERE product_id = ?';
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$product_id]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

public function get_product_count_per_category() {
    $query = "SELECT c.category_id, c.category_name, COUNT(p.product_id) AS product_count 
              FROM category c 
              LEFT JOIN product p ON c.category_id = p.category_id 
              GROUP BY c.category_id";
    $stmt = $this->dbconn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
 }

