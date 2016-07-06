@extends('layout')
@section('title', 'Pet Transfer')
@section('content')
<section>
  <div id="contents" class="margin-left container">
    <div class="row">
      <div class="col-sm-12">
        @if (session('status'))
        <div class="alert alert-danger">
          {{ session('status') }}
        </div>
        @endif

        @if (count($userPets) === 0)
        @else
        @foreach ($userPets as $pet)
          <div class="form-box">
            <div class="form-top">
              <h3 class="glyphicon"><img src="/img/pet.png" style="padding-right:20px"> Pet Transfer</h3>
            </div><!-- /form-top-->
            <div class="form-bottom">
              <form  action="{{ asset('/user/petTransfer/add/'.$pet->petId)}}" method="post"  class="form-horizontal">
                <div class="form-group">
                  <label class="col-sm-2">QR code:</label>
                  <div class="col-sm-10">
                    <input type="number" name="qrCode" id="qrCode" class="form-control" value="{{$pet->qrCode}}" readonly>
                  </div> <!-- ./col-sm-10 -->
                </div> <!-- /.form-group-->
                <div class="form-group">
                  <label class="col-sm-2">Pet name</label>
                  <div class="col-sm-10">
                    <input type="text" name="petName" id="petName" class="form-pet-name form-control"  value="{{$pet->petName}}" readonly>
                  </div> <!-- ./col-sm-10 -->
                </div> <!-- .form-group -->
                <div class="form-group">
                  <label class="col-sm-2">DOB</label>
                  <div class="col-sm-10">
                    <input type="text" name="dob" id="dob" class="form-dbo-name form-control"  value="{{$pet->dob}}" readonly>
                  </div> <!-- ./col-sm-10 -->
                </div> <!-- .form-group -->
                <div class="form-group">
                  <label class="col-sm-2">Breed</label>
                  <div class="col-sm-10">
                    <input type="text" name="breed"  id="breed" class="form-breed form-control" value="{{$pet->breed}}"  readonly>
                  </div> <!-- ./col-sm-10 -->
                </div> <!-- .form-group -->
                <div class="form-group">
                  <label class="col-sm-2">Colour:</label>
                  <div class="col-sm-10">
                    <input type="text" name="colour"  id="colour" class="form-colour form-control" value="{{$pet->colour}}" readonly>
                  </div> <!-- ./col-sm-10 -->
                </div> <!-- .form-group -->
                {{--*/ $checkedM = ' ' /*--}}
                {{--*/ $checkedF = ' ' /*--}}
                @if ( $pet->gender  === 'F')
                {{--*/ $checkedF = 'checked=checked' /*--}}
                @else
                {{--*/ $checkedM = 'checked=checked' /*--}}
                @endif
                <div class="form-group ">
                  <label class="col-sm-2">Gender:</label>
                  <div class="col-sm-10">
                    <label class="radio-inline">
                      <input type="radio" name="gender" id="female" value="F"  {{ $checkedF}} disabled="disabled" >Female
                    </label>
                    <label class="radio-inline">
                      <input type="radio"  name="gender" id="male" value="M"  {{ $checkedM}} disabled="disabled" >Male
                    </label>
                  </div>
                </div> <!-- .form-group -->
                {{--*/ $isNeuter = ' ' /*--}}
                {{--*/ $notNeuter = ' ' /*--}}
                @if ( $pet->isNeutralized  === 0)
                {{--*/ $isNeuter = 'checked=checked ' /*--}}
                @else
                {{--*/ $notNeuter = 'checked=checked' /*--}}
                @endif
                <div class="form-group ">
                  <label class="col-sm-2">Neutralized</label>
                  <div class="col-sm-10">
                    <label class="radio-inline">
                      <input type="radio" name="isNeutralized" id="yes" value="0" {{ $isNeuter}} disabled="disabled"  >Yes
                    </label>
                    <label class="radio-inline">
                      <input type="radio"  name="isNeutralized" id="no" value="1"  {{ $isNeuter}} disabled="disabled" >No
                    </label>
                  </div>
                </div> <!-- .form-group -->
                {{--*/ $isAdopted = ' ' /*--}}
                {{--*/ $notAdopted = ' ' /*--}}
                @if ( $pet->isAdopted  === 0)
                {{--*/ $isAdopted  = 'checked=checked' /*--}}
                @else
                {{--*/ $notAdopted = 'checked=checked' /*--}}
                @endif
                <div class="form-group ">
                  <label class="col-sm-2">Adoped</label>
                  <div class="col-sm-10">
                    <label class="radio-inline">
                      <input type="radio" name="isAdoped" id="yes" value="0"  {{ $isAdopted}}  disabled="disabled" >Yes
                    </label>
                    <label class="radio-inline">
                      <input type="radio"  name="isAdoped" id="no" value="1"   {{ $notAdopted}} disabled="disabled" >No
                    </label>
                  </div>
                </div> <!-- .form-group -->
                <div class="form-group">
                  <label class="col-sm-2">Adoped Date</label>
                  <div class="col-sm-10">
                    <input type="date" name="adoptedDate"  id="adoped_date" class="form-adopted-date form-control"  value="{{$pet->adoptedDate}}" readonly>
                  </div> <!-- ./col-sm-10 -->
                </div> <!-- .form-group -->
                <h4><img src="/img/pet.png" style="padding-right:20px">Old Owner</h4>
                <div class="form-group">
                  <label class="col-sm-2">Email address:</label>
                  <div class="col-sm-10">
                    <input type="email" name="email" id="email" class="form-control" value="{{Auth::user()->email}}" readonly>
                  </div> <!-- ./col-sm-10 -->
                </div> <!-- /.form-group-->
                <div class="form-group">
                  <label class="col-sm-2">First name:</label>
                  <div class="col-sm-10">
                    <input type="text" name="firstName" id="firstName" class="form-first-name form-control" value="{{Auth::user()->firstName}}" readonly>
                  </div> <!-- ./col-sm-10 -->
                </div> <!-- .form-group -->
                <div class="form-group">
                  <label class="col-sm-2">Last name:</label>
                  <div class="col-sm-10">
                    <input type="text" name="lastName"  id="lastName" class="form-last-name form-control" value="{{Auth::user()->lastName}}" readonly>
                  </div> <!-- ./col-sm-10 -->
                </div> <!-- .form-group -->
                <h4><img src="/img/pet.png" style="padding-right:20px">New Owner</h4>
                <div class="form-group">
                  <label class="col-sm-2">* Email address:</label>
                  <div class="col-sm-10">
                    <input type="email" name="newEmail" id="newEmail" class="form-control" required>
                  </div> <!-- ./col-sm-10 -->
                </div> <!-- /.form-group-->
                <div class="form-group">
                  <label class="col-sm-2">First name:</label>
                  <div class="col-sm-10">
                    <input type="text" name="newFirstName" id="newFirstName" class="form-first-name form-control">
                  </div> <!-- ./col-sm-10 -->
                </div> <!-- .form-group -->
                <div class="form-group">
                  <label class="col-sm-2">Last name:</label>
                  <div class="col-sm-10">
                    <input type="text" name="newLastName"  id="newLastName" class="form-last-name form-control" >
                  </div> <!-- ./col-sm-10 -->
                </div> <!-- .form-group -->
                @endforeach
                @endif
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-primary btn-block glyphicon glyphicon-transfer"> Transfer</button>
              </div><!-- /.form-bottom-->
            </div> <!-- /.form-box-->
          </form>
        </div> <!-- /.col-sm-12-->
      </div> <!-- /.row -->
    </div><!-- /.content-->
  </section>
  @stop
