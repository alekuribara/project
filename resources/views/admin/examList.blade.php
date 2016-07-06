@extends('layout')
@section('title', 'Admin - Exam List')
@section('content')
  <section>
    <h2>Admin - Exam List</h2>
    <form class="form" id="frm_search" role="form" action="/admin/exam">
      <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">  {{-- should have this hidden input --}}
      <input type="hidden" id="searchType" name="searchType" value="name">
      <div class="form-group">
        <label for="txtSearch" class="sr-only">Search words</label>
        <div class="input-group">
          <div class="input-group-btn">
            <button type="button" id="searchOption" class="search btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Exam Name
            <!--<span class="caret"></span>--></button>
            <!-- <ul id="searchOptions" class="dropdown-menu">
              <li><a href="#" id="name">Eaxm Name</a></li>
            </ul> -->
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
            <th>Exam Name</th>
            <th>Requirement</th>
            <th width="80px"></th>
          </tr>
        </thead>
        <tbody>
        @if (count($records) === 0)
          <tr>
            <td colspan="4" class="text-center no-result">
                No data to show.
            </td>
          </tr>
        @else
          {{-- */ $startNo = (($records->currentPage()-1) * $records->perPage()) + 1 /* --}}
          @foreach ($records as $data)
            <tr id="tr_{{ $data->examId }}">
              <td>{{ $startNo++ }}</td>
              <td class="data-name">{{ $data->name }}</td>
              <td class="data-requirement">{{ $data->requirement }}</td>
              <td class="text-center">
                <a class="btn-custom btn btn-xs" href="/admin/exam/update/{{ $data->examId }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                <a class="btn-custom btn toggle btn-xs" href="#confirmModal" onclick="examList.toggleDelete({{ $data->examId }});" role="button" data-toggle="modal" ><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
              </td>
            </tr>
          @endforeach
        @endif
        </tbody>
      </table>
    </div>
    <div class="text-right">
      <a href="#examModal" class="btn btn-primary" data-toggle="modal" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Exam</a>
    </div>
    <div class="text-center">
      <?php echo $records->appends(['searchType' => $input['searchType'], 'searchText' => $input['searchText']])->render(); ?>
    </div>
  </section>
  <!-- Modals for Insert -->
  <div class="portfolio-modal modal fade" id="examModal" tabindex="-1" role="dialog" aria-hidden="true">
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
                          <h2>Add Exam</h2>
                          <hr class="star-primary">
                            <form name="addExam" id="frm_addExam" method="post" action="/admin/exam/add" novalidate>
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">  {{-- should have this hidden input --}}
                              <div class="row control-group">
                                  <div class="form-group col-xs-12 floating-label-form-group controls">
                                      <label>Name</label>
                                      <input type="text" class="form-control" placeholder="Name" id="name" name="name" required data-validation-required-message="Please enter Exam name.">
                                      <p class="help-block text-danger text-left"></p>
                                  </div>
                              </div>
                              <div class="row control-group">
                                  <div class="form-group col-xs-12 floating-label-form-group controls">
                                      <label>Requirement</label>
                                      <input type="text" class="form-control" placeholder="Requirement" id="requirement" name="requirement" data-validation-required-message="Please enter Requirement.">
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
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="examList.resetAll();"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Confirm Delete</h4>
          </div>
          <div class="modal-body">
            <p>Do you want to Delete Exam?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" onclick="examList.resetAll();">Close</button>
            <button type="button" class="btn btn-danger" onclick="examList.doDelete();">Delete</button>
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
  });
  var search = {
    doSearch : function() {
      $("#frm_search").submit();
    }
  };
  var examList = {
    toggleDelete : function(examId){
      $("#targetId").val(examId);
      $(".btn-danger").removeClass('hide');
    },
    resetAll : function() {
      $("table td.success").removeClass('success');
      $("#examModal h2").text("ADD EXAM");
      $("#frm_addExam")[0].reset();
      $("#targetId").val('');
      $("#confirmModal .modal-body p").empty().append('Do you want to Delete Exam?');
      document.location.reload(true);
    },
    doDelete : function(){
      var examId = $("#targetId").val();
      var url = '/admin/exam/delete/'+examId;
      var post_data = { _token : $("#_token").val() };
      var message = "";
      var posting = $.post(url, post_data)
        .done(function(data){
          if(data.result==0 && data.error) {
            if(data.error.indexOf('FOREIGN KEY')>-1){
              message = "Whoops! Can't delete exam<br>It is used on some pets.";
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
          examList.setMsg(message, '#confirmModal');
        });
    },
    setMsg : function(message, targetDomId) {
      $(targetDomId + " .modal-body p").empty().append(message);
    }
  };
@endpush
