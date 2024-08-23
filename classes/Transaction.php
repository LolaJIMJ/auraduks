<?php
require_once "Db.php";
class Transaction extends Db{
    private $dbconn;
    public function __construct(){
        $this->dbconn = $this->connect();
    }


    

    public function get_transaction_byref($ref) {
        $query = "SELECT * FROM transaction 
                  JOIN trans_details ON trans_id = det_transid 
                  JOIN product ON trans_details.product_id = product.product_id 
                  WHERE trans_ref = ?";
        $stmt = $this->dbconn->prepare($query);
        $stmt->execute([$ref]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function get_transaction_amt($ref){
        $query = "SELECT trans_totamt FROM transaction WHERE trans_ref=?";
        $stmt = $this->dbconn->prepare($query);
        $stmt->execute([$ref]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $amt = $result['trans_totamt'];
        return $amt;
    }

    
   public function get_product_amt($id){
        $query = "SELECT product_price FROM product WHERE product_id=?";
        $stmt = $this->dbconn->prepare($query);
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $amt = $result['product_price'];
        return $amt;
    }

        //new method
    public function get_all_transactions() {
        $query = "SELECT * FROM transaction WHERE deleted = 0";
        $stmt = $this->dbconn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
   

    public function get_transaction_details($transaction_id) {
        $query = "SELECT t.shipping_address, t.shipping_state, t.shipping_phone, p.product_name, p.product_image, p.product_price, td.det_qty as quantity, td.det_amt as amount
                  FROM transaction t
                  JOIN trans_details td ON t.trans_id = td.det_transid
                  JOIN product p ON td.product_id = p.product_id
                  WHERE t.trans_id = ?";
        $stmt = $this->dbconn->prepare($query);
        $stmt->execute([$transaction_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


     //Fetch total amount for a given transaction ID
    public function get_transaction_amount($transaction_id) {
        $query = "SELECT trans_totamt FROM transaction WHERE trans_id = ?";
        $stmt = $this->dbconn->prepare($query);
        $stmt->execute([$transaction_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['trans_totamt'];
    }

    
    public function delete_order_detail($detail_id, $transaction_id) {
        $detail_id = intval($detail_id);
        $transaction_id = intval($transaction_id);
    
        // Check input values
        echo "Attempting to delete Detail ID: $detail_id, Transaction ID: $transaction_id<br>";
    
        // Delete the specific order detail
        $query = "DELETE FROM trans_details WHERE det_id = ?";
        $stmt = $this->dbconn->prepare($query);
        $success = $stmt->execute([$detail_id]);
        if ($success) {
            echo "Detail deleted successfully.<br>";
        } else {
            echo "Failed to delete detail.<br>";
        }
    
        // Check if there are any remaining details for the transaction
        $query = "SELECT COUNT(*) FROM trans_details WHERE det_transid = ?";
        $stmt = $this->dbconn->prepare($query);
        $stmt->execute([$transaction_id]);
        $remainingDetails = $stmt->fetchColumn();
        echo "Remaining Details for Transaction ID $transaction_id: $remainingDetails<br>";
    
        // If no remaining details, delete the transaction itself
        if ($remainingDetails == 0) {
            $query = "DELETE FROM transaction WHERE trans_id = ?";
            $stmt = $this->dbconn->prepare($query);
            $success = $stmt->execute([$transaction_id]);
            if ($success) {
                echo "Transaction deleted successfully.<br>";
            } else {
                echo "Failed to delete transaction.<br>";
            }
        }
    }
    
     public function delete_transaction($transaction_id) {
        $query = "UPDATE transaction SET deleted = 1 WHERE trans_id = ?";
        $stmt = $this->dbconn->prepare($query);
        $stmt->execute([$transaction_id]);
    }

    public function mark_as_deleted($transaction_id) {
        $query = "UPDATE transaction SET deleted = TRUE WHERE transaction_id = ?";
        $stmt = $this->dbconn->prepare($query);
        $stmt->execute([$transaction_id]);
    }
    
   
    public function insert_transaction($ref, $user_id, $cart_items, $shipping_address, $shipping_state, $shipping_phone) {
        $query = "INSERT INTO transaction (trans_ref, trans_by, shipping_address, shipping_state, shipping_phone) 
                  VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->dbconn->prepare($query);
        $stmt->execute([$ref, $user_id, $shipping_address, $shipping_state, $shipping_phone]);
        $id = $this->dbconn->lastInsertId();
    
        // Insert into transaction details table
        $amount = 0;
        foreach ($cart_items as $productid => $qty) {
            $product_price = $this->get_product_amt($productid);
            $query2 = "INSERT INTO trans_details (product_id, det_amt, det_transid, det_qty) VALUES (?, ?, ?, ?)";
            $stmt2 = $this->dbconn->prepare($query2); 
            $stmt2->execute([$productid, $product_price, $id, $qty]);
            $amount += $product_price * $qty;
        }
        
        $query3 = "UPDATE transaction SET trans_totamt = ? WHERE trans_id = ?";
        $stmt3 = $this->dbconn->prepare($query3);
        $stmt3->execute([$amount, $id]);
        
        return $id;
    }

    public function get_product_by_id($id) {
        $sql='SELECT * FROM product  WHERE product_id=?';
        $stmt= $this->dbconn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
      
       public function get_user_transactions($user_id) {
            $query = "SELECT t.trans_id, t.trans_totamt, t.trans_date, t.trans_ref, td.det_qty, td.det_amt, p.product_name, p.product_image, p.product_price 
                      FROM transaction t 
                      JOIN trans_details td ON t.trans_id = td.det_transid 
                      JOIN product p ON td.product_id = p.product_id 
                      WHERE t.trans_by = ? AND t.user_deleted = 0";
            $stmt = $this->dbconn->prepare($query);
            $stmt->execute([$user_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function get_admin_transactions() {
            $query = "SELECT * FROM transaction WHERE deleted = FALSE";
            $stmt = $this->dbconn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
         public function delete_usertransaction($transaction_id) {
        $query = "UPDATE transaction SET user_deleted = 1 WHERE trans_id = ?";
        $stmt = $this->dbconn->prepare($query);
        $stmt->execute([$transaction_id]);

        // Also delete the transaction details
        $query = "DELETE FROM trans_details WHERE det_transid = ?";
        $stmt = $this->dbconn->prepare($query);
        $stmt->execute([$transaction_id]);
    }

    public function update_transaction_status($transaction_id, $amount_paid) {
        $query = "UPDATE transaction SET status = 'completed', amount_paid = ? WHERE trans_ref = ?";
        $stmt = $this->dbconn->prepare($query);
        $stmt->execute([$amount_paid, $transaction_id]);
    }
    
    }

