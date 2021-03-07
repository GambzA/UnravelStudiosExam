<?php
$custDetails = $db->queryFirstRow("SELECT * FROM ecom_customer WHERE customerID = '{$_SESSION["LUXURIAFE"]["cust"]}'");
$custID 	 = $custDetails['customerID'];
$total_items = count($_SESSION['LUXURIAFE']['cart'] ?? array());
$insertTransactionItem = array();
$grandTotal = 0;

if ($total_items > 0) :
	// COLLECT ALL PRODUCTS FIRST
	$products = array();
	$products = array_keys($_SESSION['LUXURIAFE']['cart']);

	// GET PRODUCT DETAILS
	$productDetails = $db->query("SELECT * FROM ecom_product WHERE itemID IN (" . implode(',', $products) . ") ");

	// INSERT TO TRANSACTION
	$db->insert('ecom_transaction', [
		'transactionNumber' => date('YmdHis'),
		'transactionDate' => date('Y-m-d H:i:s'),
		'customerID' => $custID,
		'grossTotal' => $grandTotal
	]);
	$transactionID = $db->insertId();

	foreach ($productDetails as $cartItems) :
		$insertTransactionItem[] = [
			'productID' => $cartItems['itemID'],
			'transactionID' => $transactionID,
			'transactionQty' => $_SESSION['LUXURIAFE']['cart'][$cartItems['itemID']]['qty'],
			'totalAmount' => $_SESSION['LUXURIAFE']['cart'][$cartItems['itemID']]['qty'] * $cartItems['itemPrice']
		];

		//SUBTRACT QUANTITY TO RESPECTIVE PRODUCTS
		$newStock = $cartItems['itemStock'] - $_SESSION['LUXURIAFE']['cart'][$cartItems['itemID']]['qty'];
		$db->update('ecom_product', ['itemStock' => $newStock], "itemID=%s", $cartItems['itemID']);


		$payment_description  .= "{$cartItems['itemName']} x{$_SESSION['LUXURIAFE']['cart'][$cartItems['itemID']]['qty']}, ";
		$grandTotal += $_SESSION['LUXURIAFE']['cart'][$cartItems['itemID']]['qty'] * $cartItems['itemPrice'];
	endforeach;

	$db->insert('ecom_transaction_item', $insertTransactionItem);

endif;

//Merchant's account information
$merchant_id = "JT01";			//Get MerchantID when opening account with 2C2P
$secret_key = "7jYcp4FxFdf0";	//Get SecretKey from 2C2P PGW Dashboard

//Transaction information

$order_id  = time();
$currency = "702";
$grandTotal  = $grandTotal."00";
$amount  = str_pad($grandTotal, 12, '0', STR_PAD_LEFT);

// echo $amount; exit;

//Request information
$version = "8.5";
$payment_url = "https://demo2.2c2p.com/2C2PFrontEnd/RedirectV3/payment";
$result_url_1 = URL_LINK . "views/checkout-process/return-url.php";

//Construct signature string
$params = $version . $merchant_id . $payment_description . $order_id . $currency . $amount . $result_url_1;
$hash_value = hash_hmac('sha256', $params, $secret_key, false);	//Compute hash value

echo '<html> 
	<body>
	<form id="myform" method="post" action="' . $payment_url . '">
		<input type="hidden" name="version" value="' . $version . '"/>
		<input type="hidden" name="merchant_id" value="' . $merchant_id . '"/>
		<input type="hidden" name="currency" value="' . $currency . '"/>
		<input type="hidden" name="result_url_1" value="' . $result_url_1 . '"/>
		<input type="hidden" name="hash_value" value="' . $hash_value . '"/>
    	<input type="hidden" name="payment_description" value="' . $payment_description . '"  readonly/><br/>
		<input type="hidden" name="order_id" value="' . $order_id . '"  readonly/><br/>
		<input type="hidden" name="amount" value="' . $amount . '" readonly/><br/>
		
	</form>  
	
	<script type="text/javascript">
		document.forms.myform.submit();
	</script>
	</body>
	</html>';
