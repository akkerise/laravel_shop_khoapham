@extends('admin.master')
@section('title_action')
    User
@endsection
@section('action')
    Add
@endsection
@section('content')
<div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{ route('admin.user.postAdd') }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @include('admin.blocks.errors')
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" name="txtUser" placeholder="Please Enter Username" value="{{ old('txtUser') }}" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="txtPass" placeholder="Please Enter Password"  value="{{ old('txtPass') }}"/>
                            </div>
                            <div class="form-group">
                                <label>RePassword</label>
                                <input type="password" class="form-control" name="txtRePass" placeholder="Please Enter RePassword"  value="{{ old('txtRePass') }}"/>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="txtEmail" placeholder="Please Enter Email"  value="{{ old('txtEmail') }}"/>
                            </div>
                            <div class="form-group">
                                <label>User Level</label>
                                <label class="radio-inline">
                                    <input name="rdoLevel" value="1" checked="" type="radio">Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoLevel" value="2" type="radio">Member
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">User Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
@endsection