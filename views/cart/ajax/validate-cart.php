<?php
/**
 * CHECK IF THERE ARE ANY CHANGES TO THE ITEM STOCK BEFORE PROCEEDING
 */

session_start();
include '../../../config.php';
include '../../../libraries/autoload.php';

if(isset($_POST)):
    $result = array();
    $result['success'] = 'false';
    $doNotProceed      = 0;
    $productsInCart = array_keys($_SESSION['LUXURIAFE']['cart']);

    $products = $db->query("SELECT * FROM ecom_product WHERE itemID IN (".implode(',',$productsInCart).")");

    foreach($products as $product):
        //Check if product still has stock
        if($product['itemStock'] == 0):
            $result['unavailableItems'][] = $product['itemID'];
            $doNotProceed++;
        else:
            if($product['itemStock'] > 0 && ($_SESSION['LUXURIAFE']['cart'][$product['itemID']]['qty'] > $product['itemStock'])):
                $result['itemsLessThanQty'][] = $product['itemID'];
                $doNotProceed++;
            endif;
        endif;
    endforeach;

    if($doNotProceed == 0):
        $result['success'] = 'true';
    endif;

    echo json_encode($result);

endif;

?>