@extends('layout')
@section('title', 'Admin - Vaccine List')
@section('content')
  <section>
    <h2>Admin - Vaccine List</h2>
    <form class="form" id="frm_search" role="form" action="/admin/vaccine">
      <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">  {{-- should have this hidden input --}}
      <input type="hidden" id="searchType" name="searchType">
      <div class="form-group">
        <label for="txtSearch" class="sr-only">Search words</label>
        <div class="input-group">
          <div class="input-group-btn">
            <button type="button" id="searchOption" class="search btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Option <span class="caret"></span></button>
            <ul id="searchOptions" class="dropdown-menu">
              <li><a href="#" id="Option">Option</a></li>
              <li><a href="#" id="name">Vaccine Name</a></li>
              <li><a href="#" id="company">Company</a></li>
            </ul>
          </div><!-- /btn-group -->
          <input type="text" name="searchText" id="searchText" class="form-control" placeholder="Name for Searching.." aria-label="..." value="{{ $input['searchText'] }}">
          <span class="input-group-btn">
            <button class="btn btn-info" type="button" onclick="search.doSearch();"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</button>
          </span>
        </div>
      </div>
    </form>
    @if (session('error'))
    <div class="alert alert-danger">
      {{ session('error') }}
    </div>
    @endif
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Vaccine Name</th>
            <th>Company</th>
            <th>Frequency</th>
            <th width="80px"></th>
          </tr>
        </thead>
        <tbody>
        @if (count($records) === 0)
          <tr>
            <td colspan="5" class="text-center no-result">
                No data to show.
            </td>
          </tr>
        @else
          {{-- */ $startNo = (($records->currentPage()-1) * $records->perPage()) + 1 /* --}}
          @foreach ($records as $data)
            <tr id="tr_{{ $data->vaccineId }}">
              <td>{{ $startNo++ }}</td>
              <td>{{ $data->name }}</td>
              <td>{{ $data->company }}</td>
              <td>{{ $data->frequency }}</td>
              <td class="text-center">
                <a class="btn-custom btn btn-xs" href="/admin/vaccine/update/{{ $data->vaccineId }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                <a class="btn-custom btn toggle btn-xs" href="#confirmModal" onclick="vaccineList.toggleDelete({{ $data->vaccineId }});" role="button" data-toggle="modal" ><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
              </td>
            </tr>
          @endforeach
        @endif
        </tbody>
      </table>
    </div>
    <div class="text-right">
      <a href="#vaccinModal" class="btn btn-primary" data-toggle="modal" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Vaccine</a>
    </div>
    <div class="text-center">
      <?php echo $records->appends(['searchType' => $input['searchType'], 'searchText' => $input['searchText']])->render(); ?>
    </div>
  </section>
  <!-- Modals for Insert -->
  <div class="portfolio-modal modal fade" id="vaccinModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
              <div class="lr">
                  <div class="rl">
                  </div>
              </div>
          </div>
          <div class="container">
              <div class="row">
                  <div class="col-lg-8 col-lg-offset-2">
                      <div class="modal-body">
                          <h2>Add Vaccine</h2>
                          <hr class="star-primary">
                            <form name="addVaccine" id="frm_addVaccine" action="/admin/vaccine/add" method="post" novalidate>
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">  {{-- should have this hidden input --}}
                              <div class="row control-group">
                                  <div class="form-group col-xs-12 floating-label-form-group controls">
                                      <label>Vaccine Name</label>
                                      <input type="text" class="form-control" placeholder="Vaccine Name" id="name" name="name" required data-validation-required-message="Please Enter Vaccine Name.">
                                      <p class="help-block text-danger text-left"></p>
                                  </div>
                              </div>
                              <div class="row control-group">
                                  <div class="form-group col-xs-12 floating-label-form-group controls">
                                      <label>Company</label>
                                      <input type="text" class="form-control" placeholder="Company" id="company" name="company" required data-validation-required-message="Please Enter Vaccine Company.">
                                      <p class="help-block text-danger text-left"></p>
                                  </div>
                              </div>
                              <div class="row control-group text-left">
                                  <div class="form-group col-xs-12 floating-label-form-group controls">
                                      <label>Frequency</label>
                                      <input type="hidden" id="frequency" name="frequency" value="">
                                      <input type="text" placeholder="Frecuency" readonly="readonly" style="width=170px">
                                        <div class="btn-group" role="group" aria-label="...">
                                          <button type="button" class="btn btn-default" id="btnSetAnnual" onclick="vaccineList.setFrequency(this, 'annual');">Annual</button>
                                          <button type="button" class="btn btn-default" id="btnSetMontyly" onclick="vaccineList.setFrequency(this, 'monthly');">Monthly</button>
                                        </div>
                                      <p class="help-block text-danger text-left"></p>
                                  </div>
                              </div>
                              <br>
                              <div id="success"></div>
                              <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                              <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Save</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- //Modals for Insert -->
  <!-- Modals for Delete -->
  <div class="modal fade bs-example-modal-sm" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <form id="frm_delete" role="form" class="form">
          <input type="hidden" name="targetId" id="targetId" value="">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="vaccineList.resetAll();"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Confirm Delete</h4>
          </div>
          <div class="modal-body">
            <p>Do you want to Delete vaccine?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" onclick="vaccineList.resetAll();">Close</button>
            <button type="button" class="btn btn-danger" onclick="vaccineList.doDelete();">Delete</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- //Modals for Delete -->
@stop
@push('scripts')
  $(document).ready(function() {
    $("#searchOptions li a").click(function() {
      var optionText = $(this).prop("id");
      $("#searchOption").text($(this).text());
      $("#searchType").val(optionText);
    });
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
    $("#searchOptions li a[id='{{ $input['searchType'] }}']").click();
    $("#btnSetAnnual").click();
  });
  var search = {
    doSearch : function() {
      $("#frm_search").submit();
    }
  };
  var vaccineList = {
    setFrequency : function(btn, frequency) {
      $("#frequency").val(frequency);
      $(btn).removeClass("btn-default").addClass("btn-info");
      $(btn).siblings().removeClass("btn-info").addClass("btn-default");
    },
    toggleDelete : function(vaccineId){
      $("#targetId").val(vaccineId);
      $("#tr_"+vaccineId).addClass('active');
      $(".btn-danger").removeClass('hide');
    },
    resetAll : function() {
      $("table td.success").removeClass('success');
      $("#vaccineModal h2").text("ADD vaccine");
      $("#frm_addVaccine")[0].reset();
      $("#targetId").val('');
      $("#confirmModal .modal-body p").empty().append('Do you want to Delete Vaccine?');
      document.location.reload(true);
    },
    doDelete : function(){
      var vaccineId = $("#targetId").val();
      var url = '/admin/vaccine/delete/'+vaccineId;
      var post_data = { _token : $("#_token").val() };
      var message = "";
      var posting = $.post(url, post_data)
        .done(function(data){
          if(data.result==0 && data.error) {
            if(data.error.indexOf('FOREIGN KEY')>-1){
              message = "Whoops! Can't delete vaccine<br>It is used on some pets.";
            } else {
              message = data.error;
            }
          } else {
            message = "Deleted Successfully";
          }
        }).error(function(error){
          message = error;
        }).always(function() {
          $(".btn-danger").addClass('hide');
          vaccineList.setMsg(message, '#confirmModal');
        });
    },
    setMsg : function(message, targetDomId) {
      $(targetDomId + " .modal-body p").empty().append(message);
    }
  };
@endpush
