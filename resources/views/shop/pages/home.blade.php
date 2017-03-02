@extends('shop.master')
@section('content')
@section('description')
AkKe Home
@endsection

<!-- Featured Product-->
{{-- {{ dd($cates) }} --}}
<?php
$products         = DB::table('products')->select()->orderBy('id', 'DESC')->skip(0)->take(4)->get();
$products_lastest = DB::table('products')->select()->orderBy('id', 'ASC')->skip(0)->take(4)->get();
?>
<section id="featured" class="row mt40">
  <div class="container">
    <h1 class="heading1"><span class="maintext">Featured Products</span><span class="subtext"> See Our Most featured Products</span></h1>
    <ul class="thumbnails">

      @if(!empty($products))
      @foreach($products as $product)
      {{-- {{ dd($products) }} --}}
      <li class="span3 fix-price">
        <a class="prdocutname" href="{{ route('productDetail',[$product->id,$product->name]) }}">{{ $product->name }}</a>
        <div class="thumbnail">
          <span class="sale tooltip-test">Sale</span>
          <a href="#"><img alt="" src="{{ secure_url('/image/'). "/" . $product->image }}"></a>
          <div class="pricetag">
            <span class="spiral"></span><a href="{{ route('addCart',[$product->id]) }}" class="productcart">ADD TO CART</a>
            <div class="price">
              <div class="pricenew">VNĐ {{ number_format($product->price) }}</div>
            </div>
          </div>
        </div>
      </li>
      @endforeach
      @endif
      {{-- <form class="" action="" method="post"> --}}
        <input id="token" id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
        <button class="btn btn-info"  onclick="loadMore()">Load More</button>
      {{-- </form> --}}
      <div id="data"></div>


    </ul>
  </div>
</section>

<!-- Latest Product-->
<section id="latest" class="row">
  <div class="container">
    <h1 class="heading1"><span class="maintext">Latest Products</span><span class="subtext"> See Our  Latest Products</span></h1>
    <ul class="thumbnails">
      @if(!empty($products_lastest))
        @foreach($products_lastest as $product)
        {{-- {{ dd($products) }} --}}
        <li class="span3 fix-price">
          <a class="prdocutname" href="{{ route('productDetail',[$product->id,$product->name]) }}">{{ $product->name }}</a>
          <div class="thumbnail">
            <span class="sale tooltip-test">Sale</span>
            <a href="#"><img alt="" src="{{ secure_url('/image/'). "/" . $product->image }}"></a>
            <div class="pricetag">
              <span class="spiral"></span><a href="{{ route('addCart',[$product->id,$product->name]) }}" class="productcart">ADD TO CART</a>
              <div class="price">
                <div class="pricenew">VNĐ {{ number_format($product->price) }}</div>
              </div>
            </div>
          </div>
        </li>
        @endforeach
      @endif
    </ul>
  </div>
</section>
@endsection
<script>
function loadMore(){
  // var token = $(this).parent().parent().parent().find('.token').val();
  // $.post('/', {'_token':token ,'qty':4}
  //       ,function(result){
  //           console.log(result);
  //         });
  var token = $('#token').val();
//  var qty+=4;
  $.get('/ajax/',
    {token: token, qty: qty},
    function(data) {
      // $('.container').html(data.id);

      var list = "<div>";
      for (var i = 0; i < data.length; i++) {
        list += '<li class="span3 fix-price"> <a class="prdocutname" href="/product-detail/' + data[i].id + '"></a> <div class="thumbnail"> <span class="sale tooltip-test" data-original-title="">Sale</span> <a href="#"><img alt="" src="/image/' + data[i].image + '"></a> <div class="pricetag"> <span class="spiral"></span><a href="/add-cart/' +data[i].id+ '/" class="productcart">ADD TO CART</a> <div class="price"> <div class="pricenew">VNĐ '+ data[i].price +'</div> </div> </div> </div> </li>';
      }
      list += "</div>";
      console.log(list);
      $('#data').html(list);
  });
}

</script>
