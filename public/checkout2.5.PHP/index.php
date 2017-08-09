<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Test ket noi ngan luong</title>
</head>
<body>
<table border="1" cellpadding="10" cellspacing="0" width="600">
	<tr><td colspan="2"><h1>Lựa chọn quy trình test</h1></td></tr>
	<tr>
		<td width="300"><a href="cart.php"><strong>Test quy trình thanh toán giỏ hàng</strong></a></td>
		<td><a href="deposit.php"><strong>Test quy trình nạp tiền</strong></a></td>
	</tr>
	
	
</table>
	
	<?PHP
	
	
	$request='&title=title';
	$request .='&price=1000000';
	$request .='&quantity=1';
	$request .='&shipping=0';
	$request .='&receiver=hoantx@nganluong.vn';
	$request .='&product_id=product_id';
	$request .='&product_name=Tên sản phẩm';
	$request .='&return_url=htpp://nganluong.vn';
	$url='http://beta.nganluong.vn/?portal=checkout&page=checkout_express'.$request;
    	
	?>
	
	
	<style>
		.tbox {position:absolute; display:none; padding:14px 17px; z-index:900}
		
		.tmask {position:absolute; display:none; top:0px; left:0px; height:100%; width:100%; background:#000; z-index:800}
		.tclose {position:absolute; top:0px; right:0px; width:30px; height:30px; cursor:pointer; background:url(images/close.png) no-repeat}
		.tclose:hover {background-position:0 -30px}
	</style>
	
</body>
</html>