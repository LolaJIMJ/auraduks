<?php
session_start();
error_reporting(E_ALL);
require_once "../classes/General.php";
require_once "../classes/Category.php";

$category = new Category;

if($_POST['send']){
$category_id = ($_POST['category_id']);
$category_name = ($_POST['category']);
}


 $response = $category->insertCategory($category_id, $category_name);

   if ($response) {
    header ("location:../admindashboard.php"); 
    exit();

}else{
    echo "Unable to add category";
}