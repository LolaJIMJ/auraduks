<?php
session_start();
error_reporting(E_ALL);

require_once "classes/Cart.php";

$id = isset($_GET['id']) ? $_GET['id'] : 0;

if ($id) {
    $cart = new Cart();
    $cart->removeFromCart($id);
    header("Location:cart.php");
} else {
    header("Location:shop.php");
    exit();
}
