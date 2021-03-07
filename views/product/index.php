<?php
$pID = isset($_GET['val1']) ? $_GET['val1'] : false;
// GET PRODUCT DETAILS
$product = $db->queryFirstRow("SELECT * FROM ecom_product WHERE itemID = '$pID' AND enabled = 1 AND deleted = 0")
?>
<div class="my-5 py-5"></div>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="<?= IMG; ?>clothes/clothes1.webp" class="img-fluid" alt="">
        </div>
        <div class="col-md-6">
            <div class="product-info">
                <div class="row">
                    <div class="col-md-12">
                        <p class="product-title">LUXURIA</p>
                        <h1 class="product-title"><?= $product['itemName']; ?></h1>
                        <h4>SGD <?= $product['itemPrice']; ?></h4>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="accordion details-and-care" id="accordionExample">
                            <div class="">
                                <a class="btn btn-link px-0 py-3 " type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Details & Care <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div id="collapseOne" class="collapse" data-parent="#accordionExample">
                                <div class="product-description mb-3">
                                    <?= $product['itemDescription']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order-details mt-5">
                <form action="" method="POST" id="product-form">
                    <input type="hidden" name="product" value="<?= $pID; ?>" >
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Qty:</label>
                                <div class="qty-selector">
                                    <input name="qty" value="1" min="1" max="<?= $product['itemStock']; ?>" type="number" class="form-control" />
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row mt-5">
                        <div class="col-md-12">
                            <button class="w-100 custom-button add-to-cart" type="button">ADD TO CARD</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="my-5 py-5"></div>