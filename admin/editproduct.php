<?php
session_start();
require_once("classes/Category.php");
require_once("classes/Product.php");
$category =New Category;
$cat = $category->get_all_category();
// print_r($cat);
// die();

$product=new Product;

if($_GET['id']){

    $id=$_GET['id'];
    $res=$product->get_product_by_id($id);




}else{
    header("location:");
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
          
             <form action="process/process_editproduct.php" method="post" id="message_form" enctype="multipart/form-data">

                   
                        
          <div class="row">
          
                
         <div class="col-md-7">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Add Product</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" value="<?php print $res['product_name'] ?>" id="product_name" required name="productname" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="">
                        <label for="">Add Image</label>
                        <input type="file" value="<?php print $res['product_image'] ?>" name="image" required class="btn btn-fill btn-success" id="picture" >
                      </div>
                    </div>
                     <div class="col-md-12">
                      <div class="form-group">
                        <label>Description</label>
                        <textarea rows="4" cols="80" id="details" required name="details" class="form-control"> <?php print $res['product_details'] ?></textarea>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Old Price</label>
                        <input type="text" value="<?php print $res['product_price1'] ?>" id="price1" name="price1" required class="form-control" >
                      </div>
                    </div>
                  
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Price</label>
                        <input type="text" value="<?php print $res['product_price'] ?>" id="price" name="price" required class="form-control" >
                      </div>
                    </div>
                  </div>
                 
                  
                
              </div>
              
            </div>
          </div>
          <div class="col-md-5">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Select Category</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                       
                        <select name="category_id" id="option">
                        <option value="">Select One</option>

          <?php
           foreach($cat as $category){
            ?>
       <option value="<?php echo  $category["category_id"]?>"> <?php echo  $category["category_name"]?></option>
            <?php
           }
          
          ?>
    </select>
    </div>
     </div>
    </div>
              <div class="card-footer">
              <!-- <input type="hidden" name="id" value="<?php print $id ?>"  > -->
              <input type="hidden" name="product_id" value="<?php echo $res['product_id']; ?>">
                  <button type="submit" id="btn_save" value="submit" name="sub" required class="btn btn-fill btn-primary">Update Product</button>
              </div>
            </div>
          </div>
          
        </div>
         </form>
          
        </div>
      </div>

      <?php
include "footer.php";
?>