@extends('shop.master')
@section('content')
@section('description')
AkKe Product Detail
@endsection
@section('content')
<div id="maincontainer">
  <section id="product">
    <div class="container">
     <!--  breadcrumb -->
      <ul class="breadcrumb">
        <li>
          <a href="{{ url('/') }}">Home</a>
          <span class="divider">/</span>
        </li>
        <li class="active">Register Account</li>
      </ul>
      <div class="row">
        <!-- Register Account-->
        <div class="span9">
          <h1 class="heading1"><span class="maintext">Register Account</span><span class="subtext">Register Your details with us</span></h1>
          <form class="form-horizontal" method="POST" action="{{ route('postRegister') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h3 class="heading3">Your Personal Details</h3>
            <div class="registerbox">
              <fieldset>
                @include('admin.blocks.errors')
                @if(Session::has('flash_message'))
                  <div id="flash-message" class="alert alert-{{ Session::get('flash_level') }}">
                      {{ Session::get('flash_message') }}
                  </div>
                @endif
                <div class="control-group">
                  <label class="control-label"><span class="red">*</span> Username:</label>
                  <div class="controls">
                    <input type="text" name="username" class="input-xlarge">
                  </div>
                </div>
                {{-- <div class="control-group">
                  <label class="control-label"><span class="red">*</span> Last Name:</label>
                  <div class="controls">
                    <input type="text"  class="input-xlarge">
                  </div>
                </div> --}}
                <div class="control-group">
                  <label class="control-label"><span class="red">*</span> Email:</label>
                  <div class="controls">
                    <input type="text" name="email" class="input-xlarge">
                  </div>
                </div>{{--
                <div class="control-group">
                  <label class="control-label"><span class="red">*</span> Phone Number:</label>
                  <div class="controls">
                    <input type="text"  class="input-xlarge">
                  </div>
                </div> --}}
              </fieldset>
            </div>
            <h3 class="heading3">Your Password</h3>
            <div class="registerbox">
              <fieldset>
                <div class="control-group">
                  <label  class="control-label"><span class="red">*</span> Password:</label>
                  <div class="controls">
                    <input type="password" name="password"  class="input-xlarge">
                  </div>
                </div>
                <div class="control-group">
                  <label  class="control-label"><span class="red">*</span> Password Confirm::</label>
                  <div class="controls">
                    <input type="password" name="confirm_pass" class="input-xlarge">
                  </div>
                </div>
              </fieldset>
            </div>
            <div class="pull-right">
              <label class="checkbox inline">
                <input type="checkbox" value="option2" >
              </label>
              I have read and agree to the <a href="#" >Privacy Policy</a>
              &nbsp;
              <input type="Submit" class="btn btn-orange" value="Continue">
            </div>
          </form>
          <div class="clearfix"></div>
          <br>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
@endsection
