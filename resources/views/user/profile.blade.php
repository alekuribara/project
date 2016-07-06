@extends('layout')
@section('title', 'Profile')
@section('content')
<section>
  <div id="contents" class="margin-left container">
    <div class="row">
      <div class="col-sm-12">
        @if (session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
        @endif
        @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
        @endif
        @include('errors.listErrors')
        <div class="form-box">
          <div class="form-top">
            <h3 class="glyphicon glyphicon-user"> User</h3>
          </div><!-- /form-top-->
          <div class="form-bottom">
            <form role="form" action="{{route('updateProfile')}}" method="post"  class="form-horizontal">
              <div class="form-group">
                <label class="col-sm-2">Email address:</label>
                <div class="col-sm-10">
                  <input type="email" name="email" id="email" class="form-control"  value="{{ Auth::user()->email}}" readonly>
                </div> <!-- ./col-sm-10 -->
              </div> <!-- /.form-group-->
              <div class="form-group  {{ $errors->has('firstName') ? 'has-error' : ' ' }}">
                <label class="col-sm-2" >First name:</label>
                <div class="col-sm-10">
                  <input type="text" name="firstName" id="first-name" class="form-first-name form-control"  value="{{ Auth::user()->firstName}}" >
                </div> <!-- ./col-sm-10 -->
              </div> <!-- .form-group -->
              <div class="form-group {{ $errors->has('lastName') ? 'has-error' : ' ' }}">
                <label class="col-sm-2">Last name:</label>
                <div class="col-sm-10">
                  <input type="text" name="lastName"  id="last-name" class="form-last-name form-control" value="{{ Auth::user()->lastName}}"  >
                </div> <!-- ./col-sm-10 -->
              </div> <!-- .form-group -->
              <div class="form-group {{ $errors->has('address_st') ? 'has-error' : ' ' }}">
                <label class="col-sm-2">Address:</label>
                <div class="col-sm-10">
                  <input type="text" name="address_st"  id="address_st" class="form-address form-control" value="{{ Auth::user()->address_st}}">
                </div> <!-- ./col-sm-10 -->
              </div> <!-- .form-group -->
              <div class="form-group {{ $errors->has('address_sub') ? 'has-error' : ' ' }}">
                <label class="col-sm-2">Suburb:</label>
                <div class="col-sm-10">
                  <input type="text" name="address_sub"  id="address_sub" class="form-suburb form-control" value="{{ Auth::user()->address_sub}}" >
                </div> <!-- ./col-sm-10 -->
              </div> <!-- .form-group -->
              <div class="form-group {{ $errors->has('postcode') ? 'has-error' : ' ' }}">
                <label class="col-sm-2">Postcode:</label>
                <div class="col-sm-10">
                  <input type="string" name="postcode"  id="postcode"  class="form-postcode form-control" value="{{ (Auth::user()->postcode)}}" >
                </div> <!-- ./col-sm-10 -->
              </div> <!-- .form-group -->
              <div class="form-group {{ $errors->has('address_city') ? 'has-error' : ' ' }}">
                <label class="col-sm-2">City:</label>
                <div class="col-sm-10">
                  <input type="text"  name="address_city" id="address_city"  class="form-city form-control" value="{{ Auth::user()->address_city}}">
                </div>
              </label>
            </div> <!-- .form-group -->
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : ' ' }} ">
              <label class="col-sm-2">Phone:</label>
              <div class="col-sm-10">
                <input type="text"  name="phone" id="phone"  class="form-phone form-control" value="{{ Auth::user()->phone}}">
              </div>
            </label>
          </div> <!-- .form-group -->
          <div class="form-group {{ $errors->has('password') ? 'has-error' : ' ' }}">
            <label class="col-sm-2">Password:</label>
            <div class="col-sm-10">
              <input type="password" name="password" id="inputPassword01" class="form-control" >
            </div> <!-- ./col-sm-10 -->
          </div> <!-- /.form-group-->
          <div class="form-group {{ $errors->has('password') ? 'has-error' : ' ' }}">
            <label class="col-sm-2">Confirm password:</label>
            <div class="col-sm-10">
              <input type="password" name="password_confirmation" id="inputPassword02" class="form-control">
            </div> <!-- ./col-sm-10 -->
          </div> <!-- /.form-group-->
          <button type="submit" class="btn btn-primary btn-block glyphicon glyphicon-plus"> Update</button>
          <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
      </div><!-- /.form-bottom-->
    </div> <!-- /.form-box-->
  </div> <!-- /.col-sm-12-->
</div> <!-- /.row -->
</div><!-- /.content-->
</section>
@stop
