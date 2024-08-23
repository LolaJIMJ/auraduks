<?php
session_start();

require_once "classes/Category.php";
$category = new Category;
$cat = $category->getAllCategory();

if (isset($_GET["id"])) {
    $cat_name = $category->get_category_name_by_id($_GET["id"]);
}

require_once "classes/Transaction.php";
require_once "classes/User.php";

if (!isset($_SESSION['useronline'])) {
    header("Location: loginsignup.php");
    exit();
}

$user_id = $_SESSION['useronline'];
$transaction = new Transaction();

// Fetch all transactions for the logged-in user that are not soft-deleted
$transactions = $transaction->get_user_transactions($user_id);
$current_trans_ref = null;
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
    <title>Auraduks - myaccount</title>
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
                        <p>Call US :- <a href="tel:+234814621367">+234814621367</a></p>
                    </div>
                    <div class="our-link">
                        <ul>
                            <li><a href="">Contact Us</a></li>
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
                        <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
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
                        <li class="dropdown">
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


    


<div class="container">
    <h2>Order Summary</h2>
    <?php
if (isset($_SESSION['message'])) {
    echo '<div class="alert alert-info">' . $_SESSION['message'] . '</div>';
    unset($_SESSION['message']);
}
?>


<table class="table table-bordered">
    <thead>
        <tr>
            <!-- <th>Transaction ID</th> -->
            <th>Transaction Reference</th>
            <th>Product Name</th>
            <th>Product Image</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    
    <tbody>
        <?php foreach ($transactions as $transaction) { ?>
            <tr>
                <!-- <td><?//php echo $transaction['trans_id']; ?></td> -->
                <td><?php echo $transaction['trans_ref']; ?></td>
                <td><?php echo $transaction['product_name']; ?></td>
                <td><img src="admin/uploads/<?php echo htmlspecialchars($transaction['product_image']); ?>" 
                             alt="<?php echo htmlspecialchars($transaction['product_name']); ?>" 
                             width="50" height="50">
                   
    <td><?php echo $transaction['det_qty']; ?></td>
                <td><?php echo $transaction['product_price']; ?></td>
                <td><?php echo $transaction['det_amt']; ?></td>
                <td><?php echo $transaction['trans_date']; ?></td>
                <td>
                    <form method="post" action="delete_order.php">
                        <input type="hidden" name="trans_id" value="<?php echo $transaction['trans_id']; ?>">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php
   require_once "partials/footer.php";
   ?>