<?php
session_start();

require_once "classes/Transaction.php";

if (isset($_POST['trans_id'])) {
    $transaction_id = $_POST['trans_id'];

    $transaction = new Transaction();
    $transaction->delete_usertransaction($transaction_id);

    $_SESSION['message'] = "Order deleted successfully.";
    header("Location: myaccount.php");
    exit();
}

