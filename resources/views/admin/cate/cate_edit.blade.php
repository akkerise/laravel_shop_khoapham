@extends('admin.master')
@section('title_action')
    Category
@endsection
@section('content')
    <!-- /.col-lg-12 -->
    <div class="col-lg-7" style="padding-bottom:120px">
        <form action="" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            {{-- {{ dd(count($errors->all())) }} --}}
            @include('admin.blocks.errors')
            {{-- @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif --}}
            <div class="form-group">
                <label>Category Parent</label>
                <select class="form-control" name="txtCP">
                    <option value="0">Please Choose Category</option>
                    @foreach( $ctnames as $ctname)
                        <option value="">{{ $ctname->alias }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Category Name</label>
                <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name"
                       value="{{ old('txtCateName',isset($data) ? $data['name'] : null) }}"/>
                @if ($errors->has('txtCateName'))
                    <div class="alert alert-danger" role="alert">
                        <strong>Warning!</strong> {{ $errors->first('txtCateName') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label>Category Order</label>
                <input class="form-control" name="txtOrder" placeholder="Please Enter Category Order"
                       value="{{ old('txtOrder',isset($data) ? $data['order'] : null) }}"/>
                @if ($errors->has('txtOrder'))
                    <div class="alert alert-danger" role="alert">
                        <strong>Warning!</strong> {{ $errors->first('txtOrder') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label>Category Keywords</label>
                <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords"
                       value="{{ old('txtKeywords',isset($data) ? $data['keywords'] : null) }}"/>
                @if ($errors->has('txtKeywords'))
                    <div class="alert alert-danger" role="alert">
                        <strong>Warning!</strong> {{ $errors->first('txtKeywords') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label>Category Description </label>
                <textarea class="form-control" rows="3"
                          name="txtDescription">{{ old('txtDescription',isset($data) ? $data['description'] : null) }}</textarea>
                @if ($errors->has('txtDescription'))
                    <div class="alert alert-danger" role="alert">
                        <strong>Warning!</strong> {{ $errors->first('txtDescription') }}
                    </div>
                @endif
            </div>
            <button type="submit" class="btn btn-default">Category Edit</button>
            <button type="reset" class="btn btn-default">Reset</button>
            <form>
    </div>
@endsection

@section('action')
    Edit
@endsection