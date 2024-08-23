<?php
session_start();
error_reporting(E_ALL);
require_once "user_guard.php";
require_once "classes/Paystack.php";
require_once "classes/Transaction.php";
require_once "classes/User.php";
require_once "classes/Message.php";

// Initialize Paystack and Transaction classes
$pay = new Paystack;
$transaction = new Transaction();

$reference = isset($_SESSION['refno']) ? $_SESSION['refno'] : 0;
$confirmation_from_paystack = $pay->paystack_verify($reference);

if ($confirmation_from_paystack && $confirmation_from_paystack->status == 1) {
    echo "Payment Complete, we will update payment table";
    echo "<pre>";
    print_r($confirmation_from_paystack);
    echo "</pre>";

    // Get transaction details
    $transaction_id = $confirmation_from_paystack->data->id; // Assuming this is the transaction ID from Paystack
    $amount_paid = $confirmation_from_paystack->data->amount / 100; // Convert kobo to naira

     // Update payment table
     $transaction->update_transaction_status($transaction_id, $amount_paid);

    } else {
    echo "Invalid Transaction ID Supplied";
}

