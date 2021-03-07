<?php
if(isset($_SESSION["LUXURIAFE"]["logged_in"])):
$custDetails = $db->queryFirstRow("SELECT * FROM ecom_customer WHERE customerID = '{$_SESSION["LUXURIAFE"]["cust"]}'");
$firstName   = $custDetails['customerFirstName'];
$lastName    = $custDetails['customerLastName'];
$email   = $custDetails['customerEmail'];
$contact   = $custDetails['customerContact'];
$address   = $custDetails['customerAddress'];
endif;
?>
<div class="my-5 py-5"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="cart-header text-center display-4">Checkout</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <form action="<?= URL_LINK; ?>checkout-process" method="POST">
                <?php if(isset($_SESSION["LUXURIAFE"]["logged_in"])): ?>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <label for="" class="mb-4">Guest Information</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">First Name</label>
                            <input type="text" class="form-control" readonly id="" aria-describedby="helpId" value="<?= $firstName; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input type="text" class="form-control" readonly id="" aria-describedby="helpId" value="<?= $lastName; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Email Address</label>
                            <input type="text" class="form-control" readonly id="" aria-describedby="helpId" value="<?= $email; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Contact Number</label>
                            <input type="text" class="form-control" readonly id="" aria-describedby="helpId" value="<?= $contact; ?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Complete Address</label>
                            <input type="text" class="form-control" readonly id="" aria-describedby="helpId" value="<?= $address; ?>">
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-12 text-center">
                        <label for="" class="mb-3">Payment</label>
                    </div>
                    <div class="col-md-12 text-center">
                        <img src="<?= IMG; ?>payment-icons.png" class="img-fluid w-50" alt=""> + <br />
                        <span class="text-muted">You will be redirected to our payment gateway page</span><br />
                        <button class="w-100 custom-button mt-2 proceed-checkout" type="button">PROCEED TO PAYMENT</button>
                    </div>
                </div>
                <?php else: ?>
                    <div class="col-md-12 text-center">
                        <h4 for="" class="mb-4 cart-header">Ready to pay for your purchase?</h4>
                        <p>
                            <a href="<?= URL_LINK; ?>login">Login</a> or <a href="<?= URL_LINK; ?>signup">Create an account</a> now!
                        </p>
                    </div>
                <?php endif; ?>
            </form>
        </div>
        <div class="col-md-6 table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">Items</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Qty</th>
                        <th class="text-center">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total_items = count($_SESSION['LUXURIAFE']['cart'] ?? array());
                    $grandTotal = 0;
                    if ($total_items > 0) :
                        // COLLECT ALL PRODUCTS FIRST
                        $products = array();
                        $products = array_keys($_SESSION['LUXURIAFE']['cart']);

                        // GET PRODUCT DETAILS
                        $productDetails = $db->query("SELECT * FROM ecom_product WHERE itemID IN (" . implode(',', $products) . ") ");

                        foreach ($productDetails as $cartItems) :
                    ?>
                            <input type="hidden" id="product" class="product" value="<?= $cartItems['itemID']; ?>">
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-sm-5"><img src="<?= IMG; ?>clothes/clothes1.webp" class="img-fluid"></div>
                                        <div class="col-sm-7">
                                            <h5 class="product-title"><?= $cartItems['itemName']; ?></h5>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">SGD <?= $cartItems['itemPrice']; ?></td>
                                <td class="text-center">
                                    <span data-toggle="tooltip" data-placement="bottom" data-html="true" data-trigger="manual" title="" class="item-qty">
                                        <?= $_SESSION['LUXURIAFE']['cart'][$cartItems['itemID']]['qty']; ?>
                                    </span>&nbsp;
                                    <span class="item-warning d-none"><b>!</b></span>
                                </td>
                                <td class="text-center">SGD <?= number_format($_SESSION['LUXURIAFE']['cart'][$cartItems['itemID']]['qty'] * $cartItems['itemPrice'], 2); ?></td>
                            </tr>
                    <?php
                            $grandTotal += $_SESSION['LUXURIAFE']['cart'][$cartItems['itemID']]['qty'] * $cartItems['itemPrice'];
                        endforeach;
                    endif;
                    ?>

                    <tr>
                        <td></td>
                        <td class="text-center"></td>
                        <td class="text-center">Grand Total</td>
                        <td class="text-center">SGD <?= $grandTotal; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>
<div class="my-5 py-5"></div>