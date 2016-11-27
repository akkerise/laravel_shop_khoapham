<div id="categorymenu">
  <nav class="subnav">
    <ul class="nav-pills categorymenu">
    @php
      $cate_level_1 = DB::table('cates')->where('parent_id',)
    @endphp
      <li><a href="{{ url('/') }}">AkKe</a></li>
      <li><a class="active"  href="index-2.html">Home</a>
        <div>
          <ul>
            <li><a href="index2.html">Home Style 2</a></li>
          </ul>
        </div>
      </li>
      <li><a href="{{ url('/contact') }}">Contact</a></li>
    </ul>
  </nav>
</div>