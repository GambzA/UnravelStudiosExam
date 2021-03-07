<?php
$success = $_GET['val3'] ?? false;

// echo json_encode($_POST); exit;
if (isset($_POST['add'])) :
    $data_update = array();
    $data_update['itemName']  = $_POST['itemName'];
    $data_update['itemPrice'] = $_POST['itemPrice'];
    $data_update['itemStock'] = $_POST['itemStock'];
    $data_update['itemDescription'] = $_POST['itemDescription'];
    $data_update['itemImage'] = $_FILES['image_field']['name'];
    $data_update['enabled']   = $_POST['enabled'] ?? 0;
    $data_update['date_created']   = date('Y-m-d H:i:s');
    $data_update['date_updated']   = date('Y-m-d H:i:s');

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

    $db->insert('ecom_product', $data_update);
    $itemID = $db->insertId();
    header("Location: " . URL_LINK . "$page/edit/$itemID/success");
endif;



?>

<h1 class="mt-4">Products & Items - Add a product</h1>
<div class="row">
    <div class="col-md-12">
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="add" value="1">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="itemName">Item Name</label>
                    <input type="text" class="form-control" id="itemName" name="itemName" value="">
                </div>
                <div class="form-group col-md-6">
                    <label for="itemPrice">Item Price</label>
                    <input type="text" class="form-control" id="itemPrice" name="itemPrice" value="">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="itemStock">Inventory</label>
                    <input type="text" class="form-control" id="itemStock" name="itemStock" value="">
                </div>
                <div class="form-group col-md-6">
                    <div class="form-check" style="margin-top: 40px;">
                        <input class="form-check-input" type="checkbox" id="gridCheck" name="enabled" value="1">
                        <label class="form-check-label" for="gridCheck">
                            Enabled
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="itemStock">Details & Care</label>
                    <textarea name="itemDescription" id="editor" cols="30" rows="20" class="form-control"></textarea>
                </div>

                <div class="form-group col-md-6">
                    <label for="image-uploader">Image</label><br/>
                    <input type="file" size="32" name="image_field" value="">
                </div>
            </div>
            <button type="submit" class="btn btn-success">Add</button>
            <a type="button" class="btn btn-primary" href="<?= URL_LINK; ?>product">Go Back</a>
        </form>

    </div>
</div>


<script>
    tinymce.init({
        selector: 'textarea#editor',
        plugins: 'lists',
        toolbar: 'numlist bullist'
    });

</script>