<?php
session_start();
require_once "User_guard.php";
require_once "classes/Paystack.php";
require_once "classes/Transaction.php";
require_once "classes/User.php";

$pay = new Paystack;
$t = new Transaction;
$u = new User;

$reference = isset($_SESSION['refno']) ? $_SESSION['refno'] : 0;

// Paystack API processing using the total amount...


if ($reference) {
    $deets = $u->get_user_by_id($_SESSION['useronline']);
    $email = $deets['user_email'];
    $amount = $t->get_transaction_amt($reference);

    
    // Include the shipping cost
   
    $shipping_cost = isset($_SESSION['shipping_cost']) ? $_SESSION['shipping_cost'] : 0;
    $grand_total = $amount + $shipping_cost; // Total amount including shipping

    // Convert grand total to kobo (Paystack expects the amount in kobo)
    $grand_total_in_kobo = $grand_total * 100; 

    // Debugging output
    echo "Reference: $reference<br>";
    echo "Email: $email<br>";
    echo "Amount: $amount<br>";
    echo "Shipping Cost: $shipping_cost<br>";
    echo "Grand Total: $grand_total<br>";
    echo "Grand Total in Kobo: $grand_total_in_kobo<br>";

    $payresponse = $pay->paystack_initialize($email, $grand_total_in_kobo, $reference);

    // Check if the Paystack API call was successful
    if ($payresponse) {
        echo "Paystack Response: " . json_encode($payresponse) . "<br>"; // Debugging output
        if ($payresponse->status) {
            $url = $payresponse->data->authorization_url;
            echo "Redirecting to: " . $url; // Debugging output
            header("Location: $url");
            exit();
        } else {
            $_SESSION['error_msg'] = "Payment initialization failed. Please try again. Error: " . $payresponse->message;
            echo "Paystack Error: " . $payresponse->message; // Debugging output
            header("Location: cart.php");
            exit();
        }
    } else {
        $_SESSION['error_msg'] = "Payment initialization failed due to a network issue. Please try again.";
        echo "Paystack API call failed."; // Debugging output
        header("Location: cart.php");
        exit();
    }
} else {
    $_SESSION['errormsg'] = "You need to add items to the cart.";
    echo "No reference number found."; // Debugging output
    header("Location: shop.php");
    exit();
}


