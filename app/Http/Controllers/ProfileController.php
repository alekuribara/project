<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Http\Requests\ProfileRequest;
use App\TblUser;
/**
* ProfileController
* @extends Controller
*/
class ProfileController extends Controller
{
  /**
  * Show User Profile
  */
  public function showProfile() {
    return view('user.profile');
  }
  /**
  * UpdateUser Profile
  */
  public function updateProfile(ProfileRequest $request) {
    try {
      $user = new TblUser();
      //save profile
      TblUser::where('email', $request['email'])
      ->update(['firstName' => $request['firstName'],
      'lastName' => $request['lastName'],
      'address_st' => $request['address_st'],
      'address_sub' => $request['address_sub'],
      'address_city' => $request['address_city'],
      'postcode' => $request['postcode'],
      'phone' => $request['phone'],
      'password' => bcrypt($request['password'])
    ]);
    return Redirect::back()->with('status','Profile Updated!');
  } catch (QueryException $error){
    //go back with error message
    $error = $error->errorInfo[2];
    return Redirect::back()->withInput()->with('error',$error);
  }
}
}
