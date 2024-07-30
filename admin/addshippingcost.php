

<!-- admin/addshippingcosts.php -->
<?php
include "sidenav.php";
include "topheader.php";
?>

<div class="content">
    <div class="container-fluid">
        <form method="POST" action="process/update_shipping_costs.php">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h5 class="title">Add Shipping Cost</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="costLagos">Lagos (Doorstep):</label>
                                        <input type="text" id="costLagos" name="costLagos" value="3500.00" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="">
                                        <label for="costPickup">Customer Pick-up:</label>
                                        <input type="text" id="costPickup" name="costPickup" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="costAbuja">Abuja (Doorstep):</label>
                                        <input type="text" id="costAbuja" name="costAbuja" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="costEast">East:</label>
                                        <input type="text" id="costEast" name="costEast" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="costState">Other States (Car Park):</label>
                                        <input type="text" id="costState" name="costState" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit">Update Costs</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
include "footer.php";
?>
