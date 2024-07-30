
<?php
session_start();
require_once "../classes/Transaction.php";
require_once "../classes/User.php";

$t = new Transaction;
$u = new User;

$orders = $t->get_all_transactions();

if ($orders === false) {
    die("Failed to retrieve orders. Please check your database connection or query.");
}

include "sidenav.php";
include "topheader.php";
?>
<!-- HTML Content -->
<div class="content">
    <div class="container-fluid">
        <div class="col-md-14">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Orders / Page</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive ps">
                        <table class="table table-hover tablesorter">
                            <thead class="text-primary">
                                <tr>
                                    <th>Order ID</th>
                                    <th>Reference</th>
                                    <th>Date</th>
                                    <th>Total Amount</th>
                                    <th>Customer Email</th>
                                    <th>Details</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($orders as $order) {
                                    $user = $u->get_user_by_id($order['trans_by']);
                                    $totalAmount = $t->get_transaction_amount($order['trans_id']);
                                    echo "<tr>";
                                    echo "<td>{$order['trans_id']}</td>";
                                    echo "<td>{$order['trans_ref']}</td>";
                                    echo "<td>{$order['trans_date']}</td>";
                                    echo "<td>₦{$totalAmount}</td>";
                                    echo "<td>{$user['user_email']}</td>";
                                    echo "<td><a href='viewdetails.php?trans_id={$order['trans_id']}'>View Details</a></td>";
                                    echo "<td><a class='btn btn-danger' href='delete_order.php?trans_id={$order['trans_id']}' onclick='return confirm(\"Are you sure you want to delete this order?\");'>Delete</a></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>
