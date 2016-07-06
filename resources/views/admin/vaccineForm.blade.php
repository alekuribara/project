@extends('layout')
@section('title', 'Admin - Exam List')
@section('content')
  <section>
    <div class="row text-center">
      <h2>Admin - Update Vaccine</h2>
      <hr class="star-primary">
      <div class="col-md-10">
        @if (session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
        @endif
        <form name="addVaccine" id="frm_addVaccine" action="/admin/vaccine/update/{{ $records->vaccineId }}" method="post" novalidate>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">  {{-- should have this hidden input --}}
          <div class="row control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                  <label>Vaccine Name</label>
                  <input type="text" class="form-control" placeholder="Vaccine Name" id="name" name="name" required value="{{ $records->name }}" data-validation-required-message="Please Enter Vaccine Name.">
                  <p class="help-block text-danger text-left"></p>
              </div>
          </div>
          <div class="row control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                  <label>Company</label>
                  <input type="text" class="form-control" placeholder="Company" id="company" name="company" required value="{{ $records->company }}" data-validation-required-message="Please Enter Vaccine Company.">
                  <p class="help-block text-danger text-left"></p>
              </div>
          </div>
          <div class="row control-group text-left">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                  <label>Frequency</label>
                  <input type="hidden" id="frequency" name="frequency" value="">
                  <input type="text" placeholder="Frecuency" readonly="readonly" style="width=170px">
                    <div class="btn-group" role="group" aria-label="...">
                      <button type="button" class="btn btn-default data-annual" onclick="vaccine.setFrequency(this, 'annual');">Annual</button>
                      <button type="button" class="btn btn-default data-monthly" onclick="vaccine.setFrequency(this, 'monthly');">Monthly</button>
                    </div>
                  <p class="help-block text-danger text-left"></p>
              </div>
          </div>
          <br>
          <div id="success"></div>
          <button role="button" class="btn btn-default" onclick="history.back();"><i class="fa fa-times"></i> Cancel</button>
          <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Save</button>
        </form>
      </div>
    </div>
  </section>
@stop
@push('scripts')
  $(document).ready(function() {
    //form validation
    $("input,select,textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
        },
        filter: function() {
            return $(this).is(":visible");
        }
    });
    $(".data-{{ $records->frequency }}").click();
  });
  var vaccine = {
    setFrequency : function(btn, frequency) {
      $("#frequency").val(frequency);
      $(btn).removeClass("btn-default").addClass("btn-info");
      $(btn).siblings().removeClass("btn-info").addClass("btn-default");
    },
  }
@endpush
