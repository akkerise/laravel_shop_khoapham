<?php
	require_once('config.php');
	require_once('include/lib/nusoap.php');
	require_once('include/nganluong.microcheckout.class.php');
	
	$inputs = array(
		'receiver'		=> RECEIVER,
		'order_code'	=> 'DH-'.date('His-dmY'),
		'return_url'	=> $_SERVER['HTTP_REFERER'].'/payment_success.php',
		'cancel_url'	=> '',
		'language'		=> 'vn'
	);
	$link_checkout = '';
	$obj = new NL_MicroCheckout(MERCHANT_ID, MERCHANT_PASS, URL_WS);
	$result = $obj->setExpressCheckoutDeposit($inputs);
	if ($result != false) {
		if ($result['result_code'] == '00') {
			$link_checkout = $result['link_checkout'];
			$link_checkout = str_replace('micro_checkout.php?token=', 'index.php?portal=checkout&page=micro_checkout&token_code=', $link_checkout);
			$link_checkout .='&payment_option=nganluong';
		} else {
			die('Ma loi '.$result['result_code'].' ('.$result['result_description'].') ');
		}
	} else {
		die('Loi ket noi toi cong thanh toan ngan luong');
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Nap tien he thong</title>
<style type="text/css">
body {
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
	color:#333;
}
.center {
	margin:50px auto;
	width:800px;
}
.button {
	color:#FF6633;
	font-weight:bold;
}
</style>
</head>
<body>
<div class="center">
	<h3>Yêu cầu nạp tiền</h3>
	<input class="button" type="button" id="btn_deposit" value="Nạp tiền" />
</div>
<script language="javascript" src="include/nganluong.apps.mcflow.js"></script>
<script language="javascript">
	var mc_flow = new NGANLUONG.apps.MCFlow({trigger:'btn_deposit',url:'<?php echo @$link_checkout;?>'});
</script>
</body>
</html>
