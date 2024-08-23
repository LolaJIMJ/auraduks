<?php
session_start();
require_once "../classes/Transaction.php";

$t = new Transaction;

//Get transaction ID from query string
$transaction_id = isset($_GET['trans_id']) ? intval($_GET['trans_id']) : 0;

if ($transaction_id) {
    $orderDetails = $t->get_transaction_details($transaction_id);
} else {
    echo "Invalid order ID.";
    exit();
}



if ($transaction_id) {
  $orderDetails = $t->get_transaction_details($transaction_id);
  

  if (!empty($orderDetails)) {
      // Extract billing and shipping address details from the first order detail
      $shipping_address = isset($orderDetails[0]['shipping_address']) ? $orderDetails[0]['shipping_address'] : 'N/A';
      $shipping_state = isset($orderDetails[0]['shipping_state']) ? $orderDetails[0]['shipping_state'] : 'N/A';
      $shipping_phone = isset($orderDetails[0]['shipping_phone']) ? $orderDetails[0]['shipping_phone'] : 'N/A';
  
  } else {
      echo "Invalid order ID.";
      exit();
  }
} else {
  echo "Invalid order ID.";
  exit();
}
?>


<?php
include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Product Details </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                   
                  <thead class=" text-primary">
                      <tr>
                     
                      <th>Product Name</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                    <!-- <th>Action</th> -->
                    </tr>
                </thead>
                    
                <tbody>
                <?php
                foreach ($orderDetails as $detail) {
    $det_id = isset($detail['det_id']) ? $detail['det_id'] : 0;
    
    echo "<tr>";
    
    echo "<td>{$detail['product_name']}</td>";
    echo "<td><img src='../admin/uploads/{$detail['product_image']}' alt='{$detail['product_name']}' width='50'></td>";
    echo "<td>{$detail['quantity']}</td>";
    echo "<td>₦{$detail['amount']}</td>";
   
    
    echo "</tr>";
}
?>
</tbody>
</table>

<h5>Shipping Address: <?php echo $shipping_address; ?></h5>
<h5>State: <?php echo $shipping_state; ?></h5>
<h5>Phone Number: <?php echo $shipping_phone; ?></h5>
                        
                  <button style="background-color:blueviolet;color:aliceblue"><a href="vieworders.php">Back to Order List</a>
                  </button>
                
                  <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
      <?php
include "footer.php";
?>