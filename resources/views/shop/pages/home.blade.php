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
      <li class="span3">
        <a class="prdocutname" href="product.html">{{ $product->name }}</a>
        <div class="thumbnail">
          <span class="sale tooltip-test">Sale</span>
          <a href="#"><img alt="" src="{{ url('/image/'). "/" . $product->image }}"></a>
          <div class="pricetag">
            <span class="spiral"></span><a href="#" class="productcart">ADD TO CART</a>
            <div class="price">
              <div class="pricenew">${{ number_format($product->price) }}</div>
            </div>
          </div>
        </div>
      </li>
      @endforeach
      @endif
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
        <li class="span3">
          <a class="prdocutname" href="product.html">{{ $product->name }}</a>
          <div class="thumbnail">
            <span class="sale tooltip-test">Sale</span>
            <a href="#"><img alt="" src="{{ url('/image/'). "/" . $product->image }}"></a>
            <div class="pricetag">
              <span class="spiral"></span><a href="#" class="productcart">ADD TO CART</a>
              <div class="price">
                <div class="pricenew">${{ number_format($product->price) }}</div>
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