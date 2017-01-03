@extends('shop.master')
@section('content')
@section('description')
AkKe Category
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
        <li class="active">Category</li>
      </ul>
      <div class="row">
        <!-- Sidebar Start-->
        <aside class="span3">
         <!-- Category-->
          <div class="sidewidt">
            <h2 class="heading2"><span>Categories</span></h2>
            <ul class="nav nav-list categories">
              @if (isset($menu_cates))
                @foreach ($menu_cates as $item)
                  <li>
                    <a href="{{ route('listProductsDetail',$item->id,$item->alias) }}">{{ $item->name }}</a>
                  </li>
                @endforeach
              @endif
            </ul>
          </div>
         <!--  Best Seller -->
          <div class="sidewidt">
            <h2 class="heading2"><span>Newest Products</span></h2>
            <ul class="bestseller">
            @if(isset($newest_products))
              @foreach($newest_products as $np)
              {{ $cate_name = DB::table('cates')->select('name')->where('id',$np->cate_id)->get() }}
              {{ dd($cate_name[0]->name) }}
              <li>
                <img width="50" height="50" src="{{ asset('/image/'.$np->image) }}" alt="product" title="product">
                <a class="productname" href="{{ route('productDetail',[$np->id,$np->name]) }}">{{ $np->name }}</a>
                <span class="procategory">{{ $cate_name->name }}</span>
                <span class="price">{{ number_format($np->price,0,',','.') }} VNĐ</span>
              </li>
              @endforeach
            @endif
            </ul>
          </div>
          <!-- Latest Product -->
          <div class="sidewidt">
            <h2 class="heading2"><span>Latest Products</span></h2>
            <ul class="bestseller">
            @if (!empty($lastest_product))
              @foreach ($lastest_product as $item)
              {{ $cate_name_lastet_product = DB::table('cates')->select('name')->where('id',$item->cate_id)->get() }}
                <li>
                  <img width="50" height="50" src="{{ asset('/image/'.$item->image) }}" alt="product" title="product">
                  <a class="productname" href="{{ route('productDetail',[$item->id,$item->name]) }}"> {{ $item->name }}</a>
                  <span class="procategory">{{ $cate_name_lastet_product->name }}</span>
                  <span class="price">{{ number_format($item->price,0,',','.') }} VNĐ</span>
                </li>
              @endforeach
            @endif
            </ul>
          </div>
          <!--  Must have -->
          <div class="sidewidt">
          <h2 class="heading2"><span>Must have</span></h2>
          <div class="flexslider" id="mainslider">
            <ul class="slides">
              <li>
                <img src="{{ asset('/shop/img/product1.jpg') }}" alt="" />
              </li>
              <li>
                <img src="{{ asset('/shop/img/product2.jpg') }}" alt="" />
              </li>
            </ul>
          </div>
          </div>
        </aside>
        <!-- Sidebar End-->
        <!-- Category-->
        <div class="span9">
          <!-- Category Products-->
          <section id="category">
            <div class="row">
              <div class="span9">
               <!-- Category-->
                <section id="categorygrid">
                  <ul class="thumbnails grid">
					@if(!empty($list_products))
					@foreach($list_products as $product)
                    <li class="span3">
                      <a class="prdocutname" href="{{ route('productDetail',[$product->id,$product->name]) }}">{{ $product->name }}</a>
                      <div class="thumbnail">
                        <span class="sale tooltip-test">Sale</span>
                        <a href="#"><img alt="" src="{{ asset('image/'.$product->image) }}"></a>
                        <div class="pricetag">
                          <span class="spiral"></span><a href="#" class="productcart">ADD TO CART</a>
                          <div class="price">
                            <div class="pricenew">{{ number_format($product->price,0,',','.') }} VNĐ</div>
                          </div>
                        </div>
                      </div>
                    </li>
                    @endforeach
					@endif
                  </ul>
                  <div class="pagination pull-right">
                    <ul>
                      @if ($list_products->currentPage() != 1)
                        <li><a href="{{ str_replace('/?','?',$list_products->url($list_products->currentPage() - 1)) }}">Prev</a>
                        </li>
                      @endif
                      @for ($i=1 ; $i <= $list_products->lastPage() ; $i++)
                        <li class="{{ ($list_products->currentPage() == $i) ? 'active' : '' }}">
                          <a href="{{ str_replace('/?','?',$list_products->url($i)) }}">{{ $i }}</a>
                        </li>
                      @endfor
                      @if ($list_products->currentPage() != $list_products->lastPage())
                        <li><a href="{{ str_replace('/?','?',$list_products->url($list_products->currentPage() + 1)) }}">Next</a>
                        </li>
                      @endif
                    </ul>
                  </div>
                </section>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

@endsection
