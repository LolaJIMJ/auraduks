<?php
session_start();
require_once "../classes/sanitize.php";
require_once "../classes/User.php";

$user = new User;

if (isset($_POST['btnlogin'])) {
    // Retrieve and sanitize form data
    $email = sanitizer($_POST['email']);
    $pwd = sanitizer($_POST['pwd']);
    
    
    $data = $user->login($email, $pwd);
    if ($data) { // log in
        $_SESSION['useronline'] = $data;
        header("location:../checkout.php");
        exit();
    } else {
        header("location:../checkout.php");
    }
} else { // direct visit
    $_SESSION['errormsg'] = "Please complete the form";
    header("location:../checkout.php");
    exit();
}