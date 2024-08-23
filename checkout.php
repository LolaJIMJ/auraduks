
<?php
session_start();

require_once("classes/Category.php");
$category =New Category;
$cat = $category->getAllCategory();


if(isset($_GET["id"])){
  //$gotten_cat=$category->getCategoryById($_GET['id']);
  $cat_name=$category-> get_category_name_by_id($_GET["id"]);
 
}

?>


<?php

error_reporting(E_ALL);
require_once "user_guard.php";
require_once "classes/User.php";
require_once "classes/Cart.php";
require_once "classes/Product.php";


$user = new User;
$data = $user->get_user_by_id($_SESSION['useronline']);

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
                        <p>Call US :- <a href="tel:+234814621367">+234814621367</a></p>
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
                                <li><a href="logout.php" onclick="return alert('User Successfully Logged Out')">Logout</a></li>
                               
                                
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
                            
                             <div class="form-group col-md-6">
                                <label for="InputPassword" class="mb-0">Password</label>
                                <input type="password" name="pwd" class="form-control" id="InputPassword" placeholder="Password">
                                <span toggle="#InputPassword" class="fa fa-fw fa-eye toggle-password"></span>
                            </div>
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
                                <input type="password" name="pwd" class="form-control" id="InputPassword1" placeholder="Password"> </div>
                        </div>
                        
                        <button type="submit" name="btnregister" value="register" class="btn hvr-hover">Register</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Delivery details</h3>
                        </div>
                       
                        <form class="needs-validation" novalidate method="post" action="placeorder.php">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">First name *</label>
                                    <input type="text" class="form-control" name="fname" id="firstName" placeholder="" value="" required>
                                    <div class="invalid-feedback"> Valid first name is required. </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Last name *</label>
                                    <input type="text" class="form-control" name="lname" id="lastName" placeholder="" value="" required>
                                    <div class="invalid-feedback"> Valid last name is required. </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="email">Email Address *</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="">
                                <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                            </div>
                            <div class="mb-3">
                                <label for="address">Address *</label>
                                <input type="text" class="form-control" name="billing_address" id="address" placeholder="" required>
                                <div class="invalid-feedback"> Please enter your shipping address. </div>
                            </div>
                            
                            <div class="mb-3">
                            <label for="phone">Phone Number *</label>
                            <input type="tel" class="form-control" name="phone" id="phone" placeholder="+234 123 4567"  required>
                            <div class="invalid-feedback"> Please enter a valid phone number. Format: +234 123 4567. </div>
                        </div>


                          <div class="row">
                                <div class="col-md-5 mb-3">
                                <?php
                            $states = [
                            "Abia", "Adamawa", "Akwa Ibom", "Anambra", "Bauchi", "Bayelsa", "Benue", "Borno",
                            "Cross River", "Delta", "Ebonyi", "Edo", "Ekiti", "Enugu", "FCT - Abuja", "Gombe", "Imo",
                            "Jigawa", "Kaduna", "Kano", "Kogi", "Kwara", "Lagos", "Nasarawa", "Niger",
                            "Ogun", "Ondo", "Osun", "Oyo", "Plateau", "Rivers", "Sokoto", "Taraba", "Yobe", "Zamfara"
                            ];
                            ?>
                                   
                                <label for="country">Country *</label>
                            <select class="wide w-100" id="country" required>
                                <option value="" disabled selected>Choose...</option>
                                <option value="Nigeria">Nigeria</option>
                            </select>
                                    
                                </div>
                                <div class="col-md-4 mb-3">
                                <label for="state">State *</label>
                        <select class="wide w-100" id="state" name="state" required>
                            <option value="" disabled selected>Choose...</option>
                            <?php foreach ($states as $state): ?>
                                <option value="<?php echo htmlspecialchars($state); ?>"><?php echo htmlspecialchars($state); ?></option>
                            <?php endforeach; ?>
                        </select>
                                    <div class="invalid-feedback"> Please provide a valid state. </div>
                                </div>
                               
                            </div>
                           <!-- new form -->

                           <div class="col-sm-6 col-lg-6 mb-3">
            <div  class="shipping-method-box">
                <div class="title-left">
                    <h3>Shipping Method</h3>
                </div>

               <div class="mb-4">
                    <div class="custom-control custom-radio">
                        <input id="shippingOption1" name="shipping_option" class="custom-control-input" checked="checked" type="radio" value="Lagos">
                        <label class="custom-control-label" for="shippingOption1">Lagos: Door step</label>
                        <span class="float-right font-weight-bold" id="priceLagos">₦3500.00</span>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="shippingOption2" name="shipping_option" class="custom-control-input" type="radio" value="Customer Pick-up">
                        <label class="custom-control-label" for="shippingOption2">Customer Pick-up</label>
                        <span class="float-right font-weight-bold" id="pricePickup">Free</span>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="shippingOption3" name="shipping_option" class="custom-control-input" type="radio" value="Abuja Doorstep">
                        <label class="custom-control-label" for="shippingOption3">Abuja: Doorstep</label>
                        <span class="float-right font-weight-bold" id="priceAbuja">₦4500.00</span>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="shippingOption5" name="shipping_option" class="custom-control-input" type="radio" value="Other States">
                        <label class="custom-control-label" for="shippingOption5">Other States: Car Park</label>
                        <span class="float-right font-weight-bold" id="priceState">₦4000.00</span>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-danger btn-lg btn-block" type="submit">Place Order</button>
    </form>

    
    <hr class="mb-4">
        </div>
        </div>
        <div class="col-sm-6 col-lg-6 mb-3">
        <div class="row">
         <div class="col-md-12 col-lg-12">
    
      <div class="col-md-12 col-lg-12">
    <div class="odr-box">
        <div class="title-left">
            <h3>Shopping cart</h3>
        </div>
        <div class="rounded p-2 bg-light">
            <?php 
            if (isset($_SESSION['product']) && !empty($_SESSION['product'])) {
                $total = 0; // Reset the total for each session check
                foreach($_SESSION['product'] as $productid => $product_qty){
                    $product_details = $t->get_product_by_id($productid);
                    $productname = $product_details['product_name'];
                    $productimage = "admin/uploads/".$product_details['product_image'];
                    $productamt = number_format($product_details['product_price'] * $product_qty, 2);
                    $total = $total + ($product_details['product_price'] * $product_qty);
                    ?>
                    <div class="media mb-2 border-bottom">
                        
                        <div class="media-body">
                            <a href="detail.html"><?php echo $productname; ?></a>
                            <div class="small text-muted">
                            Price: &#8358;<?php echo number_format($product_details['product_price'], 2); ?> 
                           
                                <span class="mx-2">|</span> 
                                Qty: <?php echo $product_qty; ?> 
                                <span class="mx-2">|</span> 
                                Subtotal: <?php echo $productamt; ?>
                            </div>
                        </div>
                    </div>

                     <?php
                }
            }
            ?>
        </div>
    </div>
</div>

     <div class="col-md-12 col-lg-12">
    <div class="order-box">
        <div class="title-left">
            <h3>Your order</h3>
        </div>
        <div class="d-flex">
            <div class="font-weight-bold">Product</div>
            <div class="ml-auto font-weight-bold">Total</div>
        </div>
        <hr class="my-1">

        
        <div class="d-flex">
            <h4>Sub Total</h4>
            <div class="ml-auto font-weight-bold"> ₦<?php echo number_format($total); ?> </div>
        </div>
       
        <div class="d-flex">
            <h4>Shipping Cost</h4>
            <div class="ml-auto font-weight-bold" id="shippingCost">₦0.00</div>
        </div>
        <hr>

        <div class="d-flex gr-total">
            <h5>Grand Total</h5>
            <div class="ml-auto h5" id="grandTotal">₦<?php echo number_format($total, 2); ?></div>
        </div>
        
       
            <!-- <div class="d-flex gr-total">
                <div class="ml-auto h5">
                <input type="hidden" name="total_amount" id="totalAmount" value="<?php echo $total; ?>">
                </div>
            </div> -->
           

        </div>
        <hr>
    </div>
</div>
  </div>
    </div>
     </div>
 </div>
    </div>
    <!-- End Cart -->

    
<!-- Start Footer  -->
<footer>
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4>About Auraduks</h4>
                            <p>At Auraduks, we believe that every scent tells a story, and we are dedicated to helping you find the perfect fragrance to tell yours. Our store offers a wide range of high-quality perfumes, essential oils, diffusers, and other aromatic products that cater to your unique preferences and needs. 


                                </p>
                            <ul>
                               
                                <li><a href="tel:+234814621367"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link">
                            <h4>Information</h4>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                
                                 <li><a href="#">Delivery Information</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Contact Us</h4>
                            <ul>
                            <li>
                                    <p><i class="fas fa-map-marker-alt"></i>Address: Unity Estate. <br>Ojodu Berger, Lagos</p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+2348146213678">+2348146213678</a></p>
                                </li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">All Rights Reserved. &copy; 2024 <a href="#">Auraduks</a> </p>
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>


    <script>
    // Define your shipping costs
    const shippingCosts = {
        "Lagos": 3500,
        "Customer Pick-up": 0,
        "Abuja Doorstep": 4500,
        "Other States": 4000
    };

    // Function to update the shipping cost and grand total
    function updateTotals() {
        const selectedShippingOption = document.querySelector('input[name="shipping_option"]:checked').value;
        const shippingCost = shippingCosts[selectedShippingOption];
        const subTotal = parseFloat(<?php echo $total; ?>);
        const grandTotal = subTotal + shippingCost;

        // Update the shipping cost display
        document.getElementById('shippingCost').innerText = '₦' + shippingCost.toLocaleString();

        // Update the grand total display
        document.getElementById('grandTotal').innerText = '₦' + grandTotal.toLocaleString();

        // Update the hidden input field for the total amount
        document.getElementById('totalAmount').value = grandTotal;
    }

    // Add event listeners to the shipping options
    document.querySelectorAll('input[name="shipping_option"]').forEach(function (radio) {
        radio.addEventListener('change', updateTotals);
    });

    // Initialize totals on page load
    document.addEventListener('DOMContentLoaded', updateTotals);
</script>

    <!-- ALL JS FILES -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/inewsticker.js"></script>
    <script src="js/bootsnav.js."></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/baguetteBox.min.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>


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

</body>
</html>





    