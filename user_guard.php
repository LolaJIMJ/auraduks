<?php
  
 if(!isset($_SESSION['useronline'])){
    $_SESSION['errormsg'] = "You must be logged in to be able to checkout";
    header("location:loginsignup.php");
    exit();
 }
