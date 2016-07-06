@extends('layout')
@section('title', 'Dog Vaccination')
@section('content')
<section>
  <div id="wrap">
    <div id="contents" class="margin-left container">
      <section id="portfolio">
        <div class="container">
          <div class="col-lg-12 text-center">
            <h2>Pet food</h2>
            <hr class="star-primary">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 portfolio-item">
            <img src="{{ asset('img/food/food01.jpg') }}" class="img-responsive" alt="Food01">
          </div>
          <div class="col-md-4 portfolio-item">
            <img src="{{ asset('img/food/food02.jpg') }}" class="img-responsive" alt="Food02">
          </div>
          <div class="col-md-4 portfolio-item">
            <img src="{{ asset('img/food/food03.jpg') }}" class="img-responsive" alt="Food03">
          </div>
          <div class="col-md-4 portfolio-item">
            <img src="{{ asset('img/food/food04.jpg') }}" class="img-responsive" alt="Food04">
          </div>
          <div class="col-md-4 portfolio-item">
            <img src="{{ asset('img/food/food05.jpg') }}" class="img-responsive" alt="Food05">
          </div>
          <div class="col-md-4 portfolio-item">
            <img src="{{ asset('img/food/food06.jpg') }}" class="img-responsive" alt="Food06">
          </div>
        </div> <!-- /.row -->
      </div><!-- /.container -->
    </section>
  </div> <!-- /.contents -->
</div> <!-- /.wrap -->
</section>
@stop
