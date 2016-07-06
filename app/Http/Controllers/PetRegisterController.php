<?php
namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\PetRequest;
use App\TblPet;
use \Storage;
/**
* PetRegisterController
* @extends BaseController
*/
class PetRegisterController extends Controller
{
  //savePetRegister
  public function savePetRegister(PetRequest $requestPet)
  {
    //get image file
    $destinationPath ="";
    if($requestPet->hasFile('picturePath')){
      $filePath = $requestPet->file('picturePath');
      $fileName = $filePath->getClientOriginalName();
      $destinationPath = config('app.fileDestinationPath').'/'.$fileName;
      $uploaded = Storage::put($destinationPath,file_get_contents($filePath->getRealPath()));
    }
    $userId = Auth::user()->id;
    //query, save pet
    try {
      TblPet::create([
        'id'         => $userId,
        'qrCode' => $requestPet['qrCode'],
        'petName' => $requestPet['petName'],
        'petType' => $requestPet['petType'],
        'breed' => $requestPet['breed'],
        'gender' => $requestPet['gender'],
        'dob' => $requestPet['dob'],
        'colour' => $requestPet['colour'],
        'isAdopted' => $requestPet['isAdopted'],
        'adoptedDate' => $requestPet['adoptedDate'],
        'isNeutralized' => $requestPet['isNeutralized'],
        'status' => $requestPet['status'],
        'picturePath'=>$destinationPath
      ]);
      return redirect()->route('loginPanel');
    } catch (QueryException $error){
      //go back with error message
      $error = $error->errorInfo[2];
      return Redirect::back()->withInput()->with('error',$error);
    }
  }
  //showPetRegister
  public function showPetRegister() {
    return view('user.petRegister');
  }
}
