@extends('layout')
@section('title', 'Dog Vaccination')
@section('content')
<section>
  <div id="wrap">
    <div id="contents" class="margin-left container">
      <section id="portfolio">
        <div class="container">
          <div class="col-sm-12 col-lg-12 text-center">
            <h2>Pet Style</h2>
            <hr class="star-primary">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 portfolio-item">
            <img src="{{ asset('img/accessory/accessory01.jpg') }}" class="img-responsive" alt="Accessory01">
          </div>
          <div class="col-md-4 portfolio-item">
            <img src="{{ asset('img/accessory/accessory02.jpg') }}" class="img-responsive" alt="Accessory02">
          </div>
          <div class="col-md-4 portfolio-item">
            <img src="{{ asset('img/accessory/accessory03.jpg') }}" class="img-responsive" alt="Accessory03">
          </div>
          <div class="col-md-4 portfolio-item">
            <img src="{{ asset('img/accessory/accessory04.jpg') }}" class="img-responsive" alt="Accessory04">
          </div>
          <div class="col-md-4 portfolio-item">
            <img src="{{ asset('img/accessory/accessory05.jpg') }}" class="img-responsive" alt="Accessory05">
          </div>
          <div class="col-md-4 portfolio-item">
            <img src="{{ asset('img/accessory/accessory06.jpg') }}" class="img-responsive" alt="Accessory06">
          </div>
        </div> <!-- /.row -->
      </div><!-- /.container -->
    </section>
  </div> <!-- /.contents -->
</div> <!-- /.wrap -->
</section>
@stop
