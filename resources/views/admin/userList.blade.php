@extends('layout')
@section('title', 'Admin - User List')
@section('content')
  <section>
    <h2>Admin - User List</h2>
    <form class="form" id="frm_search" role="form">
      <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">  {{-- should have this hidden input --}}
      <input type="hidden" id="searchType" name="searchType">
      <div class="form-group">
        <label for="txtSearch" class="sr-only">Search words</label>
        <div class="input-group">
          <div class="input-group-btn">
            <button type="button" id="searchOption" class="search btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Option <span class="caret"></span></button>
            <ul id="searchOptions" class="dropdown-menu">
              <li><a href="#" id="Option">Option</a></li>
              <li><a href="#" id="email">Email</a></li>
              <li><a href="#" id="userName">User Name</a></li>
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
            <th>email</th>
            <th>User Name</th>
            <th>Address</th>
            <th>Phone</th>
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
            <tr>
              <td>{{ $startNo++ }}</td>
              <td>{{ $data->email }}</td>
              <td>{{ $data->firstName }} {{ $data->lastName }}</td>
              <td>{{ $data->address_st }} {{ $data->address_sub }} {{ $data->address_city }} {{ $data->postcode }}</td>
              <td>{{ $data->phone }}</td>
              <td class="text-center">
                <a class="btn-custom btn btn-xs" href="/admin/user/update/{{ $data->id }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                <a class="btn-custom btn toggle btn-xs" href="#confirmModal" onclick="userList.toggleDelete({{ $data->id }});" role="button" data-toggle="modal" ><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
              </td>
            </tr>
          @endforeach
        @endif
        </tbody>
      </table>
    </div>
    <div class="text-right">
      <a href="#userModal" class="btn btn-primary" data-toggle="modal" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add User</a>
    </div>
    <div class="text-center">
      <?php echo $records->appends(['searchType' => $input['searchType'], 'searchText' => $input['searchText']])->render(); ?>
    </div>
  </section>
  <!-- Modals for insert -->
  <div class="portfolio-modal modal fade" id="userModal" tabindex="-1" role="dialog" aria-hidden="true">
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
                          <h2>Add User</h2>
                          <hr class="star-primary">
                          <form name="addUser" id="frm_addUser" method="post" action="/admin/user/add" novalidate>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">  {{-- should have this hidden input --}}
                            <input type='text' name='action' value='sign_up' readonly hidden>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>email</label>
                                    <input type="email" name="signup_email" id="email" class="form-control"  placeholder="* Email address" required data-validation-required-message="Please Enter Email address.">
                                    <p class="help-block text-danger text-left"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Confirm email</label>
                                    <input type="email" name="email-confirm" data-validation-matches-match="signup_email" class="form-control"  placeholder="* Confirm email address" required data-validation-required-message="Please Enter Confirm Email address." data-validation-matches-message="Must match email address entered above.">
                                    <p class="help-block text-danger text-left"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>First name</label>
                                    <input type="text" name="firstName" id="firstName" placeholder="* First name" class="form-first-name form-control" required data-validation-required-message="Please Enter First Name.">
                                    <p class="help-block text-danger text-left"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Last name</label>
                                    <input type="text" name="lastName"  id="lastName" placeholder="* Last name" class="form-last-name form-control" required data-validation-required-message="Please Enter Last Name.">
                                    <p class="help-block text-danger text-left"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Address</label>
                                    <input type="text" name="address_st"  id="address_st" placeholder="* Address" class="form-address form-control" required data-validation-required-message="Please Enter Address.">
                                    <p class="help-block text-danger text-left"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Suburb</label>
                                    <input type="text" name="address_sub"  id="address_sub" placeholder="Suburb" class="form-suburb form-control">
                                    <p class="help-block text-danger text-left"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                              <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>City</label>
                                <input type="text" name="address_city" id="address_city" placeholder="* City" class="form-city form-control" required data-validation-required-message="Please Enter City.">
                                <p class="help-block text-danger text-left"></p>
                              </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Postcode</label>
                                    <input type="number" name="postcode"  id="postcode" placeholder="* Postcode" class="form-weight form-control" required data-validation-required-message="Please Enter Postcode.">
                                    <p class="help-block text-danger text-left"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Phone number</label>
                                    <input type="number" name="phone" id="phone" placeholder="* Phone number : 022123123" class="form-phone form-control" required data-validation-required-message="Please Enter Phone Number.">
                                    <p class="help-block text-danger text-left"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>password</label>
                                    <input type="password" name="signup_password" id="signup_password" class="form-control" placeholder="* Enter password" required data-validation-required-message="Please Enter Password." minlength="6" data-validation-minlength-message="The signup password must be at least 6 characters.">
                                    <p class="help-block text-danger text-left"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Confirm password</label>
                                    <input type="password" name="password_confirm" class="form-control" data-validation-matches-match="signup_password" placeholder="* Confirm password" required data-validation-required-message="Please Enter Confirm Password." data-validation-matches-message="Must match password entered above.">
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
  <!-- //Modals for insert -->
  <!-- Modals for Delete -->
  <div class="modal fade bs-example-modal-sm" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <form id="frm_delete" role="form" class="form">
          <input type="hidden" name="targetId" id="targetId" value="">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="userList.resetAll();"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Confirm Delete</h4>
          </div>
          <div class="modal-body">
            <p>Do you want to Delete User?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" onclick="userList.resetAll();">Close</button>
            <button type="button" class="btn btn-danger" onclick="userList.doDelete();">Delete</button>
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
  });
  var search = {
    doSearch : function() {
      $("#frm_search").submit();
    }
  };
  var userList = {
    toggleDelete : function(userId){
      $("#targetId").val(userId);
      $("#tr_"+userId).addClass('active');
      $(".btn-danger").removeClass('hide');
    },
    resetAll : function() {
      $("table td.success").removeClass('success');
      $("#userModal h2").text("ADD user");
      $("#frm_adduser")[0].reset();
      $("#targetId").val('');
      $("#confirmModal .modal-body p").empty().append('Do you want to Delete User?');
      document.location.reload(true);
    },
    doDelete : function(){
      var userId = $("#targetId").val();
      var url = '/admin/user/delete/'+userId;
      var post_data = { _token : $("#_token").val() };
      var message = "";
      var posting = $.post(url, post_data)
        .done(function(data){
          if(data.result==0 && data.error) {
            if(data.error.indexOf('FOREIGN KEY')>-1){
              message = "Whoops! Can't delete user<br>It is used on some pets.";
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
          userList.setMsg(message, '#confirmModal');
        });
    },
    setMsg : function(message, targetDomId) {
      $(targetDomId + " .modal-body p").empty().append(message);
    }
  };
@endpush
