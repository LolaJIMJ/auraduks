<?php
  error_reporting(E_ALL);
  session_start();
  require_once "../classes/General.php";
  require_once "../classes/Product.php";

  if($_POST['sub']){
     #retrieve form data and sanitize, call the method that will add the details to the db
     $name = General::sanitize($_POST['productname']);
     $file = $_FILES['image'];
     $desc = $_POST['details'];
     $price1 = $_POST['price1'];
     $price = $_POST['price'];
     $catid = ($_POST['category_id']);

     //validate the form to ensure that fields are not empty
     $errors = [];
     if(empty($name)){
        array_push($errors, "specify the title");
     } 

     if ($_FILES['image']['name'] ==""){
        array_push($errors, "Select a file to upload");
      }
     
     if (empty($desc)){
        array_push($errors, "give details");
     }

     if (empty($price1)){
        array_push($errors, "give amount");
     }

     if (empty($price)){
        array_push($errors, "give amount");
     }

    

      if($errors){
        $_SESSION['admin_errormsg'] = $errors;
        header("location:../addproduct.php");
        exit();
      }  
       
     else{
        $product = new Product;
        $chk = $product->add_newproduct($name,$file,$desc,$price1,$price,$catid); 
        if($chk){
            header("location:../productlist.php");
            exit();
        }else{
            header("location:../addproduct.php");
            exit();
        }
        
     }
 
    }else{   //visited the page directly
    $_SESSION['admin_errormsg'] = "Please complete the form";
    header("location:../addproduct.php");
    exit();
  }
?>