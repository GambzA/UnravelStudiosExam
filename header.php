<?php
    $total_items = count($_SESSION['LUXURIAFE']['cart'] ?? array());
?>
<div class="fixed-top">
    <div class="container-fluid bg-dark">
        <div class="row">
            <div class="col-md-12 text-right">
                <?php if(isset($_SESSION["LUXURIAFE"]["logged_in"]) == 0): ?>
                <a href="<?= URL_LINK; ?>login" class="text-white sign-in-sign-up">LOGIN</a>
                <span class="text-white sign-in-sign-up"> - </span>
                <a href="<?= URL_LINK; ?>signup" class="text-white sign-in-sign-up">CREATE ACCOUNT</a>
                <?php endif; ?>
                <?php if(isset($_SESSION["LUXURIAFE"]["logged_in"]) == 1): ?>
                <a href="<?= URL_LINK; ?>myorders" class="text-white sign-in-sign-up">MY ORDERS</a>
                <span class="text-white sign-in-sign-up"> - </span>
                <a href="<?= URL_LINK; ?>logout" class="text-white sign-in-sign-up">LOGOUT</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-md navbar-white bg-white">
        <a href="<?= URL_LINK; ?>" class="navbar-brand"><?= BRAND_NAME; ?></a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ml-auto">
                <a href="<?= URL_LINK; ?>" class="nav-item nav-link active">Home</a>
                <a href="<?= URL_LINK; ?>cart" class="nav-item nav-link shopping-bag" data-toggle="tooltip" data-placement="bottom" data-html="true" data-trigger="manual" title="">
                <i class="fa fa-shopping-bag" aria-hidden="true"></i>&nbsp; <span class="bag-count"><?= $total_items; ?></span></a>
            </div>
        </div>
    </nav>
</div>