
<?php
session_start();
//require_once("classes/Product.php");
require_once("classes/Category.php");
require_once "classes/User.php";
require_once "classes/Cart.php";
$category =New Category;
$cat = $category->getAllCategory();


if(isset($_GET["id"])){
  //$gotten_cat=$category->getCategoryById($_GET['id']);
  $cat_name=$category-> get_category_name_by_id($_GET["id"]);
 
}

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
    <title>Auraduks - checkout</title>
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

    <style>
        .toggle-password {
            cursor: pointer;
            float: right;
            margin-right: 10px;
            margin-top: -25px;
            position: relative;
            z-index: 2;
        }
    </style>

    
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
                        <p>Call US :- <a href="#">+2349165432709</a></p>
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
                                        <div class="col-menu col-md-6">
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
                    <h2>Checkout</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row new-account-login">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="title-left">
                        <h3>Account Login</h3>
                    </div>
                    <h5><a data-toggle="collapse" href="#formLogin" role="button" aria-expanded="false">Click here to Login</a></h5>
                  
    <?php
    if(isset($_SESSION['errormsg'])){
      echo "<div class='alert alert-danger'>" .$_SESSION['errormsg']. "</div>";
      unset($_SESSION['errormsg']);
    }
  ?>
                    <form class="mt-3 collapse review-form-box" id="formLogin" action="process/process_login.php" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="InputEmail" class="mb-0">Email Address</label>
                                <input type="email" class="form-control" name="email" id="InputEmail" placeholder="Enter Email"> </div>
                            <!-- <div class="form-group col-md-6">
                                <label for="InputPassword" class="mb-0">Password</label>
                                <input type="password" name="pwd" class="form-control" id="InputPassword" placeholder="Password"> </div>
                        </div> -->

                        <div class="form-group col-md-6">
                                <label for="InputPassword" class="mb-0">Password</label>
                                <input type="password" name="pwd" class="form-control" id="InputPassword" placeholder="Password">
                                <span toggle="#InputPassword" class="fa fa-fw fa-eye toggle-password"></span>
                            </div>
                        <button type="submit" name="btnlogin" value="login" class="btn hvr-hover">Login</button>
                    </form>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="title-left">
                        <h3>Create New Account</h3>
                    </div>
                    <h5><a data-toggle="collapse" href="#formRegister" role="button" aria-expanded="false">Click here to Register</a></h5>
                    
        <?php
     if(isset($_SESSION['errormsg'])){
      echo "<div class='alert alert-danger'>" .$_SESSION['errormsg']. "</div>";
      unset($_SESSION['errormsg']);
    }
  ?>
                    <form class="mt-3 collapse review-form-box" id="formRegister" action="process/process_register.php" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="InputName" class="mb-0">First Name</label>
                                <input type="text" name="fname" class="form-control" id="InputName" placeholder="First Name"> </div>
                            <div class="form-group col-md-6">
                                <label for="InputLastname" class="mb-0">Last Name</label>
                                <input type="text" name="lname" class="form-control" id="InputLastname" placeholder="Last Name"> </div>
                            <div class="form-group col-md-6">
                                <label for="InputEmail1" class="mb-0">Email Address</label>
                                <input type="email" name="email" class="form-control" id="InputEmail1" placeholder="Enter Email"> </div>
                            

                        <div class="form-group col-md-6">
                                <label for="InputPassword1" class="mb-0">Password</label>
                                <input type="password" name="pwd" class="form-control" id="InputPassword1" placeholder="Password">
                                <span toggle="#InputPassword1" class="fa fa-fw fa-eye toggle-password"></span>
                            </div>
                        <button type="submit" name="btnregister" value="register" class="btn hvr-hover">Register</button>
                    </form>
                </div>
            </div>
            

        </div>
    </div>
    <!-- End Cart -->

    
<?php
require_once "partials/footer.php";

?>
<script>
        $(document).ready(function() {
            $(".toggle-password").click(function() {
                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $($(this).attr("toggle"));
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
        });
    </script>

    