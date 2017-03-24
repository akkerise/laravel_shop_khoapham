<?php $__env->startSection('content'); ?>
<?php $__env->startSection('description'); ?>
AkKe Home
<?php $__env->stopSection(); ?>

<!-- Featured Product-->

<?php
$products         = DB::table('products')->select()->orderBy('id', 'DESC')->skip(0)->take(4)->get();
$products_lastest = DB::table('products')->select()->orderBy('id', 'ASC')->skip(0)->take(4)->get();
?>
<section id="featured" class="row mt40">
  <div class="container" id="top">
    <h1 class="heading1"><span class="maintext">Featured Products</span><span class="subtext"> See Our Most featured Products</span></h1>
    <ul id="featured_products" class="thumbnails">

      <?php if(!empty($products)): ?>
      <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
      
      <li class="span3 fix-price">
        <a class="prdocutname" href="<?php echo e(route('productDetail',[$product->id,$product->name])); ?>"><?php echo e($product->name); ?></a>
        <div class="thumbnail">
          <span class="sale tooltip-test">Sale</span>
          <a href="#"><img alt="" src="<?php echo e(secure_url('/image/'). "/" . $product->image); ?>"></a>
          <div class="pricetag">
            <span class="spiral"></span><a href="<?php echo e(route('addCart',[$product->id])); ?>" class="productcart">ADD TO CART</a>
            <div class="price">
              <div class="pricenew">VNĐ <?php echo e(number_format($product->price)); ?></div>
            </div>
          </div>
        </div>
      </li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      <?php endif; ?>
      
        <input id="token" id="token" type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <button id="loadMore" class="btn btn-info"  onclick="loadMore()">Load More</button>
      
      <div id="data"></div>


    </ul>
  </div>
</section>

<!-- Latest Product-->
<section id="latest" class="row">
  <div class="container">
    <h1 class="heading1"><span class="maintext">Latest Products</span><span class="subtext"> See Our  Latest Products</span></h1>
    <ul class="thumbnails">
      <?php if(!empty($products_lastest)): ?>
        <?php $__currentLoopData = $products_lastest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        
        <li class="span3 fix-price">
          <a class="prdocutname" href="<?php echo e(route('productDetail',[$product->id,$product->name])); ?>"><?php echo e($product->name); ?></a>
          <div class="thumbnail">
            <span class="sale tooltip-test">Sale</span>
            <a href="#"><img alt="" src="<?php echo e(secure_url('/image/'). "/" . $product->image); ?>"></a>
            <div class="pricetag">
              <span class="spiral"></span><a href="<?php echo e(route('addCart',[$product->id,$product->name])); ?>" class="productcart">ADD TO CART</a>
              <div class="price">
                <div class="pricenew">VNĐ <?php echo e(number_format($product->price)); ?></div>
              </div>
            </div>
          </div>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      <?php endif; ?>
    </ul>
  </div>
</section>
<?php $__env->stopSection(); ?>
<script>
  var page = 0;
function loadMore(){
  var token = $('#token').val();
  page++;
  $.ajax({
      method: "get",
      url: "https://limitless-peak-35722.herokuapp.com/ajax-loadmore?page=" + page,
      data: {token: token},
      success: function (obj) {
          obj = $.parseJSON(obj);
//          console.log(obj.data);
          var arrObject = obj.data;
          var htmlli = '';
          if (arrObject.length > 0){
              for (i=0;i<4;i++){
                  htmlli += '<li class="span3 fix-price"> <a class="prdocutname" href="https://limitless-peak-35722.herokuapp.com/product-detail/'+ arrObject[i].id + '?' + arrObject[i].name+'">' + arrObject[i].name + '</a> <div class="thumbnail"> <span class="sale tooltip-test">Sale</span> <a href="#"><img alt="" src="https://limitless-peak-35722.herokuapp.com/image/'+ arrObject[i].image +'"></a> <div class="pricetag"> <span class="spiral"></span><a href="https://limitless-peak-35722.herokuapp.com/add-cart/'+ arrObject[i].id +'" class="productcart">ADD TO CART</a> <div class="price"> <div class="pricenew">VNĐ '+ arrObject[i].price +'</div> </div> </div> </div> </li>';
              }
          }else{
              $('#top').append('<h1>Not More Result</h1>');
          }
//          console.log(htmlli);
          var html = '<ul id="featured_products" class="thumbnails">'+ htmlli +'</ul>';
          var loadMore = $('#loadMore').remove();
          $('#top').append(html);
          $('#top').append('<button id="loadMore" class="btn btn-info"  onclick="loadMore()">Load More</button>');
      },
      error: function () {
          console.log('Error Parse Data');
      }
  });
}

</script>

<?php echo $__env->make('shop.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>