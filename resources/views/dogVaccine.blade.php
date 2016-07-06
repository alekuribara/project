@extends('layout')
@section('title', 'Dog Vaccine')
@section('content')
<section>
    <div id="contents" class="margin-left container">
          <div class="col-lg-12 text-center">
            <h2>Dog Vaccine</h2>
            <hr class="star-primary">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 portfolio-item">
          </div>
          <div class="col-md-4 portfolio-item">
            <img src="{{ asset('/img/dogvaccine.jpg') }}" class="img-responsive" alt="Dog Vaccine">
          </div>
          <div class="col-md-4 portfolio-item">
          </div>
        </div> <!-- /.row -->
      </div><!-- /.container -->
</section>
@stop
