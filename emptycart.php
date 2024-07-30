<?php
session_start();
unset($_SESSION['product']);
header("location:cart.php");
exit();





