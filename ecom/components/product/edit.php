<?php
    $id      = $_GET['val2'] ?? false;
    $success = $_GET['val3'] ?? false;

    // echo json_encode($_POST); exit;
    if(isset($_POST['update'])):
        $data_update = array();
        $data_update['itemName'] = $_POST['itemName'];
        $data_update['itemPrice'] = $_POST['itemPrice'];
        $data_update['itemStock'] = $_POST['itemStock'];
        $data_update['itemDescription'] = $_POST['itemDescription'];
        $data_update['enabled'] = $_POST['enabled'];
        
        
        if ($_FILES['image_field']['size'] != 0 && $_FILES['image_field']['name'] != ""):  
            $data_update['itemImage'] = $_FILES['image_field']['name'];
            $picture_filename = pathinfo($_FILES['image_field']['name'], PATHINFO_FILENAME);
            $handle = new Upload($_FILES['image_field']);
            if ($handle->uploaded) {
                $handle->file_new_name_body   = $picture_filename;
                $handle->image_resize         = false;
                $handle->image_x              = 439;
                $handle->image_ratio_y        = true;
                $handle->process('../img/clothes/');
                if ($handle->processed) {
                $handle->clean();
                } else {
                    echo 'error : ' . $handle->error;
                    exit;
                }
            }
        endif;

        $data_update['date_updated']   = date('Y-m-d H:i:s');
        $update = $db->update('ecom_product', $data_update, "itemID=%s", $id);
        header("Location: ".URL_LINK."$page/$mode/$id/success");
    endif;

   
    if($id != false):
        //QUERY ITEM
        $product = $db->queryFirstRow("SELECT * FROM ecom_product WHERE itemID = '$id'");
        if(!empty($product)):
            $itemName  = $product['itemName'];
            $itemPrice = $product['itemPrice'];
            $itemStock = $product['itemStock'];
            $itemDescription = $product['itemDescription'];
            $enabled = $product['enabled'];
            $image = $product['itemImage'];
?>
<?php if($success == 'success'): ?>
    <div class="alert alert-success" role="alert">
        Item successfully updated!
    </div>
<?php endif; ?>

<h1 class="mt-4">Products & Items - <?= $itemName; ?></h1>
<div class="row">
    <div class="col-md-12">
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="update" value="1">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="itemName">Item Name</label>
                    <input type="text" class="form-control" id="itemName" name="itemName" value="<?= $itemName; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="itemPrice">Item Price</label>
                    <input type="text" class="form-control" id="itemPrice" name="itemPrice" value="<?= $itemPrice; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="itemStock">Inventory</label>
                    <input type="text" class="form-control" id="itemStock" name="itemStock" value="<?= $itemStock; ?>">
                </div>
                <div class="form-group col-md-6">
                    <div class="form-check" style="margin-top: 40px;">
                        <input class="form-check-input" type="checkbox" id="gridCheck" name="enabled" value="1" <?= $enabled > 0 ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="gridCheck">
                            Enabled
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="itemStock">Details & Care</label>
                    <textarea name="itemDescription" id="editor" cols="30" rows="20" class="form-control"><?= $itemDescription; ?></textarea>
                </div>

                <div class="form-group col-md-6">
                    <label for="image-uploader">Image</label><br/>
                    <img src="<?= FE_LINK; ?>img/clothes/<?= $image; ?>" alt="">
                    <input type="file" size="32" name="image_field" value="">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
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



<script>
  tinymce.init({
    selector: 'textarea#editor',
    plugins: 'lists',
    toolbar: 'numlist bullist'
  });

</script>
