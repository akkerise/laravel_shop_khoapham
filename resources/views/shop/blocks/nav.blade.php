<div id="categorymenu">
  <nav class="subnav">
    <ul class="nav-pills categorymenu">
<?php
$cate_level_1 = DB::table('cates')->where('parent_id', 1)->get();
?>
<li><a href="{{ secure_url('/') }}">Trang Chủ</a></li>
      @foreach($cate_level_1 as $item_level_1)
      <li><a class=""  href="{{ route('listProducts',[
        $item_level_1->id,$item_level_1->name
      ]) }}">{{ $item_level_1->name }}</a>
        <div>
          <ul>
<?php
$cate_level_2 = DB::table('products')->where('cate_id', $item_level_1->id)->get();
// echo "<pre>";
// var_dump($cate_level_2);
// echo "</pre>";
?>

            @foreach($cate_level_2 as $item_level_2)

            <li><a href="{{ route('listProductsDetail',$item_level_1->id) }}">{{ $item_level_2->name }}</a></li>
            @endforeach
          </ul>
        </div>
      </li>
      @endforeach
      <li><a href="{{ secure_url('/contact') }}">Liên Hệ</a></li>
    </ul>
  </nav>
</div>
