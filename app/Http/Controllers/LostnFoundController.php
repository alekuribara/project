<?php
namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Request;
use App\TblPet;
/**
* LostnFoundController
* @extends Controller
* for lostnfound page
*/
class LostnFoundController extends Controller
{
  // use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
  use DispatchesCommands, ValidatesRequests;
  //showPage
  public function showPage() {
    //get input data
    $searchType = Request::get('searchType');
    $searchText = Request::get('searchText');

    //make query
    $query = TblPet::where('status', 'lost');
    if(empty($searchType)==false && $searchType!='Option') {
      if($searchType=='petName') {
        $query = $query->where($searchType, 'like', $searchText.'%');
      } else {
        $query = $query->where($searchType, $searchText);
      }
    }
    // execute query
    $records = $query->paginate(AdminController::ROW_PER_PAGE);

    //paginate
    $records->setPath('/lostnfound');

    //set return data
    $data = array(
      'records' => $records,
      'input' => array(
        'searchType' => $searchType,
        'searchText' => $searchText,
      )
    );
    //call view
    return view('lostnfound', $data);
  }

  public function searchQrCode() {
    $qrCode = Request::get('qrCode');
    // execute query
    $records = TblPet::join('tbluser', 'tblpet.id', '=', 'tbluser.id')
              ->select('tblpet.petId', 'tbluser.id', 'tbluser.email', 'tblpet.qrCode', 'tblpet.status')
              ->where('tblpet.status', 'lost')
              ->where('tblpet.qrCode', $qrCode)
              ->get();
    //set return data
    $data = array(
      'records' => $records
    );
    //call view
    return view('lostnfoundApp', $data);
  }
}
