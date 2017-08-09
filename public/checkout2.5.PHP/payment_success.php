<?php
	require_once('config.php');
	require_once('include/lib/nusoap.php');
	require_once('include/nganluong.microcheckout.class.php');
	//khai bao
	$obj = new NL_MicroCheckout(MERCHANT_ID, MERCHANT_PASS, URL_WS);
	
	if ($obj->checkReturnUrlAuto()) {
		$inputs = array(
			'token'		=> $obj->getTokenCode(),//$token_code,
		);
	
		$result = $obj->getExpressCheckout($inputs);
		
		//var_dump($result);
		if ($result != false) {
			if ($result['result_code'] != '00') {
				die('Mã lỗi '.$result['result_code'].' ('.$result['result_description'].') ');
			}
		} else {
			die('Lỗi kết nối tới cổng thanh toán Ngân Lượng');
		}
	} else {
		die('Tham số truyền không đúng');
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thanh toan thanh cong</title>
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
<?php
	if (isset($result) && !empty($result)) {
		if ($result['result_code'] == '00') {
?>
	<table border="1" cellpadding="3" cellspacing="0" style="border-collapse:collapse;" width="600">
		<tr><th colspan="2">Thông tin đơn hàng</th></tr>
		<tr><td width="200">Mã đơn hàng</td><td><?php echo @$_GET['order_code'];?></td></tr>
		<tr><td>Mã giao dịch</td><td><?php echo $result['transaction_id'];?></td></tr>
		<tr><td>Loại giao dịch</td><td><?php echo ($result['transaction_type'] == 1 ? 'Thanh toán ngay' : 'Thanh toán tạm giữ');?></td></tr>
		<tr><td>Trạng thái</td><td><?php echo $result['transaction_status'];?></td></tr>
		<tr><td>Số tiền</td><td><?php echo $result['amount'];?></td></tr>
		<tr><td>Hình thức thanh toán</td><td><?php echo $result['method_payment_name'];?></td></tr>
		<tr><td>Tên người mua</td><td><?php echo $result['payer_name'];?></td></tr>
		<tr><td>Email người mua</td><td><?php echo $result['payer_email'];?></td></tr>
		<tr><td>Điện thoại người mua</td><td><?php echo $result['payer_mobile'];?></td></tr>
	</table>
<?php			
		} else {
			echo $result['result_description'];
		}
	}
?>
</div>
</body>
</html>
