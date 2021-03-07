<div id="banner-homepage" class="carousel slide mt-5" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="<?= IMG; ?>banner2.jpg" alt="First slide">
            <div class="carousel-caption h-100 d-flex align-items-center flex-row-reverse">
                <h1 class="banner-caption display-1">-LUXURIA-</h1>
            </div>
        </div>
    </div>
</div>
<div class="my-5 py-5"></div>
<div class="container">
    <div class="row mb-5">
        <div class="col-md-12">
            <h1 class="text-center best-sellers">The 2021 Collection</h1>
        </div>
    </div>
    <div class="row">
        <?php
            $products = $db->query("SELECT * FROM ecom_product WHERE enabled = 1 AND deleted = 0");

            if(!empty($products)):
                foreach($products as $productVal):
        ?>
        <div class="col-md-3 p-4">
            <a href="<?= URL_LINK; ?>product/<?= $productVal['itemID']; ?>" class="product-item">
                <img src="<?= IMG; ?>clothes/<?= $productVal['itemImage']; ?>" class="img-fluid" alt="">
                <div class="row mt-2">
                    <div class="col-sm-8"><h5 class="product-title"><?= $productVal['itemName']; ?></h5></div>
                    <div class="col-sm-4 text-right">SGD <?= $productVal['itemPrice']; ?></div>
                </div>
            </a>
        </div>
        <?php 
                endforeach;
            endif; 
        ?>
    </div>
</div>
<div class="my-5 py-5"></div>