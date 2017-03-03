<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>AkKe Shop</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="@yield('description')">
<meta name="author" content="">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300italic,400italic,600,600italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
<link href="{{ secure_url('/shop/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ secure_url('/shop/css/bootstrap-responsive.css') }}" rel="stylesheet">
<link href="{{ secure_url('/shop/css/style.css') }}" rel="stylesheet">
<link href="{{ secure_url('/shop/css/flexslider.css') }}" type="text/css" media="screen" rel="stylesheet"  />
<link href="{{ secure_url('/shop/css/jquery.fancybox.css') }}" rel="stylesheet">
<link href="{{ secure_url('/shop/css/cloud-zoom.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ secure_url('/shop/css/mystyle.css') }}">


<!-- Latest compiled and minified CSS -->
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> --}}
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<!-- fav -->
<link rel="shortcut icon" href="{{ asset('/shop/assets/ico/favicon.html') }}">
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
<script src="{{ secure_url('shop.js.jquery.js') }}"></script>
  {{--<script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>--}}
  {{--<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>--}}
<script src="{{ secure_url('/shop/js/bootstrap.js') }}"></script>
<script src="{{ secure_url('/shop/js/respond.min.js') }}"></script>
<script src="{{ secure_url('/shop/js/application.js') }}"></script>
<script src="{{ secure_url('/shop/js/bootstrap-tooltip.js') }}"></script>
<script defer src="{{ secure_url('/shop/js/jquery.fancybox.js') }}"></script>
<script defer src="{{ secure_url('/shop/js/jquery.flexslider.js') }}"></script>
<script type="text/javascript" src="{{ secure_url('/shop/js/jquery.tweet.js') }}"></script>
<script type="text/javascript" src="{{ secure_url('/shop/js/cloud-zoom.1.0.2.js') }}"></script>
<script  type="text/javascript" src="{{ secure_url('/shop/js/jquery.validate.js') }}"></script>
<script type="text/javascript"  src="{{ secure_url('/shop/js/jquery.carouFredSel-6.1.0-packed.js') }}"></script>
<script type="text/javascript"  src="{{ secure_url('/shop/js/jquery.mousewheel.min.js') }}"></script>
<script type="text/javascript"  src="{{ secure_url('/shop/js/jquery.touchSwipe.min.js') }}"></script>
<script type="text/javascript"  src="{{ secure_url('/shop/js/jquery.ba-throttle-debounce.min.js') }}"></script>
<script defer src="{{ secure_url('/shop/js/custom.js') }}"></script>
<script src="{{ secure_url('/shop/js/myscript.js') }}"></script>
</body>
</html>
