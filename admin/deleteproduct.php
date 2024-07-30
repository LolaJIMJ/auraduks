<?php
error_reporting(E_ALL);
require_once "classes/Product.php";
 
if(isset($_GET["id"])){
    $id = $_GET["id"];

    $dell = new Product;
    $response = $dell->delete_Product($id);

    if($response){
        $_SESSION['feedback']="Deleted Successfully";
        header("location:productlist.php");
        exit();
      }else{
         $_SESSION['errormsg']="Failed to Delete";
         header("location:productlist.php");
         exit();
      }
 }
?>

