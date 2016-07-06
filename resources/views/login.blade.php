@extends('layout')
@section('title', 'Login / SignUp')
@section('content')
<section>
  <div id="wrap">
   <div id="contents" class="margin-left container">
      <div class="row">
        <div class="col-sm-5">
          @if (session('status'))
          <div class="alert alert-danger">
            {{ session('status') }}
          </div>
          @endif
          <!-- define  variable blade format -->
          {{--*/ $button =  Request::old('login') /*--}}
          @if ($button === 'login')
             @include('errors.listErrors')
          @endif
          <div class="form-box">
            <div class="form-top">
              <div class="form-top-left">
                <h3>Please login</h3>
                <p>Enter username and password to log on:</p>
              </div> <!-- /.form-top-left-->
              <div class="form-top-right">
                <i class="fa fa-key"></i>
              </div> <!-- /.form-top-right-->
            </div> <!-- /.form-top-->
            <div class="form-bottom">
              <form role="form"  action="{{route('login')}}" method="post" class="login-form">
                <div class="form-group {{ $errors->has('login_email') ? 'has-error' : ' ' }}">
                  <input type="email" name="email" id="inputEmail" class="form-control"  placeholder="* Email address" value="{{ Request::old('email')}}" required>
                </div> <!-- /.form-group-->
                <div class="form-group {{ $errors->has('password') ? 'has-error' : ' ' }}">
                  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="* Password" required>
                </div> <!-- /.form-group-->
                <button type="submit" value="login"  name="login" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-log-in"></span> Login</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
              </form>
            </div> <!-- /.form-bottom-->
          </div><!-- /.form-box-->
        </div> <!-- /.col-sm-5-->
        <div class="col-sm-1 middle-border"></div>
        <div class="col-sm-1"></div><!-- /.col-sm-1-->
        <div class="col-sm-5">
          @if (session('registerOk'))
          <div class="alert alert-success">
            {{ session('registerOk') }}
          </div>
          @endif
          <!-- define  variable blade format -->
          {{--*/ $button =  Request::old('signup') /*--}}
          @if ($button === 'signup')
             @include('errors.listErrors')
          @endif
          <div class="form-box">
            <div class="form-top">
              <div class="form-top-left">
                <h3>Sign up now</h3>
                <p>Fill in the form below to get instant access:</p>
              </div> <!-- .form-top-left -->
              <div class="form-top-right">
                <i class="fa fa-pencil"></i>
              </div> <!-- .form-top-right -->
            </div><!-- .form-top -->
            <div class="form-bottom">
              <form role="form" action="/register" method="post" class="registration-form">
                <div class="form-group  {{ $errors->has('signup_email') ? 'has-error' : ' ' }}">
                  <input type="email" name="signup_email" id="inputEmail" class="form-control"  placeholder="* Email address" value="{{ Request::old('signup_email')}}" required>
                </div> <!-- /.form-group-->
                <div class="form-group  {{ $errors->has('firstName') ? 'has-error' : ' ' }}">
                  <input type="text" name="firstName" id="first-name" placeholder="* First name" class="form-first-name form-control" value="{{ Request::old('firstName')}}" required>
                </div> <!-- .form-group -->
                <div class="form-group  {{ $errors->has('lastName') ? 'has-error' : ' ' }}">
                  <label class="sr-only" for="form-last-name">Last name</label>
                  <input type="text" name="lastName"  id="last-name" placeholder="* Last name" class="form-last-name form-control" value="{{ Request::old('lastName')}}" required>
                </div> <!-- .form-group -->
                <div class="form-group  {{ $errors->has('address_st') ? 'has-error' : ' ' }}">
                  <input type="text" name="address_st"  id="address" placeholder="* Address" class="form-address form-control" value="{{ Request::old('address_st')}}" required>
                </div> <!-- .form-group -->
                <div class="form-group  {{ $errors->has('address_sub') ? 'has-error' : ' ' }}">
                  <input type="text" name="address_sub"  id="suburb" placeholder="Suburb" class="form-suburb form-control" value="{{ Request::old('address_sub')}}" >
                </div> <!-- .form-group -->
                <div class="form-group {{ $errors->has('postcode') ? 'has-error' : ' ' }}">
                  <input type="number" name="postcode"  id="postcode" placeholder="* Postcode" class="form-weight form-control" value="{{ Request::old('postcode')}}"  required>
                </div> <!-- .form-group -->
                <div class="form-group {{ $errors->has('address_city') ? 'has-error' : ' ' }}">
                  <input type="text" name="address_city" id="city" placeholder="* City" class="form-city form-control" value="{{ Request::old('address_city')}}" required>
                </div> <!-- .form-group -->
                <div class="form-group {{ $errors->has('phone') ? 'has-error' : ' ' }}">
                  <input type="number" name="phone" id="phone" placeholder="* Phone number" class="form-phone form-control" value="{{ Request::old('phone')}}"  required>
                </div> <!-- .form-group -->
                <div class="form-group {{ $errors->has('signup_password') ? 'has-error' : ' ' }}">
                  <input type="password" name="signup_password" id="inputPassword01" placeholder="* Enter password"  class="form-control"  required>
                </div> <!-- /.form-group-->
                <div class="form-group {{ $errors->has('signup_password') ? 'has-error' : ' ' }}">
                  <input type="password" name="signup_password_confirmation" id="inputPassword02" placeholder="* Confirm password"   class="form-control" required>
                </div> <!-- /.form-group-->
                <button type="submit" name="signup" value="signup" class="btn btn-success btn-block">Sign me up!</button>
              <!--  <input type="hidden" name="_token" value="{{ Session::token() }}"> -->
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
              </form>
            </div> <!-- /.form-bottom -->
          </div> <!-- /.form-box-->
        </div> <!-- /.col-sm-5 -->
      </div> <!-- /.row -->
    </div> <!-- /.container -->
  </div> <!-- /.wrap -->
</section>
@stop
