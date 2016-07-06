@extends('layout')
@section('title', 'Med Comparison')
@section('content')
<section>
    <div id="contents" class="margin-left container">
          <div class="col-lg-12 text-center">
            <h2>Med</h2>
            <hr class="star-primary">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 portfolio-item">
          </div>
          <div class="col-md-4 portfolio-item">
            <img src="{{ asset('/img/medicinecomparison.jpg') }}" class="img-responsive" alt="Med Compare">
          </div>
          <div class="col-md-4 portfolio-item">
          </div>
        </div> <!-- /.row -->
      </div><!-- /.container -->
</section>
@stop
