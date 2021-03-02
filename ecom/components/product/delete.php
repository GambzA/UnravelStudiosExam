<?php
    $id      = $_GET['val2'] ?? false;
   
     // echo json_encode($_POST); exit;
     if(isset($_POST['delete'])):
        $data_update = array();
        $data_update['deleted'] = '1';
        $update = $db->update('ecom_product', $data_update, "itemID=%s", $id);
        header("Location: ".URL_LINK."$page");
    endif;

    if($id != false):
        //QUERY ITEM
        $product = $db->queryFirstRow("SELECT * FROM ecom_product WHERE itemID = '$id'");
        if(!empty($product)):
            $itemName  = $product['itemName'];
            $itemPrice = $product['itemPrice'];
            $itemStock = $product['itemStock'];
            $enabled = $product['enabled'];
?>

<div class="alert alert-danger" role="alert">
        Are you sure to delete this product?
</div>

<h1 class="mt-4">Products & Items - <?= $itemName; ?></h1>
<div class="row">
    <div class="col-md-12">
        <form action="" method="POST">
            <input type="hidden" name="delete" value="1">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="itemName">Item Name</label>
                    <input type="text" class="form-control" id="itemName" name="itemName" value="<?= $itemName; ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="itemPrice">Item Price</label>
                    <input type="text" class="form-control" id="itemPrice" name="itemPrice" value="<?= $itemPrice; ?>" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="itemStock">Inventory</label>
                    <input type="text" class="form-control" id="itemStock" name="itemStock" value="<?= $itemStock; ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="itemStock">Enabled</label>
                    <input type="text" class="form-control" id="itemStock" name="itemStock" value="<?= $enabled > 0 ? 'Yes' : 'No'; ?>" readonly>
                </div>
            </div>
            <button type="submit" class="btn btn-danger">Delete</button>
            <a type="button" class="btn btn-primary" href="<?= URL_LINK; ?>product">Go Back</a>
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