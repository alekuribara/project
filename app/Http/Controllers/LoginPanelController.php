<?php
namespace App\Http\Controllers;
use App\TblUser;
use App\TblPet;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
/**
* LoginPanelController
* @extends Controller
* for Loginpanel
*/
class LoginPanelController extends Controller
{
  /**
  * Show Login login panel
  */
  public function showLoginPanel(){
    //get user data
    $firstName = Auth::user()->firstName;
    $userId       = Auth::user()->id;
    $userPets    = TblPet::all()->where('id', $userId);
    $pets = array( 'userPets' => $userPets);
    //call view with data
    return view('user.loginPanel',$pets)->with('firstName',$firstName);
  }
}
