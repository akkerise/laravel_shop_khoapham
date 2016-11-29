<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>AkKe Shop</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="@yield('description')">
<meta name="author" content="">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,400italic,600,600italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
<link href="{{ url('/shop/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ url('/shop/css/bootstrap-responsive.css') }}" rel="stylesheet">
<link href="{{ url('/shop/css/style.css') }}" rel="stylesheet">
<link href="{{ url('/shop/css/flexslider.css') }}" type="text/css" media="screen" rel="stylesheet"  />
<link href="{{ url('/shop/css/jquery.fancybox.css') }}" rel="stylesheet">
<link href="{{ url('/shop/css/cloud-zoom.css') }}" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<!-- fav -->
<link rel="shortcut icon" href="assets/ico/favicon.html">
</head>
<body>
<!-- Header Start -->
<header>
  @include('shop.blocks.header')
  <div class="container">
    @include('shop.blocks.nav')

  </div>
</header>
<!-- Header End -->

<div id="maincontainer">
  <!-- Slider Start-->
  @include('shop.blocks.slider')
  <!-- Slider End-->

  <!-- Section Start-->
  @include('shop.blocks.ortherdetail')
  <!-- Section End-->
  @yield('content')
  <!-- Featured Product-->
  {{-- @include('shop.blocks.feature') --}}

  <!-- Latest Product-->
  {{-- @include('shop.blocks.lastest') --}}

<!-- Footer -->
@include('shop.blocks.footer')
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ url('/shop/js/jquery.js') }}"></script>
<script src="{{ url('/shop/js/bootstrap.js') }}"></script>
<script src="{{ url('/shop/js/respond.min.js') }}"></script>
<script src="{{ url('/shop/js/application.js') }}"></script>
<script src="{{ url('/shop/js/bootstrap-tooltip.js') }}"></script>
<script defer src="{{ url('/shop/js/jquery.fancybox.js') }}"></script>
<script defer src="{{ url('/shop/js/jquery.flexslider.js') }}"></script>
<script type="text/javascript" src="{{ url('/shop/js/jquery.tweet.js') }}"></script>
<script  src="{{ url('/shop/js/cloud-zoom.1.0.2.js') }}"></script>
<script  type="text/javascript" src="{{ url('/shop/js/jquery.validate.js') }}"></script>
<script type="text/javascript"  src="{{ url('/shop/js/jquery.carouFredSel-6.1.0-packed.js') }}"></script>
<script type="text/javascript"  src="{{ url('/shop/js/jquery.mousewheel.min.js') }}"></script>
<script type="text/javascript"  src="{{ url('/shop/js/jquery.touchSwipe.min.js') }}"></script>
<script type="text/javascript"  src="{{ url('/shop/js/jquery.ba-throttle-debounce.min.js') }}"></script>
<script defer src="{{ url('/shop/js/custom.js') }}"></script>
</body>
</html>