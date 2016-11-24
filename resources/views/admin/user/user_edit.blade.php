@extends('admin.master')
@section('title_action')
    User
@endsection
@section('action')
    Edit
@endsection
@section('content')
<div class="col-lg-7" style="padding-bottom:120px">
    {{-- {{ var_dump($user) }} --}}
    <form action="" method="POST">
        @include('admin.blocks.errors')
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label>Username</label>
            <input class="form-control" name="txtUser" value="{{ old('txtUser',isset($user) ? $user->username : null) }}" placeholder="Please Enter Username" />
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="txtPass" placeholder="Please Enter Password" />
        </div>
        <div class="form-group">
            <label>RePassword</label>
            <input type="password" class="form-control" name="txtRePass" placeholder="Please Enter RePassword" />
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" value="{{ old('txtEmail',isset($user) ? $user->email : null) }}" name="txtEmail" placeholder="Please Enter Email" />
        </div>
        <div class="form-group">
            <label>User Level</label>

            <label class="radio-inline">
                <input name="rdoLevel" value="2" type="radio"
                @if($user->level == 2)
                    checked="checked"
                @endif
                >Admin
            </label>

            <label class="radio-inline">
                <input name="rdoLevel" value="3" type="radio"
                @if ($user->level ==3)
                    checked="checked"
                @endif
                >Member
            </label>
        </div>
        <button type="submit" class="btn btn-default">User Edit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    <form>
</div>
@endsection