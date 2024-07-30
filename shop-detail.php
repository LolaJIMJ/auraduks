<?php
session_start();
require_once("classes/Product.php");
require_once("classes/Category.php");
$category =New Category;
$cat = $category->getAllCategory();


if(isset($_GET["id"])){
 //$gotten_cat=$category->getCategoryById($_GET['id']);   //featured product category
 // $cat_name=$category-> get_category_name_by_id($_GET["id"]);
 
}

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
    <title>Auraduks - <?php print $product_details['product_name'] ?> </title>
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
                           
                            
                            <li><a href="contact-us.php">Contact Us</a></li>
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
                    <a class="navbar-brand" href="index.php"><img src="images/perfumes/logo1.jpg" class="logo" alt=""></a>
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
                </li>
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
                    <h2>Shop Detail</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Shop Detail </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            
                        <div class="carousel-item active"> <img class="d-block w-100" src="admin/uploads/<?php print $product_details['product_image'] ?>"
                         alt="First slide"> </div>
                            
                        <div class="carousel-item"> <img class="d-block w-100" src= "admin/uploads/<?php print $product_details['product_image'] ?>" alt="Second slide"> </div>
                            
                        <div class="carousel-item"> <img class="d-block w-100" src="admin/uploads/<?php print $product_details['product_image'] ?>" alt="Third slide"> </div>
                        </div>
                       
                        <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev"> 
						<i class="fa fa-angle-left" aria-hidden="true"></i>
						<span class="sr-only">Previous</span> 
					</a>
                        <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next"> 
						<i class="fa fa-angle-right" aria-hidden="true"></i> 
						<span class="sr-only">Next</span> 
					</a>
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-1" data-slide-to="0" class="active">
                                <img class="d-block w-100 img-fluid" src="admin/uploads/<?php print $product_details['product_image'] ?>" alt="" />
                            </li>
                            <li data-target="#carousel-example-1" data-slide-to="1">
                                <img class="d-block w-100 img-fluid" src="admin/uploads/<?php print $product_details['product_image'] ?>"alt="" />
                            </li>
                            <li data-target="#carousel-example-1" data-slide-to="2">
                                <img class="d-block w-100 img-fluid" src="admin/uploads/<?php print $product_details['product_image'] ?>" alt="" />
                            </li>
                        </ol>
                    </div>
                </div>
                
                
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2><?php print $product_details['product_name'] ?></h2>
                        <h5><del>&#8358;<?php echo number_format($product_details['product_price1'], 2); ?></del>
    &#8358;<?php echo number_format($product_details['product_price'], 2); ?> </h5>



                        <p class="available-stock"><span>  Available / <a href="#">In stock </a></span>
                            <p>
                                <h4>Short Description:</h4>
                                <p><?php print $product_details['product_details'] ?></p>
                                

                                
                      <div class="price-box-bar">
                                    <div class="cart-and-bay-btn">
                                       
                                        <a class="btn hvr-hover" data-fancybox-close="" href="addtocart.php?id=<?php echo $product_details['product_id'] ?>>">Add to cart</a>
                                    </div>
                                </div>
                              

                               
                    </div>
                </div>
            </div>

           
           
            <div class="row my-5">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Featured Products</h1>
                        <p>You may also like</p>
                    </div>
                    <div class="featured-products-box owl-carousel owl-theme">
                        <div class="item">
                       
                      
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img src="images/oil (1).jpg" class="img-fluid" alt="Image">
                                    <div class="mask-icon">
                                        <ul>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                        <a class="cart" href="addtocart.php?id=<?php echo $product_details['product_id'] ?>>">Add to Cart</a>
                                       
                                    </div>
                                </div>
                                <div class="why-text">
                                     
                                    <h4> <a href="shop-detail.php?id=19">Coconut Rice Milk</a> </h4>
                                    <h5> &#8358;15,000</h5>
                                   
                                    </div>
                                 </div>
                                </div>
                            
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img src="images/vanillalav (2).jpg" class="img-fluid" alt="Image">
                                    <div class="mask-icon">
                                        <ul>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                        <a class="cart" href="addtocart.php?id=<?php echo $product_details['product_id'] ?>>">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="why-text">
                                    <h4><a href="shop-detail.php?id=11">Madagascar Vanilla Perfume Oil</a></h4>
                                    <h5> &#8358;18,000</h5>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img src="images/oil (3).jpg" class="img-fluid" alt="Image">
                                    <div class="mask-icon">
                                        <ul>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                        <a class="cart" href="addtocart.php?id=<?php echo $product_details['product_id'] ?>>">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="why-text">
                                <h4><a href="shop-detail.php?id=21">Coco Mademoiselle</a></h4>
                                <h5> &#8358;110,000</h5>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img src="images/vanillalav (4).jpg" class="img-fluid" alt="Image">
                                    <div class="mask-icon">
                                        <ul>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                        <a class="cart" href="addtocart.php?id=<?php echo $product_details['product_id'] ?>>">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="why-text">
                                <h4><a href="shop-detail.php?id=13">Pure Wonder Body Mist X Narciso Rodriguez</a></h4>
                                <h5> &#8358;135,000</h5>
                                </div>
                            </div>
                        </div>
                       
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img src="images/vanillalav (5).jpg" class="img-fluid" alt="Image">
                                    <div class="mask-icon">
                                        <ul>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                        <a class="cart" href="addtocart.php?id=<?php echo $product_details['product_id'] ?>>">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="why-text">
                                <h4><a href="shop-detail.php?id=14">Vanilla Diorama</a></h4>
                                <h5> &#8358;110,000</h5>
                                    
                                    
                                </div>
                               
                                
                            </div>
                        </div>

                       
                    </div>
                </div>
            </div> 

        </div>
    </div>
    <!-- End Cart -->

  <?php
  require_once "partials/footer.php";
  ?>  


    