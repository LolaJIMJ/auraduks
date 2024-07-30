<?php

require_once "classes/Category.php";
// Handle category deletion
if(isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $category = new Category;

    $result = $category->deleteCategory($id);

    if($response){
        echo "Successfully Deleted";
    }else{
        echo "Sorry unable to delete";
    }
    header("Location: admindashboard.php");
    exit;
}
