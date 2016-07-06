@extends('layout')
@section('title', 'Login Panel')
@section('content')
<div class="container">
  <!-- Introduction Row -->
  <div class="row">
    <div class="col-sm-12">
      @if (session('status'))
      <div class="alert alert-success">
        {{ session('status') }}
      </div>
      @endif
      @if (session('statusError'))
      <div class="alert alert-danger">
        {{ session('statusError') }}
      </div>
      @endif
      <h1 class="page-header">Hello <?= $firstName; ?>
        <small>Welcome to Pet Tracker</small>
      </h1>
    </div><!-- col-sm-12 -->
  </div><!-- row -->
  <!-- User's pets Row -->
  <div class="row">
    <div class="col-sm-12">
      @if (count($userPets) === 0)
      <p>  <h3>You haven't registered your pet(s) yet. Please register your pet(s).</h3></p>
      @else
      <div class="col-sm-12">
        <h2 class="page-header">Your Pet(s)</h2>
      </div><!-- col-sm-12 -->
      @foreach ($userPets as $pet)
      <div class="col-lg-3 col-sm-6 text-center">
        @if (($pet->picturePath) === null)
        <a href="{{ asset('/pet/petHistory/'.$pet->petId) }}"> <img class="img-circle img-responsive img-centered" src="http://placehold.it/200x200" alt=""></a>
        @else
        <a href="{{ asset('/pet/petHistory/'.$pet->petId) }}"> <img class="img-circle img-responsive img-centered" src="/{{ $pet->picturePath }}" alt=""></a>
        <h3>{{ $pet->qrCode }}</h3>
        <p>{{ $pet->petName}}</p>
        @endif
      </div><!-- col-lg-3 -->
      @endforeach
      @endif
    </div> <!-- col-sm-12 -->
  </div> <!-- row -->
  <div class="row">
    <h1></h1>
  </div>
  <div class="row well">
    <div class="col-lg-6 col-sm-12 text-center">
      <h4>Pet Transfer</h4>
      <a href="{{ asset('/user/petChooseTransfer') }}"> <img class="img-square img-responsive img-centered" src="/img/transfer.png" alt=""></a>
    </div><!-- col-lg-6 -->
    <div class="col-lg-6 col-sm-12 text-center">
      <h4>Pet Register</h4>
      <a href="{{ asset('/user/petRegister') }}"> <img class="img-square img-responsive img-centered" src="/img/register.png" alt=""></a>
    </div><!-- col-lg-6 -->
  </div><!--row well -->
</section>
@stop
