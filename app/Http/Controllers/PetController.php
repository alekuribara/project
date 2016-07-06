<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Database\QueryException;
use App\Http\Requests\PetUpdateRequest;
use Request, Redirect;
use Illuminate\Support\Facades\Auth;
use App\TblUser, App\TblPet;
use App\TblVaccine, App\TblExam;
use App\TblExamHistory, App\TblVaccineHistory;
/**
* PetController
* @extends BaseController
* for pet history
*/
class PetController extends BaseController
{
  //constants
  const TAB_VACCINE = 'vaccine';
  const TAB_EXAM = 'exam';
  //showPetHistory
  public function showPetHistory($petId){
    //get request data
    $tab = Request::get('tab');
    $pet = TblPet::where('petId', $petId)->get();
    //set default data
    if(!isset($tab)) {
      $tab = PetController::TAB_VACCINE;
    }

    //return data
    $records;
    //make query based on tab
    if($tab == PetController::TAB_VACCINE) {
      //vaccine history for pet
      $records = TblVaccineHistory::join('tblvaccine', 'tblvaccinehistory.vaccineId', '=', 'tblvaccine.vaccineId')
                ->select('tblvaccinehistory.petId', 'tblvaccinehistory.vaccineId', 'tblvaccine.name', 'tblvaccinehistory.date', 'tblvaccinehistory.boosterDate')
                ->where('tblvaccinehistory.petId', $petId)
                ->orderBy('tblvaccinehistory.date', 'desc')->get();
    } else if($tab == PetController::TAB_EXAM) {
      //exam history for pet
      $records = TblExamHistory::join('tblexam', 'tblexamhistory.examId', '=', 'tblexam.examId')
                ->select('tblexamhistory.petId', 'tblexamhistory.examId', 'tblexam.name', 'tblexamhistory.date', 'tblexamhistory.result')
                ->where('tblexamhistory.petId', $petId)
                ->orderBy('tblexamhistory.date', 'desc')->get();
    }
    //set return data
    $data = array(
      'records' => $records,
      'pets' => $pet,
      'input' => array(
        'tab' => $tab,
        'petId' => $petId
      )
    );
    //call view with data
    return view('pet.petHistory', $data);
  }
  //showHistoryForm
  public function showHistoryForm($petId) {
    //get request data
    $userId = Auth::user()->id;
    $tab = Request::get('tab');
    $id = Request::get('id');
    $date = Request::get("date");
    $boosterDate = Request::get("boosterDate");
    $result = Request::get("result");
    //set default data
    if(!isset($tab)) {
      $tab = PetController::TAB_VACCINE;
    }
    //query
    $pets = TblPet::where('id', $userId)->get();
    $vaccineList = TblVaccine::all();
    $examList = TblExam::all();
    //set return data
    $data = array(
      'pets' => $pets,
      'vaccineList' => $vaccineList,
      'examList' => $examList,
      'input' => array(
        'examList' => $petId,
        'date' => $date,
        'boosterDate' => $boosterDate,
        'result' => $result,
        'tab' => $tab,
        'id' => $id,
        'petId' => $petId,
      )
    );
    return view('pet.petHistoryForm', $data);
  }
  //addPetHistory
  public function addPetHistory($petId) {
    //get input data
    $userId = Auth::user()->id;
    $tab = Request::get('tab');
    $vaccineId = Request::get('vaccineId');
    $examId = Request::get('examId');
    $date = Request::get("date");
    $result = Request::get("result");
    $boosterDate;
    try {
      //make query based on tab
      if($tab == PetController::TAB_VACCINE) {
        //vaccindshitory
        $TblVaccineHistory = new TblVaccineHistory;
        $TblVaccineHistory->petId = $petId;
        $TblVaccineHistory->vaccineId = $vaccineId;
        $TblVaccineHistory->date = $date;
        if(isset($date)){
          $newDate = new \DateTime(Request::get("date"));
          $boosterDate = $newDate->add(new \DateInterval('P1Y'));
          $TblVaccineHistory->boosterDate = $boosterDate;
        }
        //save
        $result = $TblVaccineHistory->save();
      } else if($tab == PetController::TAB_EXAM) {
        //examhistory
        $TblExamHistory = new TblExamHistory;
        $TblExamHistory->petId = $petId;
        $TblExamHistory->examId = $examId;
        $TblExamHistory->date = $date;
        $TblExamHistory->result = $result;
        //save
        $result = $TblExamHistory->save();
      }
      $data = array(
        'tab' => $tab,
        'petId' => $petId
      );
      return redirect()->to('pet/petHistory/'.$petId.'?tab='.$tab);
    } catch (QueryException $error){
      //go back with error message
      $error = $error->errorInfo[2];
      return Redirect::back()->withInput()->with('error',$error);
    }
  }
  //updatePet information
  public function updatePet(PetUpdateRequest $request){
    try {
      $pet = new TblPet();
      //query
      TblPet::where('qrCode', $request['qrCode'])
            ->update(['dob' => $request['dob'],
            'breed' => $request['breed'],
            'colour' => $request['colour'],
            'petType' => $request['petType'],
            'gender' => $request['gender'],
            'isAdopted' => $request['isAdopted'],
            'adoptedDate' => $request['adoptedDate'],
            'isNeutralized' => $request['isNeutralized']
          ]);

      return Redirect::back()->with('status','Pet updated successfully!');
    } catch (QueryException $error){
      //go back with error message
      $error = $error->errorInfo[2];
      return Redirect::back()->withInput()->with('error',$error);
    }
  }
}
