<?php
    if(!isset($_SESSION["LUXURIAFE"]["logged_in"])):
?>
<div class="my-5 py-5"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="cart-header text-center display-4">Login</h1>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-4">
        <form action="" method="POST" id="login-form">
            <div class="row ">
                <div class="col-md-12">
                    <div class="form-group">
                      <label for="">Email Address</label>
                      <input type="text" class="form-control" name="emailAdress" id="emailAdress" aria-describedby="helpId" placeholder="">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                      <label for="">Password</label>
                      <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="">
                    </div>
                </div>
                <div class="col-md-12">
                    <button class="w-100 custom-button mt-2">Login</button>
                </div>

                <div class="col-md-12 mt-2">
                    <span id="login-message"></span>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
<div class="my-5 py-5"></div>
<?php 
    else:
        header("Location: ".URL_LINK);
    endif; 
?>