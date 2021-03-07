<div class="my-5 py-5"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="cart-header text-center display-4">My Orders</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">Transaction #</th>
                        <th class="text-center">Transaction Date</th>
                        <th class="">Item</th>
                        <th class="text-center">Qty</th>
                        <th class="text-center">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $transaction = $db->query("SELECT * FROM ecom_transaction et INNER JOIN ecom_transaction_item eti ON et.transactionID = eti.transactionID INNER JOIN ecom_product ep ON eti.productID = ep.itemID WHERE et.customerID = '{$_SESSION["LUXURIAFE"]["cust"]}'");
                        foreach($transaction as $transVal):
                    ?>
                    <tr>
                        <td class="text-center"><?= $transVal['transactionNumber']; ?></td>
                        <td class="text-center"><?= date('M d, Y g:i a',strtotime($transVal['transactionDate'])); ?></td>
                        <td>
                            <div class="row">
                                <div class="col-sm-3"><img src="<?= IMG; ?>clothes/clothes1.webp" class="img-fluid"></div>
                                <div class="col-sm-8">
                                    <h5 class="product-title"><?= $transVal['itemName']; ?></h5>
                                </div>
                            </div>
                        </td>
                        <td class="text-center"><?= $transVal['transactionQty']; ?></td>
                        <td class="text-center">SGD <?= $transVal['totalAmount']; ?></td>
                    </tr>
                    <?php
                        endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="my-5 py-5"></div>