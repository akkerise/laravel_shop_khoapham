@extends('shop.master')
@section('content')
@section('description')
    AkKe Product Detail
@endsection
@section('content')
        <?php
            // include('../../../public/checkout2.5.PHP/include/lib/nusoap.php');
            // include('../../../public/checkout2.5.PHP/include/nganluong.apps.mcflow.js');
            // include('../../../public/checkout2.5.PHP/include/nganluong.microcheckout.class.php');
        ?>
        <?php
                include 'checkout20/config.php';
                include 'checkout20/lib/nganluong.class.php';
            if (isset($_GET['payment_id'])) {
                // Lấy các tham số để chuyển sang Ngânlượng thanh toán:

                $transaction_info =$_GET['transaction_info'];
                $order_code =$_GET['order_code'];
                $price =$_GET['price'];
                $payment_id =$_GET['payment_id'];
                $payment_type =$_GET['payment_type'];
                $error_text =$_GET['error_text'];
                $secure_code =$_GET['secure_code'];
                //Khai báo đối tượng của lớp NL_Checkout
                $nl= new NL_Checkout();
                $nl->merchant_site_code = MERCHANT_ID;
                $nl->secure_pass = MERCHANT_PASS;
                //Tạo link thanh toán đến nganluong.vn
                $checkpay= $nl->verifyPaymentUrl($transaction_info, $order_code, $price, $payment_id, $payment_type, $error_text, $secure_code);
                
                if ($checkpay) {	
                    echo 'Payment success: <pre>'; 
                    // bạn viết code vào đây để cung cấp sản phẩm cho người mua		
                    var_dump($_GET);
                }else{
                    echo "payment failed";
                }
                
            }
            
            // var_dump($_GET['payment_id']);
            // var_dump($_GET['secure_code']);
            // $transaction_info = $_GET['transaction_info'];
            // $order_code = $_GET['order_code'];
            // var_dump($_GET['token_nl']);
            // exit;
        ?>
    <div id="maincontainer">
        <section id="product">
            <div class="container">
                <!--  breadcrumb -->
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Home</a>
                        <span class="divider">/</span>
                    </li>
                    <li class="active"> Shopping Cart</li>
                </ul>
                <h1 class="heading1"><span class="maintext"> Shopping Cart</span><span class="subtext"> All items in your  Shopping Cart</span></h1>
                <!-- Cart-->
                {{--<div class="cart-info">--}}
                    {{--<table class="table table-striped table-bordered">--}}
                        {{--<tr>--}}
                            {{--<th class="image">Image</th>--}}
                            {{--<th class="name">Product Name</th>--}}
                            {{--<th class="quantity">Qty</th>--}}
                            {{--<th class="total">Action</th>--}}
                            {{--<th class="price">Unit Price</th>--}}
                            {{--<th class="total">Total</th>--}}

                        {{--</tr>--}}
                        {{--<form action="" method="post" accept-charset="utf-8">--}}
                            {{--<input class="token" type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                            {{--@if(count($cart)>0)--}}
                                {{--@foreach ($cart as $p)--}}
                                    {{--<tr>--}}
                                        {{--<td class="image"><a href="#"><img title="product" alt="product" src="{{ asset('/image/'.$p->options['img']) }}" height="50" width="50"></a></td>--}}
                                        {{--<td  class="name"><a href="#">{{ $p->name }}</a></td>--}}
                                        {{--<td class="quantity"><input class="qty span1" type="text" size="1" value="{{ $p->qty }}" name="quantity[40]">--}}

                                        {{--</td>--}}
                                        {{--<td class="total"> <a href="#" class="update_cart" id={{ $p->rowId }}><img class="tooltip-test" data-original-title="Update" src="{{ asset('/shop/img/update.png') }}" alt=""></a>--}}
                                            {{--<a href="{{ route('deleteIdCart',[$p->rowId]) }}"><img class="tooltip-test" data-original-title="Remove"  src="{{ asset('/shop/img/remove.png') }}" alt=""></a></td>--}}


                                        {{--<td id="price" class="price">VNĐ {{ number_format($p->price,0,',','.') }}</td>--}}
                                        {{--<td class="total">VNĐ {{ number_format(($p->price) * ($p->qty),0,',','.') }}</td>--}}
                                    {{--</tr>--}}
                                {{--@endforeach--}}
                            {{--@endif--}}
                        {{--</form>--}}
                    {{--</table>--}}
                {{--</div>--}}
                <div class="container">
                    {{--<div class="pull-right">--}}
                        {{--<div class="span4 pull-right">--}}
                            {{--<table class="table table-striped table-bordered ">--}}
                                {{--<tr>--}}
                                    {{--<td><span class="extra bold totalamout">Total :</span></td>--}}
                                    {{--<td><span class="bold totalamout">VNĐ {{ $cartTotal }}</span></td>--}}
                                {{--</tr>--}}
                            {{--</table>--}}
                            {{--<input type="submit" value="CheckOut" class="btn btn-orange pull-right">--}}
                            {{--<a target="_blank" href="http://sandbox.nganluong.vn:8088/nl30/button_payment.php?receiver=nguyenthanh.rise.88@gmail.com&product_name=111111&price=888888&return_url={{ secure_url('/thanhtoanthanhcong')  }}&comments='Bạn đã thanh toán thành công đơn hàng'"><img src="https://www.nganluong.vn/css/newhome/img/button/pay-sm.png"border="0" /></a>--}}
                            {{--<input type="submit" value="Continue Shopping" class="btn btn-orange pull-right mr10">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <h1 class="heading1">{{ $msg }}</h1>' + '<br><a href="{{ $link }}"></a>
                </div>
            </div>
        </section>
    </div>
@endsection
@endsection
