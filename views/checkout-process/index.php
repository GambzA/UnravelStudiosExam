<?php 
	//Merchant's account information
	$merchant_id = "JT01";			//Get MerchantID when opening account with 2C2P
	$secret_key = "7jYcp4FxFdf0";	//Get SecretKey from 2C2P PGW Dashboard
	
	//Transaction information
	$payment_description  = '2 days & 1 night hotel room';
	$order_id  = time();
	$currency = "702";
	$amount  = '000000000100';
	
	//Request information
	$version = "8.5";	
	$payment_url = "https://demo2.2c2p.com/2C2PFrontEnd/RedirectV3/payment";
	$result_url_1 = "http://localhost/devPortal/V3_UI_PHP_JT01_devPortal/result.php";
	
	//Construct signature string
	$params = $version.$merchant_id.$payment_description.$order_id.$currency.$amount.$result_url_1;
	$hash_value = hash_hmac('sha256',$params, $secret_key,false);	//Compute hash value
	
	echo 'Payment information:';
	echo '<html> 
	<body>
	<form id="myform" method="post" action="'.$payment_url.'">
		<input type="hidden" name="version" value="'.$version.'"/>
		<input type="hidden" name="merchant_id" value="'.$merchant_id.'"/>
		<input type="hidden" name="currency" value="'.$currency.'"/>
		<input type="hidden" name="result_url_1" value="'.$result_url_1.'"/>
		<input type="hidden" name="hash_value" value="'.$hash_value.'"/>
    PRODUCT INFO : <input type="hidden" name="payment_description" value="'.$payment_description.'"  readonly/><br/>
		ORDER NO : <input type="hidden" name="order_id" value="'.$order_id.'"  readonly/><br/>
		AMOUNT: <input type="hidden" name="amount" value="'.$amount.'" readonly/><br/>
		
	</form>  
	
	<script type="text/javascript">
		document.forms.myform.submit();
	</script>
	</body>
	</html>';	 
?>