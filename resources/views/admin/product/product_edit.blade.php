@extends('admin.master')
@section('title_action')
    Product
@endsection
@section('action')
    Edit
@endsection
<style>
    .image_current{width: 150px;}
    .image_detail{width: 200px; margin-bottom: 15px;}
    .icon-del {background: red;position: relative;top: -52px; right: -160px}
    .product-relative-img {position: relative;}
    .product-detail-img {position: absolute; top: -1200px;right: -680px;}
    #addImages {margin-bottom: 20px;}
</style>
@section('content')
    <div class="col-lg-7 product-relative-img" style="padding-bottom:120px">
        <form name="frmEditProduct" action="{{ route('admin.product.postEdit',$products->id) }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            {{-- {{ dd($product) }} --}}
            {{-- @include('admin.blocks.error') --}}

            <div class="form-group"><label for="">Category Parent</label>
                <select name="sltParent">
                    <option value="">Please Choose Category</option>
                    {{-- {{ dd($cates) }} --}}
                    @foreach($cates as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Name</label>
                    {{-- {{ dd($products) }} --}}
                <input class="form-control" name="txtName" value="{{ old('txtName',isset($products) ? $products->name : null ) }}" placeholder="Please Enter Username"/>

            </div>
            <div class="form-group">
                <label>Price</label>
                <input class="form-control" name="txtPrice" value="{{ old('txtPrice',isset($products) ? $products->price : null ) }}" placeholder="Please Enter Password"/>
            </div>
            <div class="form-group">
                <label>Intro</label>
                <textarea class="form-control" rows="3" name="txtIntro">{{ strip_tags(old('txtIntro',isset($products) ? $products->intro : null )) }}</textarea>
                {{-- <script type="text/javascript">ckeditor("txtIntro")</script> --}}
            </div>
            <div class="form-group">
                <label>Content</label>
                <textarea class="form-control" rows="3" name="txtContent" value="">{{ strip_tags(old('txtContent',isset($products) ? $products->content : null )) }}</textarea>.
                <script type="text/javascript">ckeditor("txtContent")</script>
            </div>
            <div class="form-group">
                <label>Images Current</label>
                <img src="{{ asset('image/'.$products->image) }}" class="image_current" >
                <input type="hidden" name="img_current" value="{{ $products->image }}">
            </div>
            <div class="form-group">
                <label>Images</label>
                <input type="file" name="fImages" >
            </div>
            <div class="form-group">
                <label>Product Keywords</label>
                <input class="form-control" name="txtKeyword" value="{{ old('txtKeyword',isset($products) ? $products->keywords : null ) }}" placeholder="Please Enter Category Keywords"/>
            </div>
            <div class="form-group">
                <label>Product Description</label>
                <textarea class="form-control" name="txtDes" rows="3" value="">
                {!! ltrim(strip_tags(old('txtDes',isset($products) ? $products->description : null ))) !!}
                </textarea>
            </div>
            <div class="form-group">
                <label>Product Status</label>
                <label class="radio-inline">
                    <input name="rdoStatus" value="1" checked="" type="radio">Visible
                </label>
                <label class="radio-inline">
                    <input name="rdoStatus" value="2" type="radio">Invisible
                </label>
            </div>
            <button type="submit" class="btn btn-default">Product Edit</button>
            <button type="reset" class="btn btn-default">Reset</button>
            <div class="col-md-1"></div>
            <div class="col-md-4 product-detail-img">
                @foreach($product_img as $k => $pimg)
                    {{-- {{ dd($pimg) }} --}}
                    <div class="form-group" id="{{ $k }}">
                        <img id="{{ $k }}" idHinh="{{ $pimg->id }}" class="image_detail" src="{{ asset('image/' . $pimg->image) }}" alt="{{ $k }}">
                        <a href="javascript:void(0)" type="button" id="del_img_demo" class="btn btn-danger btn-circle icon-del"><i class="fa fa-times"></i></a>
                    </div>
                @endforeach
                <button type="button" class="btn btn-primary" id="addImages">Add Images</button>
                <div id="insertImageDetail"></div>
            </div>
            <form>
    </div>
@endsection