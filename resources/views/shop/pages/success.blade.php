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
            // $inputs = [
            //     'receiver' => RECEIVER,
            //     'order_code' => 'DH-'.date('His-dmY'),
            //     'return_url' => url('/thanhtoanthanhcong'),
            //     'cancel_url' => 'https://www.limitless-peak-35722.herokuapp.com',
            //     'language' => 'vn'
            // ];
            // $link_checkout = '';
            // $obj = new NL_MicroCheckout(MERCHANT_ID,MERCHANT_PASS,URL_WS);
            // $result = $obj->setExpressCheckoutDeposit($inputs);
            // if($result != false){
            //     if($result['result_code'] == '00'){
            //         $link_checkout = $result['link_checkout'];
            //         $link_checkout = str_replace('micro_checkout.php?token','index.php?portal=checkout&page=micro_checkout&token_code=', $link_checkout);
            //         $link_checkout .='&payment_option=nganluong';
            //     } else{
            //         die('Mã lỗi '.$result['result_code'].' ('.$result['result_description'].') ');
            //     }
            // } else {
            //     die('Loi ket noi toi cong thanh toan ngan luong');
            // }
            
            var_dump($_GET['payment_id']);
            var_dump($_GET['secure_code']);
            exit;
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
