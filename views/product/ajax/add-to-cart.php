<?php
    session_start();
    include '../../../config.php';
    include '../../../libraries/autoload.php';

    // unset($_SESSION['LUXURIAFE']['cart']); exit;
    
    $result = array();
    $result['success'] = 'false';
    $result['message'] = "Oops! Failed to add this item. Try again!";
    // $_SESSION['LUXURIAFE']['cart'] = array();
    if(isset($_POST)):
        $total_items = count($_SESSION['LUXURIAFE']['cart'] ?? array());

        // CHECK IF THERE IS AVAILABLE INVENTORY
        $remainingStock = $db->queryFirstRow("SELECT itemStock,itemName FROM ecom_product WHERE itemID = '{$_POST['product']}'");
        $stock = $remainingStock['itemStock'];
        $name  = $remainingStock['itemName'];

        if($stock > 0):
            if($stock > $_POST['qty']):
                $_SESSION['LUXURIAFE']['cart'][$_POST['product']]['product'] = $_POST['product'];
                $_SESSION['LUXURIAFE']['cart'][$_POST['product']]['qty']     = $_POST['qty'];

                $result['success']    = 'true';
                $result['message']    = "Item <b>{$name}</b> has been added to your shopping bag!";
                $result['totalItems'] = count($_SESSION['LUXURIAFE']['cart'] ?? array());
            else:
                $result['message']    = "Your quantity is greater than the remaning stock.<br/>Remaining stock: {$stock}";
                $result['totalItems'] = $total_items;
            endif;
        else:
            $result['message']    = "Too late! {$name} is already sold out!";
            $result['totalItems'] = $total_items;
        endif;

    endif;
    echo json_encode($result);
?>