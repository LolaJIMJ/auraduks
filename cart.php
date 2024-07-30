
<?php

require_once("classes/Category.php");
$category =New Category;
$cat = $category->getAllCategory();


if(isset($_GET["id"])){
  //$gotten_cat=$category->getCategoryById($_GET['id']);
  $cat_name=$category-> get_category_name_by_id($_GET["id"]);
 
}

?>



<?php
session_start();
error_reporting(E_ALL);

//require_once "category.php";
require_once "classes/User.php";
require_once "classes/Cart.php";
require_once "classes/Product.php";


// $user = new User;
// $data = $user->get_user_by_id($_SESSION['useronline']);

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
$t = new Product;
$total = 0; // Initialize the total variable here
?>



<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $product_details=$category->get_product_by_id($id);   
    }
    $product = new Product;
?>






<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Auraduks - Your Cart </title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

   

</head>

<body>

    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                        <ul class="offer-box">
                        <li>
                        <i class="fab fa-opencart" style='color:#FFD700'></i> Designer Perfumes
                    </li>
                    <li>
                        <i class='fab fa-opencart' style='color:#FFD700'></i></i> Perfume Oil
                    </li>
                    <li>
                        <i class="fab fa-opencart" style='color:#FFD700'></i> Scented Candles
                    </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="custom-select-box">
                        <select id="basic" class="selectpicker show-tick form-control" data-placeholder="&#8358; NGN">
						<option>&#8358; NGN</option>
						
					</select>
                    </div>
                    <div class="right-phone-box">
                        <p>Call US :- <a href="#"> +2349165432709</a></p>
                    </div>
                    <div class="our-link">
                        <ul>
                            
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="index.html"><img src="images/perfumes/logo1.jpg" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                        <li class="dropdown megamenu-fw">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Product</a>
                            <ul class="dropdown-menu megamenu-content" role="menu">
                                <li>
                                    <div class="row">
                                        <div class="col-menu col-md-3">
                                        <h6 class="title">Categories</h6>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <?php foreach($cat as $categories){
                                                        ?>
                                                    <li><a href="shop.php?id=<?php echo $categories['category_id'] ?>">
                                                        <?php echo $categories['category_name'] ?></a></li>
                                                        <?php 
                                                    }?>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- end col-3 -->
                                       </div>
                                    <!-- end row -->
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown active">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">SHOP</a>
                            <ul class="dropdown-menu">
                                <li><a href="cart.php">Cart</a></li>
                                <li><a href="checkout.php">Checkout</a></li>
                                <li><a href="myaccount.php">My Account</a></li>
                               
                            </ul>
                        </li>
                       
                        
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menu"><a href="cart.php">
						<i class="fa fa-shopping-bag"></i>
                            <span class="badge"> (<?php if(isset($_SESSION['product'])){echo count($_SESSION['product']);} ?>)</span>
					</a></li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">

                    

           
                       <li>
                       <a class="btn btn-dark noround" href="cart.php">My Cart (<?php if(isset($_SESSION['product'])){echo count($_SESSION['product']);} ?>)</a>
                           
                    </ul>
                </li>;
               
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cart</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                
        <?php
     if(isset($_SESSION['product']) && !empty($_SESSION['product'])){
        
        echo "
        
        <table class='table'>
          <thead>
           <tr>
             
              <th>Product Name</th>
              <th>Product Image</th>
              <th>Price</th>
               <th>Quantity</th>
               <th>Remove</th>

           </tr>";
          
           $total=0;
        } 
        
        ?>

           </thead>
          
           <tbody>
           <?php if (isset($_SESSION['product']) && !empty($_SESSION['product'])) {
            $total = 0; // Reset the total for each session check
       
            foreach($_SESSION['product'] as $productid => $product_qty){
            $product_details = $t->get_product_by_id($productid);
            $productname = $product_details['product_name'];
            $productimage = "admin/uploads/".$product_details['product_image'];
            $productamt = number_format($product_details['product_price'] *$product_qty,2);
            $total = $total + ($product_details['product_price'] * $product_qty);

            echo "<tr>
            
             <td class='name-pr'><a href='#'>$productname</a></td>
             <td class='thumbnail-img'><a href='#'><img class='img-fluid' src='$productimage' alt='' /></a></td>
             <td class='price-pr'><p>&#8358;$productamt</p></td>
             <td class='quantity-box'><p>$product_qty</p></td>
              <td class='remove-pr'><a href='removecart.php?id=$productid'><i class='fas fa-times'></i></a></td>
          </tr>";
         
         }
        
        
        ?>

<?php } else { ?>
        <tr>
            <td colspan="6" class="text-center">Your cart is empty</td>
        </tr>
    <?php } ?>
       
    </tbody>
</table>
 </div>
 </div>
  </div>
            

            <div class="row my-5">
                
                <!-- <div class="col-lg-6 col-sm-6">
                    <div class="update-box">
                        <input value="Update Cart" type="submit">
                    </div>
                </div> -->
            </div>

            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Order summary</h3>
                        <div class="d-flex">
                           
                            <h4>Total</h4>
                            <div class="ml-auto font-weight-bold">
                            &#8358; <?php
                        $formatted_total =number_format($total,2);
                           echo $formatted_total
                             ?>
                            </div>
                        </div>
                       
                       
                        
                        <hr>
                       
                        <div class="d-flex gr-total">
                            <h5>Grand Total</h5>
                            <div class="ml-auto h5">
                            &#8358; <?php
                        $formatted_total =number_format($total,2);
                           echo $formatted_total

                      
                             ?>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>

                
                <a href="emptycart.php" class='btn btn-danger btn-lg noround'>Empty Cart</a>
   &nbsp; &nbsp; &nbsp;
   
   
   <a href="shop.php?id=5" class='btn btn-warning btn-lg noround'>Continue Shopping</a>
   
    &nbsp; &nbsp; &nbsp;
                
    
  
                <div class="col-12 d-flex shopping-box">
                <?php
    if (isset($_SESSION['product']) && !empty($_SESSION['product'])) {
        echo '<a href="checkout.php" class="ml-auto btn hvr-hover">Checkout</a>';
        }?>
                </div>
              
            </div>

        </div>
    </div>
    <!-- End Cart -->

    <?php
  require_once "partials/footer.php";
 ?>
            









                           
                              
    