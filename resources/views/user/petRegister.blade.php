@extends('layout')
@section('title', 'Pet Register')
@section('content')
<section>
  <div id="contents" class="margin-left container">
    <div class="row">
      <div class="col-sm-12">
        @if (session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
        @endif
        @include('errors.listErrors')
        <div class="form-box">
          <form role="form" action="{{route('savePetRegister')}}" method="post"  class="form-horizontal" enctype="multipart/form-data">
            <div class="form-top ">
              <h3 class="glyphicon"><img src="/img/pet.png" style="padding-right:20px">Pet Register</h3>
              <div class="row {{ $errors->has('picturePath') ? 'has-error' : ' ' }}">
                <div class="text-center ">
                  <img src="/img/petavatar.png" class="avatar img-circle img-thumbnail" alt="avatar" >
                  <input type="file"  name="picturePath" class="text-center center-block well well-sm"  required>
                </div><!-- /.text-center -->
              </div><!-- /.row -->
            </div><!-- /form-top-->
            <div class="form-bottom">
              <div class="form-group {{ $errors->has('qrCode') ? 'has-error' : ' ' }}">
                <label class="col-sm-2">* QR code:</label>
                <div class="col-sm-10">
                  <input type="number" name="qrCode" id="qrCode" class="form-control" value="{{ Request::old('qrCode')}}" required>
                </div> <!-- ./col-sm-10 -->
              </div> <!-- /.form-group-->
              <div class="form-group {{ $errors->has('petName') ? 'has-error' : ' ' }}">
                <label class="col-sm-2">* Pet name</label>
                <div class="col-sm-10">
                  <input type="text" name="petName" id="petName" class="form-pet-name form-control"  value="{{ Request::old('petName')}}" required>
                </div> <!-- ./col-sm-10 -->
              </div> <!-- .form-group -->
              <div class="form-group {{ $errors->has('dob') ? 'has-error' : ' ' }}">
                <label class="col-sm-2">* DOB</label>
                <div class="col-sm-10">
                  <input type="date" name="dob" id="dob" class="form-dbo-name form-control" value="{{ Request::old('dob')}}" required>
                </div> <!-- ./col-sm-10 -->
              </div> <!-- .form-group -->
              <div class="form-group {{ $errors->has('breed') ? 'has-error' : ' ' }}">
                <label class="col-sm-2">* Breed</label>
                <div class="col-sm-10">
                  <input type="text" name="breed"  id="breed" class="form-breed form-control" value="{{ Request::old('breed')}}" required>
                </div> <!-- ./col-sm-10 -->
              </div> <!-- .form-group -->
              <div class="form-group {{ $errors->has('colour') ? 'has-error' : ' ' }}">
                <label class="col-sm-2">* Colour:</label>
                <div class="col-sm-10">
                  <input type="text" name="colour"  id="colour" class="form-colour form-control" value="{{ Request::old('colour')}}" required>
                </div> <!-- ./col-sm-10 -->
              </div> <!-- .form-group -->
              <div class="form-group {{ $errors->has('petType') ? 'has-error' : ' ' }}">
                <label class="col-sm-2">* Pet type:</label>
                <div class="col-sm-10">
                  <input type="text" name="petType"  id="colour" class="form-colour form-control" value="{{ Request::old('petType')}}" required>
                </div> <!-- ./col-sm-10 -->
              </div> <!-- .form-group -->
              {{--*/ $checkedM = ' ' /*--}}
              {{--*/ $checkedF = ' ' /*--}}
              {{--*/ $gender =  Request::old('gender') /*--}}
              @if ( $gender  === 'F')
              {{--*/ $checkedF = 'checked=checked' /*--}}
              @else
              {{--*/ $checkedM = 'checked=checked' /*--}}
              @endif
              <div class="form-group {{ $errors->has('gender') ? 'has-error' : ' ' }}">
                <label class="col-sm-2">* Gender:</label>
                <div class="col-sm-10">
                  <label class="radio-inline">
                    <input type="radio" name="gender" id="female" value="F" {{ $checkedF}} >Female
                  </label>
                  <label class="radio-inline">
                    <input type="radio"  name="gender" id="male" value="M" {{ $checkedM}} >Male
                  </label>
                </div> <!-- .col-sm-10 -->
              </div> <!-- .form-group -->
              {{--*/ $checkedYes = ' ' /*--}}
              {{--*/ $checkedNo = ' ' /*--}}
              {{--*/ $isNeutralized =  Request::old('isNeutralized')  /*--}}
              @if ( $isNeutralized  === '0')
              {{--*/ $checkedYes = 'checked=checked' /*--}}
              @else
              {{--*/ $checkedNo = 'checked=checked' /*--}}
              @endif
              <div class="form-group {{ $errors->has('isNeutralized') ? 'has-error' : ' ' }} ">
                <label class="col-sm-2">* Neutralized</label>
                <div class="col-sm-10">
                  <label class="radio-inline">
                    <input type="radio" name="isNeutralized" id="yes" value="0" {{ $checkedYes}}>Yes
                  </label>
                  <label class="radio-inline">
                    <input type="radio"  name="isNeutralized" id="no" value="1"  {{ $checkedNo}}>No
                  </label>
                </div> <!-- .col-sm-10 -->
              </div> <!-- .form-group -->
              {{--*/ $checkedYes = ' ' /*--}}
              {{--*/ $checkedNo = ' ' /*--}}
              {{--*/ $isAdopted =  Request::old('isAdopted')  /*--}}
              @if ( $isAdopted === '0')
              {{--*/ $checkedYes = 'checked=checked' /*--}}
              @else
              {{--*/ $checkedNo = 'checked=checked' /*--}}
              @endif
              <div class="form-group {{ $errors->has('isAdopted') ? 'has-error' : ' ' }}">
                <label class="col-sm-2">* Adoped</label>
                <div class="col-sm-10">
                  <label class="radio-inline">
                    <input type="radio" name="isAdopted" id="yes" value="0" {{ $checkedYes}}>Yes
                  </label>
                  <label class="radio-inline">
                    <input type="radio"  name="isAdopted" id="no" value="1" {{ $checkedNo}}>No
                  </label>
                </div> <!-- .col-sm-10 -->
              </div> <!-- .form-group -->
              <label class="col-sm-2">Adoped Date</label>
              <div class="col-sm-10">
                <input type="date" name="adoptedDate"   class="form-control" value="{{ Request::old('adoptedDate')}}" >
              </div> <!-- ./col-sm-10 -->
              {{--*/ $checkedL = ' ' /*--}}
              {{--*/ $checkedF = ' ' /*--}}
              {{--*/ $status =  Request::old('status')  /*--}}
              @if ( $status === 'lost')
              {{--*/ $checkedL = 'checked=checked' /*--}}
              @else
              {{--*/ $checkedF = 'checked=checked' /*--}}
              @endif
              <div class="form-group {{ $errors->has('status') ? 'has-error' : ' ' }} ">
                <label class="col-sm-2">Status</label>
                <div class="col-sm-10">
                  <label class="radio-inline">
                    <input type="radio" name="status" id="status" value="lost" {{ $checkedL}}>Lost
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="status" id="status" value="found" {{ $checkedF}}>Found
                  </label>
                </div> <!-- .col-sm-10 -->
              </div> <!-- .form-group -->
              <button type="submit"  value="savePet" class="btn btn-primary btn-block glyphicon glyphicon-plus"> Save</button>
              <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
          </div><!-- /.form-bottom-->
        </div> <!-- /.form-box-->
      </div> <!-- /.col-sm-12-->
    </div> <!-- /.row -->
  </div><!-- /.content-->
</section>
@stop
