<h1 class="mt-4">Products & Items</h1>
<a href="<?= URL_LINK ?>product/add" class="btn btn-warning text-white btn-sm mb-2" >ADD +</a>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Product Name</th>
            <th scope="col">Price</th>
            <th scope="col">Remaining Inventory</th>
            <th scope="col">Enabled</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $products = $db->query("SELECT * FROM ecom_product WHERE deleted = 0");
        foreach ($products as $product) :
        ?>
            <tr>
                <th scope="row"><?= $product['itemID']; ?></th>
                <td><?= $product['itemName']; ?></td>
                <td><?= $product['itemPrice']; ?></td>
                <td><?= $product['itemStock']; ?></td>
                <td><?= $product['enabled']>0 ? 'Yes':'No'; ?></td>
                <td>
                    <a href="<?= URL_LINK ?>product/view/<?= $product['itemID']; ?>" class="text-warning">View</a>
                    <a href="<?= URL_LINK ?>product/edit/<?= $product['itemID']; ?>">Edit</a>
                    <a href="<?= URL_LINK ?>product/delete/<?= $product['itemID']; ?>" class="text-danger">Delete</a>
                </td>
            </tr>
        <?php
        endforeach;
        ?>

    </tbody>
</table>