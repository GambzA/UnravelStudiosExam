<?php
    $id      = $_GET['val2'] ?? false;
   
    if($id != false):
        //QUERY ITEM
        $customer = $db->queryFirstRow("SELECT * FROM ecom_customer WHERE customerID = '$id'");
        if(!empty($customer)):
            $customerFirstName  = $customer['customerFirstName'];
            $customerLastName = $customer['customerLastName'];
            $customerEmail = $customer['customerEmail'];
            $customerContact   = $customer['customerContact'];
            $customerAddress   = $customer['customerAddress'];
?>
<h1 class="mt-4">Customer Details - <?= $customerFirstName; ?></h1>
<div class="row">
    <div class="col-md-12">
        <form action="" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="customerFirstName">Customer Name</label>
                    <input type="text" class="form-control" id="customerFirstName" value="<?= $customerFirstName." ".$customerLastName; ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="itemPrice">Email Address</label>
                    <input type="text" class="form-control" id="customerEmail" value="<?= $customerEmail; ?>" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="customerContact">Contact No.</label>
                    <input type="text" class="form-control" id="customerContact" value="<?= $customerContact; ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="customerAddress">Address</label>
                    <input type="text" class="form-control" id="customerAddress" value="<?= $customerAddress; ?>" readonly>
                </div>
            </div>
            <a type="button" class="btn btn-primary" href="<?= URL_LINK; ?>customer">Go Back</a>
        </form>

    </div>
</div>
<?php 
        endif;
    else: 
?>
    <h1 class="mt-4">Item does not exist</h1>
<?php
    endif;
?>