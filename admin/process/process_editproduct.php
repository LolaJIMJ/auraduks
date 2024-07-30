


    <?php
   
  error_reporting(E_ALL);
  session_start();
  require_once "../classes/General.php";
  require_once "../classes/Product.php";


    if(isset($_POST["sub"])){
        $name = General::sanitize($_POST['productname']);
        $file = $_FILES['image'];
        $desc = $_POST['details'];
        $price1 = $_POST['price1'];
        $price = $_POST['price'];
        $catid = ($_POST['category_id']);
        $product_id = $_POST["product_id"];

       

        //instantiate the class
        $product1 = new Product;
        //call the method
        $response = $product1->update_product($name, $file, $desc, $price1, $price, $catid, $product_id);
        if($response){
            header("location:../productlist.php");
            exit();
        }else{
            echo "Unable to update product";
        }
       
    }
?>



