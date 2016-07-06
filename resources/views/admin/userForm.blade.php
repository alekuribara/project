@extends('layout')
@section('title', 'Admin - Exam List')
@section('content')
  <section>
    <div class="row text-center">
      <h2>Admin - Update User</h2>
      <hr class="star-primary">
      <div class="col-md-10">
        @if (session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
        @endif
        <form name="addUser" id="frm_addUser" method="post" action="/admin/user/update/{{ $records->id }}" novalidate>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">  {{-- should have this hidden input --}}
          <input type="hidden" name="userId" id="userId" value="{{ $records->id }}">
          <div class="row control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                  <label>email</label>
                  <input type="email" name="email" id="email" class="form-control readonly" value="{{ $records->email }}" readonly>
                  <p class="help-block text-danger text-left"></p>
              </div>
          </div>
          <div class="row control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                  <label>First name</label>
                  <input type="text" name="firstName" id="firstName" placeholder="* First name" value="{{ $records->firstName }}" class="form-first-name form-control" required data-validation-required-message="Please Enter First Name.">
                  <p class="help-block text-danger text-left"></p>
              </div>
          </div>
          <div class="row control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                  <label>Last name</label>
                  <input type="text" name="lastName"  id="lastName" placeholder="* Last name" value="{{ $records->lastName }}" class="form-last-name form-control" required data-validation-required-message="Please Enter Last Name.">
                  <p class="help-block text-danger text-left"></p>
              </div>
          </div>
          <div class="row control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                  <label>Address</label>
                  <input type="text" name="address_st"  id="address_st" placeholder="* Address" value="{{ $records->address_st }}" class="form-address form-control" required data-validation-required-message="Please Enter Address.">
                  <p class="help-block text-danger text-left"></p>
              </div>
          </div>
          <div class="row control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                  <label>Suburb</label>
                  <input type="text" name="address_sub"  id="address_sub" placeholder="Suburb" value="{{ $records->address_sub }}" class="form-suburb form-control">
                  <p class="help-block text-danger text-left"></p>
              </div>
          </div>
          <div class="row control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>City</label>
              <input type="text" name="address_city" id="address_city" placeholder="* City" class="form-city form-control" value="{{ $records->address_city }}" required data-validation-required-message="Please Enter City.">
              <p class="help-block text-danger text-left"></p>
            </div>
          </div>
          <div class="row control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                  <label>Postcode</label>
                  <input type="number" name="postcode"  id="postcode" placeholder="* Postcode" value="{{ $records->postcode }}" class="form-weight form-control" required data-validation-required-message="Please Enter Postcode.">
                  <p class="help-block text-danger text-left"></p>
              </div>
          </div>
          <div class="row control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                  <label>Phone number</label>
                  <input type="number" name="phone" id="phone" placeholder="* Phone number : 022123123" value="{{ $records->phone }}" class="form-phone form-control" required data-validation-required-message="Please Enter Phone Number.">
                  <p class="help-block text-danger text-left"></p>
              </div>
          </div>
          <div class="row control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                  <label>New password</label>
                  <input type="password" name="new_password" class="form-control" placeholder="* New password">
                  <p class="help-block text-danger text-left"></p>
              </div>
          </div>
          <div class="row control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                  <label>Confirm password</label>
                  <input type="password" name="new_password_confirm" data-validation-matches-match="new_password" class="form-control" placeholder="* Confirm New password" data-validation-matches-message="Must match password entered above.">
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
  var user = {
  }
@endpush
