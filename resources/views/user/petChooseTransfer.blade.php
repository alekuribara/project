@extends('layout')
@section('title', 'Pet Transfer')
@section('content')
<section>
  <div id="contents" class="margin-left container">
    <div class="row text-center">
      <h2>Pet to transfer</h2>
      <hr class="star-primary">
      <div class="col-md-12">
        <div class="row">
          <div class="col-sm-12">
            <form class="form" id="frm_search" role="form" method="post">
              <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">  {{-- should have this hidden input --}}
              <input type="hidden" id="searchType" name="searchType" value="name">
              <div class="form-group">
                <label for="txtSearch" class="sr-only">Search words</label>
                <div class="input-group">
                  <div class="input-group-btn">
                    <button type="button" id="searchOption" class="search btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Pet Name
                    </button>
                  </div><!-- /btn-group -->
                  @if (count($userPets) === 0)
                    {{--*/ $disabled = 'disabled' /*--}}
                  @else
                    {{--*/ $disabled = ' ' /*--}}
                  @endif
                  <select class="form-control" name="selPetId" id="selPetId" {{$disabled}}>
                    @if (count($userPets) === 0)
                    <option value=" ">No Pets to transfer</option>
                    @else
                    @foreach ($userPets as $pet)
                    <option value="{{ $pet->petId }}" >{{ $pet->petName }}</option>
                    @endforeach
                    @endif
                  </select>
                  <span class="input-group-btn">
                    @if($disabled === 'disabled')
                    <button class="btn btn-info"  type="button" disabled><span class="glyphicon glyphicon-ok" aria-hidden="true" ></span> OK</button>
                    @else
                    <button class="btn btn-info" type="submit" name="btnOK" id="btnOK"><span class="glyphicon glyphicon-ok" aria-hidden="true" ></span> OK</button>
                    @endif
                  </span>
                </div><!--input-group -->
              </div><!--form-group-->
            </form>
          </div><!--col-sm-12 -->
        </div><!--row -->
      </div> <!--Contents -->
    </div><!--row -->
  </div> <!--Contents -->
</section>
@stop
@push('scripts')
$(document).ready(function(){
  $("#btnOK").click(function(){
      var vPetId = $("#selPetId").val();
      var url = '/user/petTransfer/'+vPetId;
      var post_data = { _token : $("#_token").val() };
     $("#frm_search").attr('action', url);
  });
});
@endpush
