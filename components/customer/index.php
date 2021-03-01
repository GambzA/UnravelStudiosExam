<h1 class="mt-4">Customer List</h1>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Contact Number</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $customers = $db->query("SELECT * FROM ecom_customer");
        foreach ($customers as $customer) :
        ?>
            <tr>
                <th scope="row"><?= $customer['customerID']; ?></th>
                <td><?= $customer['customerFirstName']." ".$customer['customerLastName']; ?></td>
                <td><?= $customer['customerEmail']; ?></td>
                <td><?= $customer['customerContact']; ?></td>
                <td>
                    <a href="<?= URL_LINK ?>customer/view/<?= $customer['customerID']; ?>" class="text-warning">View</a>
                </td>
            </tr>
        <?php
        endforeach;
        ?>

    </tbody>
</table>