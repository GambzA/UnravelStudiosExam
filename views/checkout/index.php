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
            <div class="row">
                <div class="col-md-12 text-center">
                <label for="" class="mb-4">Guest Information</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="">First Name</label>
                      <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Last Name</label>
                      <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Email Address</label>
                      <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Contact Number</label>
                      <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                      <label for="">Complete Address</label>
                      <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-12 text-center">
                <label for="" class="mb-3">Payment</label>
                </div>
                <div class="col-md-12 text-center">
                    <img src="<?= IMG; ?>payment-icons.png" class="img-fluid w-50" alt=""><br/>
                    <span class="text-muted">You will be redirected to our payment gateway page</span><br/>
                    <button class="w-100 custom-button mt-2" >PROCEED TO PAYMENT</button>
                </div>
            </div>
            </form>
        </div>
        <div class="col-md-6">
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
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-sm-3"><img src="<?= IMG; ?>clothes/clothes1.webp" style="width: 50px;"></div>
                                <div class="col-sm-9">
                                    <label class="product-title">Cardigan Dress</label>
                                </div>
                            </div>

                        </td>
                        <td class="text-center">S</td>
                        <td class="text-center">1</td>
                        <td class="text-center">P 1500</td>
                    </tr>
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-sm-3"><img src="<?= IMG; ?>clothes/clothes1.webp" style="width: 50px;"></div>
                                <div class="col-sm-9">
                                    <label class="product-title">Cardigan Dress</label>
                                </div>
                            </div>

                        </td>
                        <td class="text-center">S</td>
                        <td class="text-center">1</td>
                        <td class="text-center">P 1500</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="text-center"></td>
                        <td class="text-center">Total</td>
                        <td class="text-center">P 1500</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
    </div>
</div>