<?php
session_start();
error_reporting(E_ALL);
 require_once "partials/menu.php"; 
require_once "user_guard.php";
require_once "classes/Transaction.php";




$reference = isset($_SESSION['refno'])? $_SESSION['refno'] : 0;
if(!$reference){  //in case session has times out...
    header("location:shop.php");
}

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
$t = new Transaction;
$items = $t->get_transaction_byref($reference);

// echo "<pre>";
// print_r($items);
// echo "</pre>";
?>

<a href="pay.php">Confirm Payment</a>

<?php
// die();
?>



<div class="container  col-md-10 py-5" style="background-color: white;" >
<div class="content">
     <?php
     
        echo "<table class='table table-striped'>
           <tr>
              <th>S/N</th>
              <th>Product Name</th>
              <th>Product Image</th>
              <th>Price</th>
              <th>Quantity</th>
               <th>Remove</th>
              </tr>";
            $sn =1;
            $total = 0;
           
        if (isset($_SESSION['product']) && !empty($_SESSION['product'])) {
          foreach($_SESSION['product'] as $productid => $product_qty){
            $product_details = $t->get_product_by_id($productid);
            $productname = $product_details['product_name'];
            $productimage = "admin/uploads/".$product_details['product_image'];
            $productamt = number_format($product_details['product_price'] *$product_qty,2);
             $total = $total + ($product_details['product_price'] * $product_qty);

            echo "<tr>
            <td>$sn</td>
             <td class='name-pr'><a href='#'>$productname</a></td>
             <td class='thumbnail-img'><a href='#'><img class='img-fluid' src='$productimage' alt='' /></a></td>
             <td class='price-pr'><p>&#8358;$productamt</p></td>
             
              <td class='quantity-box'><p>$product_qty</p></td>
              <td class='remove-pr'><a href='removecart.php?id=$productid'><i class='fas fa-times'></i></a></td>

         </tr>";
         $sn ++ ;
        }
      }
        
         $formatted_total =number_format($total,2);
        echo "<tr><td>TOTAL</td><td colspan='2'></td><td align='left'>&#8358; $formatted_total</td><td colspan='2'></td></tr>";
        echo "</table>";
        // echo "<div class='alert alert-info'>Your cart is empty</div>";
?>

  <a href="emptycart.php" class='btn btn-danger btn-lg noround'>Empty Cart</a>
   &nbsp; &nbsp; &nbsp;
   
   <a href="shop.php?id=<?php echo $categories['category_id'] ?>"class='btn btn-warning btn-lg noround'>Continue Shopping</a>
    &nbsp; &nbsp; &nbsp;
  
  

</div>
</div>




<?php
require_once "partials/footer.php";
?>







