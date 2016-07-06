@extends('layout')
@section('title', 'Dog Vaccination')
@section('content')
<section>
  <div id="wrap">
    <div id="contents" class="margin-left container">
      <section id="portfolio">
        <div class="container">
          <div class="col-lg-12 text-center">
            <h2>Pet Travel</h2>
            <hr class="star-primary">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 portfolio-item">
            <img src="{{ asset('img/travel/travel01.jpg') }}" class="img-responsive" alt="Travel01">
          </div>
          <div class="col-md-4 portfolio-item">
            <img src="{{ asset('img/travel/travel02.jpg') }}" class="img-responsive" alt="Travel02">
          </div>
          <div class="col-md-4 portfolio-item">
            <img src="{{ asset('img/travel/travel03.jpg') }}" class="img-responsive" alt="Travel03">
          </div>
          <div class="col-md-4 portfolio-item">
            <img src="{{ asset('img/travel/travel04.jpg') }}" class="img-responsive" alt="Travel04">
          </div>
          <div class="col-md-4 portfolio-item">
            <img src="{{ asset('img/travel/travel05.jpg') }}" class="img-responsive" alt="Travel05">
          </div>
          <div class="col-md-4 portfolio-item">
            <img src="{{ asset('img/travel/travel06.jpg') }}" class="img-responsive" alt="Travel06">
          </div>
        </div> <!-- /.row -->
      </div><!-- /.container -->
    </section>
  </div> <!-- /.contents -->
</div> <!-- /.wrap -->
</section>
@stop
