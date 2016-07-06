@extends('layout')
@section('title', 'Admin - Exam List')
@section('content')
  <section>
    <div class="row text-center">
      <h2>Admin - Update Exam</h2>
      <hr class="star-primary">
      <div class="col-md-10">
        @if (session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
        @endif
        <form name="addExam" id="frm_addExam" method="post" action="/admin/exam/update/{{ $records->examId }}" novalidate>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">  {{-- should have this hidden input --}}
          <input type="hidden" name="examId" id="examId" value="{{ $records->examId }}">
          <div class="row control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                  <label>Name</label>
                  <input type="text" class="form-control" placeholder="Name" id="name" name="name" value="{{ $records->name }}" required data-validation-required-message="Please enter user name.">
                  <p class="help-block text-danger text-left"></p>
              </div>
          </div>
          <div class="row control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                  <label>Requirement</label>
                  <input type="text" class="form-control" placeholder="Requirement" id="requirement" name="requirement"value="{{ $records->requirement }}" data-validation-required-message="Please enter Requirement.">
                  <p class="help-block text-danger text-left"></p>
              </div>
          </div>
          <br>
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
  });
@endpush
