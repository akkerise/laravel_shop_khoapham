<?php
	require_once('config.php');
	require_once('include/lib/nusoap.php');
	require_once('include/nganluong.microcheckout.class.php');
	
	if (isset($_POST['index']) && !empty($_POST['index'])) {
		$index = $_POST['index'];
		$name = $_POST['name'];
		$quanty = $_POST['quanty'];
		$price = $_POST['price'];
		$amount = 0;
		$items = array();
		foreach ($index as $i) {
			$amount+= $price[$i]*$quanty[$i];
			$items[$i] = array(
				'item_name'		=> $name[$i],
				'item_quanty'	=> $quanty[$i],
				'item_amount'	=> $price[$i]
			);
		}
		
		$return_url = $_SERVER['HTTP_REFERER'].'/payment_success.php';
		$cancel_url = $_SERVER['HTTP_REFERER'];
		//$receiver = '';
		$inputs = array(
			'receiver'		=> RECEIVER,
			'order_code'	=> 'Đơn hàng-'.date('His-dmY'),
			'amount'		=> $amount,
			'currency_code'	=> 'vnd',
			'tax_amount'	=> '0',
			'discount_amount'	=> '0',
			'fee_shipping'	=> '0',
			'request_confirm_shipping'	=> '0',
			'no_shipping'	=> '1',
			'return_url'	=> $return_url,
			'cancel_url'	=> $cancel_url,
			'language'		=> 'vi',
			'items'			=> $items
		);
		$link_checkout = '';
		$obj = new NL_MicroCheckout(MERCHANT_ID, MERCHANT_PASS, URL_WS);
		$result = $obj->setExpressCheckoutPayment($inputs);
		if ($result != false) {
			if ($result['result_code'] == '00') {
				$link_checkout = $result['link_checkout'];
				
			} else {
				die('Mã lỗi '.$result['result_code'].' ('.$result['result_description'].') ');
			}
		} else {
			die('Lỗi kết nối tới cổng thanh toán Ngân Lượng');
		}
	}
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thanh toan don hang</title>
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
	<h3>Thông tin đơn hàng</h3>
	<table border="1" cellpadding="3" cellspacing="0" style="border-collapse:collapse;">
		<tr>
			<th width="30">#</th>
			<th width="250" align="left">Tên sản phẩm</th>
			<th width="90">Số lượng</th>
			<th width="100">Giá tiền <u>(đ)</u></th>
		</tr>
<?php
	if (isset($items)) {
		foreach ($items as $i=>$row) {
?>
		<tr>
			<td align="center"><?php echo $i;?></td>
			<td><?php echo $row['item_name'];?></td>
			<td align="center"><?php echo $row['item_quanty'];?></td>
			<td align="right"><?php echo $row['item_amount'];?> đ</td>
		</tr>		
<?php	
		}
	}
?>		
		<tr>
			<td colspan="4" align="right"><input type="button" value="Chọn lại sản phẩm" onclick="document.location.href='cart.php';" /><input class="button" type="button" id="btn_payment" value="Thanh toán" /></td>
		</tr>
	</table>
</div>
<script language="javascript" src="include/nganluong.apps.mcflow.js"></script>
<script language="javascript">
var mc_flow = new NGANLUONG.apps.MCFlow({trigger:'btn_payment',url:'<?php echo @$link_checkout;?>'});
</script>
</body>
</html>
