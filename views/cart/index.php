<div class="my-5 py-5"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="cart-header text-center display-4">Cart</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">Items</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Qty</th>
                        <th class="text-center">Total</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $total_items = count($_SESSION['LUXURIAFE']['cart'] ?? array());
                        $grandTotal = 0;
                        if($total_items > 0):
                            // COLLECT ALL PRODUCTS FIRST
                            $products = array();
                            $products = array_keys($_SESSION['LUXURIAFE']['cart']);

                            // GET PRODUCT DETAILS
                            $productDetails = $db->query("SELECT * FROM ecom_product WHERE itemID IN (".implode(',',$products).") ");

                        foreach($productDetails as $cartItems):
                    ?>
                    <input type="hidden" id="product" value="<?= $cartItems['itemID']; ?>">
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-sm-3"><img src="<?= IMG; ?>clothes/clothes1.webp" style="width: 100px;"></div>
                                <div class="col-sm-9">
                                    <h5 class="product-title"><?= $cartItems['itemName']; ?></h5>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">SGD <?= $cartItems['itemPrice']; ?></td>
                        <td class="text-center"><?= $_SESSION['LUXURIAFE']['cart'][$cartItems['itemID']]['qty']; ?></td>
                        <td class="text-center">SGD <?= number_format($_SESSION['LUXURIAFE']['cart'][$cartItems['itemID']]['qty'] * $cartItems['itemPrice'],2); ?></td>
                        <td class="text-center"><button class="btn-clear remove-product" type="button"><i class="fa fa-minus-circle" aria-hidden="true"></i></button></td>
                    </tr>
                    <?php 
                        $grandTotal += $_SESSION['LUXURIAFE']['cart'][$cartItems['itemID']]['qty'] * $cartItems['itemPrice'];
                        endforeach;
                        endif; 
                    ?>
                    <tr>
                        <input type="hidden" id="grand_total" value="<?= $grandTotal; ?>">
                        <td></td>
                        <td class="text-center"></td>
                        <td class="text-center">GRAND TOTAL:</td>
                        <td class="text-center">SGD <span id="totalPrice"><?= number_format($grandTotal,2); ?></span></td>
                        <td class="text-center"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-3">
            <a class="w-100 custom-button" role="button" href="<?= URL_LINK; ?>checkout">PROCEED TO CHECKOUT</a>
        </div>
    </div>
</div>
<div class="my-5 py-5"></div>