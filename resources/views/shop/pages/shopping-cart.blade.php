@extends('shop.master')
@section('content')
@section('description')
AkKe Product Detail
@endsection
@section('content')
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
    <div class="cart-info">
      <table class="table table-striped table-bordered">
        <tr>
          <th class="image">Image</th>
          <th class="name">Product Name</th>
          <th class="quantity">Qty</th>
          <th class="total">Action</th>
          <th class="price">Unit Price</th>
          <th class="total">Total</th>

        </tr>
        <form action="" method="post" accept-charset="utf-8">
          <input class="token" type="hidden" name="_token" value="{{ csrf_token() }}">
          @if(count($cart)>0)
          @foreach ($cart as $p)
          <tr>
            <td class="image"><a href="#"><img title="product" alt="product" src="{{ asset('/image/'.$p->options['img']) }}" height="50" width="50"></a></td>
            <td  class="name"><a href="#">{{ $p->name }}</a></td>
            <td class="quantity"><input class="qty span1" type="text" size="1" value="{{ $p->qty }}" name="quantity[40]">

            </td>
            <td class="total"> <a href="#" class="update_cart" id={{ $p->rowId }}><img class="tooltip-test" data-original-title="Update" src="{{ asset('/shop/img/update.png') }}" alt=""></a>
              <a href="{{ route('deleteIdCart',[$p->rowId]) }}"><img class="tooltip-test" data-original-title="Remove"  src="{{ asset('/shop/img/remove.png') }}" alt=""></a></td>


              <td id="price" class="price">VNĐ {{ number_format($p->price,0,',','.') }}</td>
              <td class="total">VNĐ {{ number_format(($p->price) * ($p->qty),0,',','.') }}</td>
            </tr>
            @endforeach
            @endif
          </form>
        </table>
      </div>
      <div class="container">
        <div class="pull-right">
          <div class="span4 pull-right">
            <table class="table table-striped table-bordered ">
              <tr>
                <td><span class="extra bold totalamout">Total :</span></td>
                <td><span class="bold totalamout">VNĐ {{ $cartTotal }}</span></td>
              </tr>
            </table>
            
              <input type="submit" value="CheckOut" class="btn btn-orange pull-right">
              <form action="{{ url('/sentdatanl') }}" onsubmit="return check()" method="post" accept-charset="utf-8">
                <input  type="submit" name="submit" value="Thanh Toán"></td></tr> 
              </form>
              <input type="submit" value="Continue Shopping" class="btn btn-orange pull-right mr10">
            
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

@endsection
