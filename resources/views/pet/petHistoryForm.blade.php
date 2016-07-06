@extends('layout')
@section('title', 'Pet History')
@section('content')
  <section>
    <div class="row text-center">
      <h2>Add Pet History</h2>
      <hr class="star-primary">
      <div class="col-md-10">
        @if (session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
        @endif
        @foreach ($pets as $pet)
          <form name="addExam" id="frm_addExam"  action="{{ asset('/pet/petHistory/add/'.$pet->petId)}}" method="post"  novalidate>
          @endforeach
          <input type="hidden" name="_token" value="{{ csrf_token() }}">  {{-- should have this hidden input --}}
          <div class="row control-group text-left">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                  <label>Pet</label>
              </div>
          </div>
          <div class="row control-group text-left">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                  <label>Vaccine/Exam</label>
                  <input type="hidden" id="tab" name="tab" value="{{ $input['tab'] }}">
                  <input type="text" placeholder="Vaccine/Exam" readonly="readonly" style="width=170px">
                    <div class="btn-group" role="group" aria-label="...">
                      <button type="button" class="btn btn-default data-vaccine" onclick="setHistory.setTab(this, 'vaccine');">Vaccine</button>
                      <button type="button" class="btn btn-default data-exam" onclick="setHistory.setTab(this, 'exam');">Exam</button>
                    </div>
                  <p class="help-block text-danger text-left"></p>
              </div>
          </div>
          <div>
            <div id="vaccineOptionList" class="row control-group text-left">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    <label>Vaccine</label>
                    <select class="form-control" name="vaccineId">
                      <option id="">-- Choose Vaccine --</option>
                      @if (count($vaccineList) === 0)
                      @else
                        @foreach ($vaccineList as $vaccine)
                          <option value="{{ $vaccine->vaccineId }}">{{ $vaccine->name }}</option>
                        @endforeach
                      @endif
                    </select>
                </div>
            </div>
            <div id="examOptionList" class="row control-group text-left" style="display:none">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    <label>Exam</label>
                    <select class="form-control" name="examId">
                      <option id="">-- Choose Exam --</option>
                      @if (count($examList) === 0)
                      @else
                        @foreach ($examList as $exam)
                          <option value="{{ $exam->examId }}">{{ $exam->name }}</option>
                        @endforeach
                      @endif
                    </select>
                </div>
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Result</label>
                        <input type="hidden" id="result" name="result" value="{{ $input['result'] }}">
                        <input type="text" placeholder="Result" readonly="readonly" style="width=170px">
                          <div class="btn-group" role="group" aria-label="...">
                            <button type="button" class="btn btn-success data-success" onclick="setHistory.setResult(this, 'success');">Success</button>
                            <button type="button" class="btn btn-warning data-warning" onclick="setHistory.setResult(this, 'warning');">Warning</button>
                            <button type="button" class="btn btn-danger data-danger" onclick="setHistory.setResult(this, 'danger');">Danger</button>
                          </div>
                        <p class="help-block text-danger text-left"></p>
                    </div>
            </div>
          </div>
          <div class="row control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                  <label>Date</label>
                  <input type="date" class="form-control" placeholder="Date" id="date" name="date" required value="{{ $input['date'] }}" data-validation-required-message="Please Enter Date.">
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
    $(".data-{{ $input['tab'] }}").click();
  });
  var setHistory = {
    setTab: function(btn, tab) {
      $("#tab").val(tab);
      $(btn).removeClass("btn-default").addClass("btn-info");
      $(btn).siblings().removeClass("btn-info").addClass("btn-default");
      $("#"+tab+"OptionList").show().siblings().hide();
    },
    setResult: function(btn, result) {
      $("#result").val(result);
      //$(btn).removeClass("btn-"+result).addClass("btn-info");
      //$(btn).siblings().removeClass("btn-info");
    }
  }
@endpush
