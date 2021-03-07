<?php
    session_start();
    include '../../../config.php';
    include '../../../libraries/autoload.php';

    $result = array();
    $result['success'] = 'false';
    $result['message'] = "Oops! That didn't work. Try again!";
    if(isset($_POST)):
        $itemDetails = $db->queryFirstRow("SELECT itemName,itemPrice FROM ecom_product WHERE itemID = '{$_POST['product']}'");
        $name        = $itemDetails['itemName'];
        $price       = $itemDetails['itemPrice'];

        $priceOfItemToBeRemoved = $_SESSION['LUXURIAFE']['cart'][$_POST['product']]['qty'] * $price;


        unset($_SESSION['LUXURIAFE']['cart'][$_POST['product']]);

        $result['success']    = 'true';
        $result['message']    = "Item <b>{$name}</b> has been removed from your shopping bag";
        $result['totalItems'] = count($_SESSION['LUXURIAFE']['cart'] ?? array());
        $result['grandTotalFormatted'] = number_format($_POST['totalPrice'] - $priceOfItemToBeRemoved,2);
        $result['grandTotal'] = $_POST['totalPrice'] - $priceOfItemToBeRemoved;
    endif;
    echo json_encode($result);
?>