<h1 class="mt-4">Transaction List</h1>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Customer</th>
            <th scope="col">Transaction Number</th>
            <th scope="col">Email</th>
            <th scope="col">Contact Number</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $transactions = $db->query("SELECT * FROM ecom_transaction et INNER JOIN ecom_customer ec ON et.customerID = ec.customerID");
        foreach ($transactions as $transaction) :
            
        ?>
            <tr>
                <th scope="row"><?= $transaction['transactionID']; ?></th>
                <td><?= $transaction['customerFirstName']." ".$transaction['customerLastName']; ?></td>
                <td><?= $transaction['transactionNumber']; ?></td>
                <td><?= $transaction['customerEmail']; ?></td>
                <td><?= $transaction['customerContact']; ?></td>
                <td>
                    <a href="<?= URL_LINK ?>transaction/view/<?= $transaction['transactionID']; ?>" class="text-warning">View</a>
                </td>
            </tr>
        <?php
        endforeach;
        ?>

    </tbody>
</table>