<?php
    if(isset($_POST['confirm_logout'])):
        unset($_SESSION["LUXURIAFE"]["logged_in"]);
        unset($_SESSION["LUXURIAFE"]["cust"]);
        header("Location: ".URL_LINK);
    endif;
?>
<div class="my-5 py-5"></div>
<div class="container">
   
    <div class="row justify-content-center">
        <div class="col-md-5">
        <form action="" method="POST">
            <div class="row">
                <div class="col-md-12">
                    <input type="hidden" name="confirm_logout" value="1">
                    <h4 class="logout-sure text-center">Are you sure you want to logout?</h4>
                    <button class="w-100 custom-button mt-2">Logout</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
<?php 
   
?>