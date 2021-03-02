<?php
$id      = $_GET['val2'] ?? false;

if ($id != false) :
    //QUERY ITEM
    $transactions = $db->queryFirstRow("SELECT * FROM ecom_transaction et INNER JOIN ecom_customer ec ON et.customerID = ec.customerID");
    if (!empty($transactions)) :
        $transactionsFirstName = $transactions['customerFirstName'];
        $transactionsLastName  = $transactions['customerLastName'];
        $transactionsEmail     = $transactions['customerEmail'];
        $transactionsContact   = $transactions['customerContact'];
        $transactionsAddress   = $transactions['customerAddress'];
        $transactionNumber     = $transactions['transactionNumber'];
?>
        <h1 class="mt-4">Customer Details - <?= $transactionsFirstName; ?></h1>
        <div class="row">
            <div class="col-md-12">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="customerFirstName">Customer Name</label>
                        <input type="text" class="form-control" id="customerFirstName" value="<?= $transactionsFirstName . " " . $transactionsLastName; ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="itemPrice">Email Address</label>
                        <input type="text" class="form-control" id="customerEmail" value="<?= $transactionsEmail; ?>" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="customerContact">Contact No.</label>
                        <input type="text" class="form-control" id="customerContact" value="<?= $transactionsContact; ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="customerAddress">Address</label>
                        <input type="text" class="form-control" id="customerAddress" value="<?= $transactionsAddress; ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <h1 class="mt-4">Transaction Details - <?= $transactionNumber; ?></h1>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Item/Product</th>
                            <th scope="col">QTY</th>
                            <th scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $totalPrice = 0;
                        $transaction_items = $db->query("SELECT * FROM ecom_transaction_item eti INNER JOIN ecom_product ep ON eti.productID = ep.itemID WHERE eti.transactionID = $id");
                        foreach ($transaction_items as $transaction_item) :

                        ?>
                            <tr>
                                <th scope="row"><?= $transaction_item['transactionItemID']; ?></th>
                                <td><?= $transaction_item['itemName']; ?></td>
                                <td><?= $transaction_item['transactionQty']; ?></td>
                                <td><?= $transaction_item['transactionQty'] * $transaction_item['itemPrice']; ?></td>
                            </tr>
                        <?php
                            $totalPrice = $totalPrice + $transaction_item['transactionQty'] * $transaction_item['itemPrice'];
                        endforeach;
                        ?>
                        <tr>
                            <th scope="row"></th>
                            <td></td>
                            <td>TOTAL AMOUNT</td>
                            <td><?= $totalPrice; ?></td>
                        </tr>
                    </tbody>
                </table>
                <a type="button" class="btn btn-primary" href="<?= URL_LINK; ?>transaction">Go Back</a>
            </div>
        </div>
    <?php
    endif;
else :
    ?>
    <h1 class="mt-4">Item does not exist</h1>
<?php
endif;
?>