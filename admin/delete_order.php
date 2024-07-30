<?php
session_start();
require_once "../classes/Transaction.php";

if (!isset($_SESSION['admin']) || !$_SESSION['admin']) {
    $_SESSION['error_msg'] = "You do not have permission to perform this action.";
    header("Location: ../index.php");
    exit();
}

$t = new Transaction;

$transaction_id = isset($_GET['trans_id']) ? intval($_GET['trans_id']) : 0;

if ($transaction_id) {
    $t->delete_transaction($transaction_id);

    $_SESSION['success_msg'] = "Order deleted successfully.";
    header("Location: vieworders.php");
    exit();
} else {
    $_SESSION['error_msg'] = "Invalid order ID.";
    header("Location: vieworders.php");
    exit();
}
