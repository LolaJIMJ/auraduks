<?php

    error_reporting(E_ALL);
    session_start();
    require_once('../classes/User.php');
    require_once('../classes/sanitize.php');

    

    $user = new User;

    #to check if the form was submitted or the user visits this page directly
    if(isset($_POST['btnregister'])){

        #retrieve form data and sanitize
        $firstname = sanitizer($_POST['fname']);
        $lastname = sanitizer($_POST['lname']);
        $email = sanitizer($_POST['email']);
        $pwd = sanitizer($_POST['pwd']);

        if(empty($firstname) || empty($lastname) || empty($email) || empty($pwd)){
            $_SESSION['errormsg'] = "All fields are required";
            header("location:../register.php");
            exit();

        }else{
          $chk =  $user->insert_user($firstname,$lastname,$email,$pwd);
            if ($chk){
                $_SESSION['useronline'] = $chk;
                header("location:../checkout.php");
            }else{
                header("location:../checkout.php");
            }

        }

        
       

    }else{
        $_SESSION['errormsg'] = "You need to register";
        header("location:../checkout.php");
        exit();
    }