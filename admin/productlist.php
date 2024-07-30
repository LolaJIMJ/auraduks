<?php
   session_start();
   require_once "admin_guard.php";
   require_once "classes/Admin.php";
   require_once "classes/Product.php";
//to display all products
  $product = new Product;
   $t = $product->get_all_product();

   // Number of products per page
$products_per_page = 6;

// Get the current page or set default to 1
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($current_page < 1) {
    $current_page = 1;
}

// Calculate the offset
$offset = ($current_page - 1) * $products_per_page;

$product = new Product;
$t = $product->get_products_with_limit($offset, $products_per_page);

// Get the total number of products
$total_products = $product->get_total_products();
$total_pages = ceil($total_products / $products_per_page);



   
?>
 
 <?php

include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
       

        
         <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title"> Products List</h4>
                <?php
                          if(isset($_SESSION['admin_feedback'])){
                            echo "<div class='alert alert-success'>".$_SESSION['admin_feedback']."</div>";
                             unset($_SESSION['admin_feedback']);
                            
                          }

                        ?>

              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter " id="page1">
                    <thead class=" text-primary">
                      <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th> <a class=" btn btn-primary" href="addproduct.php">Add New</a></th>
                 </tr>
               </thead>
    
    <tbody>
    <?php

if(is_array($t)){
  $counter = 1;
   foreach($t as $f){

?>

<tr>
    <td><img src="uploads/<?php echo $f['product_image']; ?>" style="width:50px; height:50px; border:groove #000"></td>
    <td><?php echo $f['product_name']; ?></td>
    <td>#<?php echo $f['product_price']; ?></td>
    <td>
        <a class="btn btn-danger" href="deleteproduct.php?id=<?php echo $f['product_id']; ?>">Delete</a>
        <a class="btn btn-success" href="editproduct.php?id=<?php echo $f['product_id']; ?>">Edit</a>
    </td>
</tr>

   <?php
      }
      }
    ?>
  
</tbody>
 
 
   </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                  <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
              </div>
                <div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
              </div>
              </div>
              </div>
            </div>
           
            <nav aria-label="Page navigation example">
              <ul class="pagination">
              <?php if ($current_page > 1) : ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $current_page - 1; ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <?php endif; ?>
                   
                    <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                    <li class="page-item <?php echo $i == $current_page ? 'active' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                    <?php endfor; ?>

                    <?php if ($current_page < $total_pages) : ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $current_page + 1; ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
                 </nav>
            </div>
          </div>
      </div>

      
      <?php
include "footer.php";
?>