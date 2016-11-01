@extends('admin.master')
@section('title_action')
    Product
@endsection
@section('action')
    Add
@endsection
@section('content')
    <div class="col-lg-7" style="padding-bottom:120px">
        <form action="{{ url('/admin/product/add') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @include('admin.blocks.errors')
            <div class="form-group">
                {{--{{ dd($cate) }}--}}
                <label>Category Parent</label>
                <select class="form-control" name="txtCP">
                    <option value="0">Please Choose Category</option>
                    @foreach( $cate as $c)
                        <option value="">{{ $c['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{{ old('txtName') }}"/>
            </div>
            <div class="form-group">
                <label>Price</label>
                <input class="form-control" name="txtPrice" placeholder="Please Enter Price" value="{{ old('txtPrice') }}"/>
            </div>
            <div class="form-group">
                <label>Intro</label>
                <textarea class="form-control" rows="3" name="txtIntro" value="{{ old('txtIntro') }}"></textarea>
                {{--<script type="text/javascript">CKEDITOR.replace( 'txtIntro' )</script>--}}
                <script type="text/javascript">ckeditor("txtIntro")</script>
            </div>
            <div class="form-group">
                <label>Content</label>
                <textarea class="form-control" rows="3" name="txtContent" value="{{ old('txtContent') }}"></textarea>
            </div>
            <div class="form-group">
                <label>Images</label>
                <input type="file" name="fImages" value="{{ old('fImages') }}>
            </div>
            <div class="form-group">
                <label>Product Keywords</label>
                <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" value="{{ old('txtKeywords') }}"/>
            </div>
            <div class="form-group">
                <label>Product Description</label>
                <textarea class="form-control" rows="3" name="txtDescription" value="{{ old('txtDescription') }}"></textarea>
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
            <button type="submit" class="btn btn-default">Product Add</button>
            <button type="reset" class="btn btn-default">Reset</button>
        <form>
    </div>
@endsection