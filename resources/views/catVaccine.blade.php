@extends('layout')
@section('title', 'Cat Vaccine')
@section('content')
<section>
    <div id="contents" class="margin-left container">
          <div class="col-lg-12 text-center">
            <h2>Cat Vaccine</h2>
            <hr class="star-primary">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 portfolio-item">
          </div>
          <div class="col-md-4 portfolio-item">
            <img src="{{ asset('/img/catvaccine.jpg') }}" class="img-responsive" alt="Cat Vaccine">
          </div>
          <div class="col-md-4 portfolio-item">
          </div>
        </div> <!-- /.row -->
      </div><!-- /.container -->
</section>
@stop
