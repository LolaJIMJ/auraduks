<?php
session_start();
error_reporting(E_ALL);
require_once "user_guard.php";
require_once "classes/User.php";
require_once "classes/Transaction.php";

$t = new Transaction;

$selected_shipping_option = $_POST['shipping_option'];
$shipping_costs = [
    "Lagos" => 3500.00,
    "Customer Pick-up" => 0.00,
    "Abuja Doorstep" => 4500.00,
    "East" => 5000.00,
    "Other States" => 4000.00
];
$shipping_cost = isset($shipping_costs[$selected_shipping_option]) ? $shipping_costs[$selected_shipping_option] : 0.00;

// Store shipping cost in session
$_SESSION['shipping_cost'] = $shipping_cost;

$total_amount = 0;
if (isset($_SESSION['product']) && !empty($_SESSION['product'])) {
    foreach ($_SESSION['product'] as $productid => $product_qty) {
        $product_details = $t->get_product_by_id($productid);
        $total_amount += $product_details['product_price'] * $product_qty;
    }
}

$total_amount += $shipping_cost;
$_SESSION['total_amount'] = $total_amount;

if (!isset($_POST['billing_address']) || !isset($_POST['state']) || !isset($_POST['phone'])) {
    $_SESSION['errormsg'] = "Missing shipping information. Please complete the checkout form.";
    header("location:checkout.php");
    exit();
}

if (isset($_SESSION['product']) && !empty($_SESSION['product'])) {
    $ref = time() . rand();
    $_SESSION['refno'] = $ref;

    $shipping_address = $_POST['billing_address'];
    $shipping_state = $_POST['state'];
    $shipping_phone = $_POST['phone'];

    $trxid = $t->insert_transaction($ref, $_SESSION['useronline'], $_SESSION['product'], $shipping_address, $shipping_state, $shipping_phone, $total_amount);
    if ($trxid) {
        header("location:confirm.php");
        exit();
    } else {
        $_SESSION['errormsg'] = "Please try checking out again";
        header("location:cart.php");
        exit();
    }
} else {
    $_SESSION['errormsg'] = "Please add items to cart";
    header("location:shop.php");
    exit();
}
?>
