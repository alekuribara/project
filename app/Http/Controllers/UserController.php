<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticable as AuthenticableTrait;
use Illuminate\Auth\Guard;
use Illuminate\Database\QueryException;
use Illuminate\Database\PDOException;
use App\TblUser;
/**
* UserController
* @extends Controller
*/
class UserController extends Controller
{
  /**
  * Save user registration
  */
  public function saveRegister(Request $request)
  {
    //check validation
    try{  //start try-catch
      $this->validate($request, [
        'signup_email' => 'required|email|max:100|unique:tbluser,email',
        'signup_password' => 'required|min:6',
        'signup_password' => 'required|confirmed|min:6',
        'firstName' => 'required|max:50',
        'lastName' => 'required|max:50',
        'address_st' =>'required|max:50',
        'address_sub' =>'max:50',
        'address_city' =>'required|max:50',
        'postcode' =>'required|max:4',
        'phone'=>'required|max:12',
      ]);
      //save user
      $user = new TblUser;
      $user->email = $request['signup_email'];
      $user->password = bcrypt( $request['signup_password']);
      $user->firstName = $request['firstName'];
      $user->lastName = $request['lastName'];
      $user->address_st = $request['address_st'];
      $user->address_sub = $request['address_sub'];
      $user->address_city = $request['address_city'];
      $user->postcode = $request['postcode'];
      $user->phone = $request['phone'];
      $result = $user->save();
      Auth::login($user);
      return redirect()->route('loginPanel');
    } catch (QueryException $error){
      //go back with error message
      $error = $error->errorInfo[2];
      return Redirect::back()->withInput()->with('status',$error);
    }
  }
  /**
  * Check login information
  */
  public function checkLogin(Request $request) {
    //check validation
    $this->validate($request, [
      'email' => 'required|email|max:100',
      'password' => 'required|min:6',
    ]);
    //get user info from db
    $user = TblUser::where('email', $request['email'])->first();

    if(!$user) return Redirect::back()->with('status', 'Unknown email address')->withInput(['email'=>$request['email']]);

    if (Auth::attempt(array('email'=> $request['email'], 'password' => $request['password']))) {
      return redirect()->route('loginPanel');
    }
    return Redirect::back()->with('status','Wrong username/password combination.')->withInput();
  }
  /**
  * Show login page
  */
  public function showLogin() {
    return view('login');
  }
  /**
  * Account Logout
  */
  public function getLogout() {
    Auth::logout();
    return view('index');
  }
}
