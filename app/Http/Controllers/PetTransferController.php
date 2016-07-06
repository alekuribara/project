<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Auth\Authenticatable;
use App\TblPet;
use App\TblUser;
/**
* PetTransferController
* @extends BaseController
*/
class PetTransferController extends BaseController
{
  //choosePetTransfer
  public function choosePetTransfer() {
    //auth
    $userId       = Auth::user()->id;
    //query
    $userPets    = TblPet::all()->where('id', $userId);
    $pets = array( 'userPets' => $userPets);
    //call view with data
    return view('user.petChooseTransfer',$pets);
  }
  /**
  * Show Pet to Transfer
  */
  public function showPetTransfer($petId) {
    //auth
    $userId       = Auth::user()->id;
    //query
    $userPets    = TblPet::where('petId', $petId)->get();
    $pets = array( 'userPets' => $userPets);
    //call view with data
    return view('user.petTransfer',$pets);
  }
  /**
  * Save pet transfered
  */
  public function savePetTransfer($petId, Request $request) {
    $newEmail = $request['newEmail'];
    //get user id
    $newUser = TblUser::where('email', $newEmail)->pluck('id');
    if($newUser){
      $pet = new TblPet();
      //save query
      $return = TblPet::where('petId', $petId)->update(['id' => $newUser]);
      return redirect('user/loginPanel')->with('status','Pet transfered successfully!');
    }
    // new owner doesn't exist
    return redirect('user/loginPanel')->with('statusError','New user not registered! Please sign-up first!')->withInput();
  }
}
