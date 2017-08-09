<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thong tin don hang</title>
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
	<form method="post" action="payment.php">
	<table border="1" cellpadding="3" cellspacing="0" style="border-collapse:collapse;">
		<tr>
			<th width="30">#</th>
			<th width="250" align="left">Tên sản phẩm</th>
			<th width="90">Số lượng</th>
			<th width="100">Giá tiền <u>(đ)</u></th>
		</tr>
		<tr>
			<td align="center"><input type="checkbox" name="index[]" value="0" /></td>
			<td>Sản phẩm 1<input type="hidden" name="name[]" value="Sản phẩm 1" /></td>
			<td align="center"><input type="text" name="quanty[]" value="1" style="width:60px; text-align:center;" /></td>
			<td align="right">4000<input type="hidden" name="price[]" value="4000" /></td>
		</tr>
		<tr>
			<td align="center"><input type="checkbox" name="index[]" value="1" /></td>
			<td>Sản phẩm 2<input type="hidden" name="name[]" value="Sản phẩm 2" /></td>
			<td align="center"><input type="text" name="quanty[]" value="1" style="width:60px; text-align:center;" /></td>
			<td align="right">6000<input type="hidden" name="price[]" value="6000" /></td>
		</tr>
		<tr>
			<td align="center"><input type="checkbox" name="index[]" value="2" /></td>
			<td>Sản phẩm 3<input type="hidden" name="name[]" value="Sản phẩm 3" /></td>
			<td align="center"><input type="text" name="quanty[]" value="1" style="width:60px; text-align:center;" /></td>
			<td align="right">7000<input type="hidden" name="price[]" value="7000" /></td>
		</tr>
		<tr>
			<td align="center"><input type="checkbox" name="index[]" value="3" /></td>
			<td>Sản phẩm 4<input type="hidden" name="name[]" value="Sản phẩm 4" /></td>
			<td align="center"><input type="text" name="quanty[]" value="1" style="width:60px; text-align:center;" /></td>
			<td align="right">8000<input type="hidden" name="price[]" value="8000" /></td>
		</tr>
		<tr>
			<td colspan="4" align="right"><input class="button" type="submit" value="Mua hàng" /></td>
		</tr>
	</table>
	</form>
</div>
</body>
</html>
