<?php
namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\QueryException;
use Request, Redirect;
use App\TblUser, App\TblPet, App\TblVaccine, App\TblExam;
/**
* AdminController
* @extends BaseController
* for all admin pages
*/
class AdminController extends Controller
{
  const ROW_PER_PAGE = 10; //rows for per page
  /* admin/user  ************************************************/
    //User List
    public function showUserList() {
      //get input data
      $searchType = Request::get('searchType');
      $searchText = Request::get('searchText');

      //make query
      $records;
      if(!empty($searchType) && $searchType!='Option') {
        $records = TblUser::where($searchType, 'like', $searchText.'%')->paginate(AdminController::ROW_PER_PAGE);
      } else {
        $records = TblUser::paginate(AdminController::ROW_PER_PAGE);
      }

      //set the path for pagination
      $records->setPath('/admin/user');

      //set return data
      $data = array(
        'records' => $records,
        'input' => array(
          'searchType' => $searchType,
          'searchText' => $searchText,
        )
      );
      //call view with data
      return view('admin.userList', $data);
    }

    //add User
    public function addUser() {
      try {
        //make query
        $TblUser = new TblUser;
        $TblUser->email = Request::get('signup_email');
        $TblUser->password = bcrypt(Request::get('signup_password'));
        $TblUser->firstName = Request::get('firstName');
        $TblUser->lastName = Request::get('lastName');
        $TblUser->address_st = Request::get('address_st');
        $TblUser->address_sub = Request::get('address_sub');
        $TblUser->address_city = Request::get('address_city');
        $TblUser->postcode = Request::get('postcode');
        $TblUser->phone = Request::get('phone');
        //save
        $result = $TblUser->save();

        return redirect()->to('admin/user');
      } catch (QueryException $error){
        //go back with error message
        $error = $error->errorInfo[2];
        return Redirect::back()->withInput()->with('error',$error);
      }
    }

    //show User form
    public function showUserForm($userId) {
      //query
      $records = TblUser::where('id', $userId)->first();;
      //set return data
      $data = array(
        'records' => $records
      );
      return view('admin.userForm', $data);
    }

    //update User
    public function updateUser($userId) {
      //get input data
      $password = Request::get('new_password');
      $updateFields = array (
        'firstName' => Request::get('firstName'),
        'lastName' => Request::get('lastName'),
        'address_st' => Request::get('address_st'),
        'address_sub' => Request::get('address_sub'),
        'address_city' => Request::get('address_city'),
        'postcode' => Request::get('postcode'),
        'phone' => Request::get('phone'),
      );
      //password can be changed only if input data has new password
      $trim = trim($password);
      if (empty($trim)==false) {
        $updateFields['password'] = bcrypt($password);
      }
      //save
      try {
        TblUser::where('id', $userId)->update($updateFields);

        return Redirect::route('adminUserList');
      } catch (QueryException $error){
        //go back with error message
        $error = $error->errorInfo[2];
        return Redirect::back()->withInput()->with('error',$error);
      }
    }

    //delete user
    public function deleteUser($userId) {
      //set return data
      $data = array (
        'result' => 0
      );
      try {
        $affectedRows = TblUser::where('id', $userId)->delete();
        $data['result'] = $affectedRows;
      } catch (QueryException $error){
        $data['error'] = $error->errorInfo[2];
      }
      return response()->json($data);
    }

  /* admin/vaccine  ************************************************/
    //vaccine list
    public function showVaccineList() {
      //get input data
      $searchType = Request::get('searchType');
      $searchText = Request::get('searchText');

      //make query
      $records;
      if(!empty($searchType) && $searchType!='Option') {
        $records = TblVaccine::where($searchType, 'like', $searchText.'%')->paginate(AdminController::ROW_PER_PAGE);
      } else {
        $records = TblVaccine::paginate(AdminController::ROW_PER_PAGE);
      }

      //set the path for pagination
      $records->setPath('/admin/vaccine');

      //set return data
      $data = array(
        'records' => $records,
        'input' => array(
          'searchType' => $searchType,
          'searchText' => $searchText,
        )
      );
      //call view
      return view('admin.vaccineList', $data);
    }

    //add vaccine
    public function addVaccine() {
      try {
        //make query
        $TblExam = new TblVaccine;
        $TblExam->name = Request::get('name');
        $TblExam->company = Request::get('company');
        $TblExam->frequency = Request::get('frequency');
        //save
        $result = $TblExam->save();
        return redirect()->to('admin/vaccine');
      } catch (QueryException $error){
        //go back with error message
        $error = $error->errorInfo[2];
        return Redirect::back()->withInput()->with('error',$error);
      }
    }

    //show vaccine form
    public function showVaccineForm($vaccineId) {
      //query
      $records = TblVaccine::where('vaccineId', $vaccineId)->first();;
      //set return data
      $data = array(
        'records' => $records
      );
      //call view
      return view('admin.vaccineForm', $data);
    }

    //update vaccine
    public function updateVaccine($vaccineId) {
      //get input data
      $name = Request::get('name');
      $company = Request::get('company');
      $frequency = Request::get('frequency');
      try {
        //query
        TblVaccine::where('vaccineId', $vaccineId)
                  ->update(['name' => $name,
                            'company' => $company,
                            'frequency' => $frequency]);

        return Redirect::route('adminVaccineList');
      } catch (QueryException $error){
        //go back with error message
        $error = $error->errorInfo[2];
        return Redirect::back()->withInput()->with('error',$error);
      }
    }

    //delete vaccine
    public function deleteVaccine($vaccineId) {
      //set return data
      $data = array (
        'result' => 0
      );
      try {
        //query
        $affectedRows = TblVaccine::where('vaccineId', $vaccineId)->delete();

        $data['result'] = $affectedRows;
      } catch (QueryException $error){
        $data['error'] = $error->errorInfo[2];
      }
      return response()->json($data);
    }

  /* admin/exam  ************************************************/
    //exam list
    public function showExamList() {
      //get input data
      $searchType = Request::get('searchType');
      $searchText = Request::get('searchText');

      //make query
      $records;
      if(!empty($searchType) && $searchType!='Option') {
        $records = TblExam::where($searchType, 'like', $searchText.'%')->paginate(AdminController::ROW_PER_PAGE);
      } else {
        $records = TblExam::paginate(AdminController::ROW_PER_PAGE);
      }
      //set the path for pagination
      $records->setPath('/admin/exam');

      //set return data
      $data = array(
        'records' => $records,
        'input' => array(
          'searchType' => $searchType,
          'searchText' => $searchText,
        )
      );
      //call view
      return view('admin.examList', $data);
    }

    //add exam
    public function addExam() {
      //get input data
      $name = Request::get('name');
      $requirement = Request::get('requirement');

      try {
        //make query
        $TblExam = new TblExam;
        $TblExam->name = $name;
        $TblExam->requirement = $requirement;
        //save
        $result = $TblExam->save();
        return redirect()->to('admin/exam');
      } catch (QueryException $error){
        //go back with error message
        $error = $error->errorInfo[2];
        return Redirect::back()->withInput()->with('error',$error);
      }
    }

    //show exam form
    public function showExamForm($examId) {
      //query
      $records = TblExam::where('examId', $examId)->first();;
      //set return data
      $data = array(
        'records' => $records
      );
      //call view
      return view('admin.examForm', $data);
    }

    //update exam
    public function updateExam($examId) {
      try {
        //query
        $affectedRows = TblExam::where('examId', $examId)
                              ->update(['name' => Request::get('name'),
                                        'requirement' => Request::get('requirement')]);

        return Redirect::route('adminExamList');
      } catch (QueryException $error){
        //go back with error message
        $error = $error->errorInfo[2];
        return Redirect::back()->withInput()->with('error',$error);
      }
    }

    //delete exam
    public function deleteExam($examId){
      //set return data
      $data = array (
        'result' => 0
      );
      try {
        //query
        $affectedRows = TblExam::where('examId', $examId)->delete();

        $data['result'] = $affectedRows;
      } catch (QueryException $error){
        //go back with error message
        $data['error'] = $error->errorInfo[2];
      }
      return response()->json($data);
    }
}
