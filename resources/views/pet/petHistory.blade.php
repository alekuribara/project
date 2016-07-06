@extends('layout')
@section('title', 'Pet History')
@section('content')
<section>
  <div class="col-md-12">
    @if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
    @endif
    @include('errors.listErrors')
  </div>
  @foreach ($pets as $pet)
  <form id="frm_search" role="form" action="{{ asset('/pet/petHistory/'.$pet->petId)}}" method="post"  class="form-horizontal">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">  {{-- should have this hidden input --}}
    <input type="hidden" id="petId" name="petId" value="{{$pet->petId}}">
    <input type="hidden" id="tab" name="tab" value="{{ $input['tab'] }}">
    <div class="container">
      <div class="form-top">
        <h3> <label>{{$pet->petName}}  History</label> </h3>
        <div class="col-md-12">
          <div class="col-lg-2 col-md-2 col-sm-2">
            <label>QrCode: </label>
          </div><!-- ./col-sm-2 -->
          <div class="col-md-4 col-sm-4">
            <input type="input" name="qrCode" id="qrcode" class="form-control"  value="{{ $pet->qrCode }}" readonly>
          </div> <!-- ./col-sm-4 -->
          <div class="col-md-2 col-sm-2">
            <label >DOB :</label>
          </div><!-- ./col-sm-2 -->
          <div class="col-md-4 col-sm-4">
            <input type="date" name="dob" class="form-control"  value="{{ $pet->dob }}">
          </div> <!-- ./col-sm-4 -->
        </div> <!-- ./col-md-12 -->
        <div class="col-md-12">
          <div class="col-md-2 col-sm-2">
            <label >Breed :</label>
          </div><!-- ./col-sm-2 -->
          <div class="col-md-4 col-sm-4">
            <input type="text" name="breed"  id="breed" class="form-control" value="{{ $pet->breed }}">
          </div> <!-- ./col-sm-4 -->
          <div class="col-md-2 col-sm-2">
            <label>Colour :</label>
          </div><!-- ./col-sm-2 -->
          <div class="col-md-4 col-sm-4">
            <input type="text" name="colour"  id="colour" class="form-control" value="{{ $pet->colour }}">
          </div> <!-- ./col-sm-4 -->
        </div> <!-- ./col-md-12 -->
        <div class="col-md-12">
          <div class="col-md-2 col-sm-2">
            <label>Pet Type: </label>
          </div>
          <div class="col-md-4 col-sm-4">
            <input type="text" name="petType"  id="pettype" class="form-control " value="{{ $pet->petType}}">
          </div> <!-- ./col-sm-4 -->
          {{--*/ $checkedM = ' ' /*--}}
          {{--*/ $checkedF = ' ' /*--}}
          @if ( $pet->gender  === 'F')
          {{--*/ $checkedF = 'checked' /*--}}
          @else
          {{--*/ $checkedM = 'checked' /*--}}
          @endif
          <div class="col-md-2 col-sm-2">
            <label>Gender:</label>
          </div><!-- ./col-sm-2 -->
          <div class="col-md-4 col-sm-4">
            <label class="radio-inline ">
              <input type="radio" name="gender" id="female" value="F" {{ $checkedF}}>Female
            </label>
            <label class="radio-inline">
              <input type="radio"  name="gender" id="male" value="M"  {{ $checkedM}}>Male
            </label>
          </div> <!-- ./col-sm-4-->
        </div> <!-- col-md-12 -->
        <div class="col-md-12">
          {{--*/ $isAdopted = ' ' /*--}}
          {{--*/ $notAdopted = ' ' /*--}}
          @if ( $pet->isAdopted  === 0)
          {{--*/ $isAdopted  = 'checked' /*--}}
          @else
          {{--*/ $notAdopted = 'checked' /*--}}
          @endif
          <div class="col-md-2 col-sm-2">
            <label>Adopted:</label>
          </div><!-- ./col-sm-2 -->
          <div class="col-md-4 col-sm-4">
            <label class="radio-inline ">
              <input type="radio" name="isAdopted" value="0" {{ $isAdopted}}>Yes
            </label>
            <label class="radio-inline">
              <input type="radio"  name="isAdopted"  value="1"  {{ $notAdopted}}>No
            </label>
          </div> <!-- ./col-sm-4-->
          <div class="col-md-2 col-sm-2">
            <label>Adopted Date: </label>
          </div>
          <div class="col-md-4 col-sm-4">
            <input type="date" name="adoptedDate"  id="adoptedDate" class="form-control " value="{{ $pet->adoptedDate}}"  >
          </div> <!-- ./col-sm-4 -->
        </div><!-- ./col-md-12-->
        <div class="col-md-12">
          {{--*/ $isNeuter = ' ' /*--}}
          {{--*/ $notNeuter = ' ' /*--}}
          @if ( $pet->isNeutralized  === 0)
          {{--*/ $isNeuter = 'checked ' /*--}}
          @else
          {{--*/ $notNeuter = 'checked' /*--}}
          @endif
          <div class="col-md-2 col-sm-2">
            <label>Neutralized</label>
          </div><!-- ./col-sm-2 -->
          <div class="col-md-4 col-sm-4">
            <label class="radio-inline ">
              <input type="radio" name="isNeutralized"  value="Y" {{ $isNeuter}}>Yes
            </label>
            <label class="radio-inline">
              <input type="radio"  name="isNeutralized"  value="N"  {{ $notNeuter}}>No
            </label>
          </div> <!-- ./col-sm-4-->
          {{--*/ $lost = ' ' /*--}}
          {{--*/ $found = ' ' /*--}}
          @if ( $pet->status  === 'lost')
          {{--*/ $lost = 'checked' /*--}}
          @elseif ( $pet->status  === 'found')
          {{--*/ $found = 'checked' /*--}}
          @endif
          <div class="col-md-2 col-sm-2">
            <label>Status</label>
          </div><!-- ./col-sm-2 -->
          <div class="col-md-4 col-sm-4">
            <label class="radio-inline ">
              <input type="radio" name="status"  value="lost" {{ $lost}}>Lost
            </label>
            <label class="radio-inline">
              <input type="radio"  name="status"  value="found"  {{ $found}}>Found
            </label>
          </div> <!-- ./col-sm-4-->
        </div><!-- ./col-md-12-->
      </div><!-- /form-bottom-->
      <div class="text-right">
        <button type="submit" value="update"  name="update"  class="btn btn-primary glyphicon glyphicon-plus petButton"> Update</button>
      </div>
    </div> <!-- div container -->
  </form>
  <div class="container" id="petHistoryBox">
    <ul class="nav nav-tabs">
      <li id="tab_vaccine" class="@if($input['tab']=='vaccine') {{ 'active' }} @endif">
        <a data-toggle="pill" href="#vaccine" onclick="setFragment('vaccine');">
          <h4><span class="glyphicon" aria-hidden="true"><img src="/img/vaccine.png"</span> Vaccines</h4>
        </a>
      </li>
      <li id="tab_exam" class="@if($input['tab']=='exam') {{ 'active' }} @endif">
        <a data-toggle="pill" href="#exam" onclick="setFragment('exam');">
          <h4><span class="glyphicon" aria-hidden="true"><img src="/img/exam.png"</span> Exams</h4>
        </a>
      </li>
    </ul>
  </div> <!-- container -->
  <div class="tab-content">
    <div class="tab-pane fade in active">
      <div class="row">
        <div class="col-xs-12">
          <div class="well well-custom">
            @include('pet.petHistoryList')
          </div><!-- well -->
          <div class="text-right">
            <a href="{{ asset('/pet/petHistory/add/'.$pet->petId) }}" class="btn btn-primary" data-toggle="modal" role="button">
              <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add History</a>
            </div>
          </div><!-- cos-xm-12 -->
        </div><!-- row -->
      </div><!-- vaccine -->
      @endforeach
    </div><!-- tab-content -->
  </section>
@stop
@push('scripts')
  $(document).ready(function() {
    $("#searchOptions li a").click(function() {
      var petId = $(this).prop("id");
      $("#optionText").text($(this).text());
      $("#petId").val(petId);
    });
    //$("#searchOptions li a[id='{{ $input['petId'] }}']").click();
  });
  function setFragment(tab){
    $("#tab").val(tab);
    $("#frm_search").prop("method", "get").prop("action", "/pet/petHistory/{{$pet->petId}}#"+tab);
    search.doSearch();
  }
  var search = {
    doSearch : function() {
      $("#frm_search").submit();
    }
  }
@endpush
