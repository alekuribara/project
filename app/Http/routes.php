<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
  return View::make('index', array('pagename' => 'index'));
});
/*
|--------------------------------------------------------------------------
| Static Pages
|--------------------------------------------------------------------------
*/
Route::get('/dogVaccine',[
  'uses' => 'PageController@showDogVaccine',
  'as' => 'dogVaccine'
]);
Route::get('/catVaccine',[
  'uses' => 'PageController@showCatVaccine',
  'as' => 'catVaccine'
]);
Route::get('/medCompare',[
  'uses' => 'PageController@showMedCompare',
  'as' => 'medCompare'
]);
Route::get('/petAccessories',[
  'uses' => 'PageController@showPetAccessories',
  'as' => 'petAccessories'
]);
Route::get('/petFood',[
  'uses' => 'PageController@showPetFood',
  'as' => 'petFood'
]);
Route::get('/petTravel',[
  'uses' => 'PageController@showPetTravel',
  'as' => 'petTravel'
]);
/*
|--------------------------------------------------------------------------
| Login/Register pages
|--------------------------------------------------------------------------
*/
Route::get('/login',[
  'uses' => 'UserController@showLogin',
  'as' => 'login'
]);
Route::post('/login',[
  'uses' => 'UserController@checkLogin',
  'as' => 'checkLogin'
]);
Route::post('/register',[
  'uses' => 'UserController@saveRegister',
  'as' => 'saveRegister'
]);
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::any('/admin/user', [
  'as' => 'adminUserList',
  'uses' => 'AdminController@showUserList'
]);
Route::post('/admin/user/add', 'AdminController@addUser');
Route::get('/admin/user/update/{userId}', 'AdminController@showUserForm');
Route::post('/admin/user/update/{userId}', 'AdminController@updateUser');
Route::post('/admin/user/delete/{userId}', 'AdminController@deleteUser');

Route::any('/admin/vaccine', [
  'as' => 'adminVaccineList',
  'uses' => 'AdminController@showVaccineList'
]);
Route::get('/admin/vaccine/update/{vaccineId}', 'AdminController@showVaccineForm');
Route::post('/admin/vaccine/add', 'AdminController@addVaccine');
Route::post('/admin/vaccine/update/{vaccineId}', 'AdminController@updateVaccine');
Route::post('/admin/vaccine/delete/{vaccineId}', 'AdminController@deleteVaccine');

Route::any('/admin/exam', [
  'as' => 'adminExamList',
  'uses' => 'AdminController@showExamList'
]);
Route::get('/admin/exam/update/{examId}', 'AdminController@showExamForm');
Route::post('/admin/exam/add', 'AdminController@addExam');
Route::post('/admin/exam/update/{examId}', 'AdminController@updateExam');
Route::post('/admin/exam/delete/{examId}', 'AdminController@deleteExam');
/*
|--------------------------------------------------------------------------
| Lost and Found Controller
|--------------------------------------------------------------------------
*/
Route::any('/lostnfound', 'LostnFoundController@showPage');
Route::any('/app/lostnfound', [
  'uses' => 'LostnFoundController@searchQrCode',
  'as' => 'lostnfoundApp'
]);
/*
|--------------------------------------------------------------------------
| Middleware - auth
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => [ 'auth' ]], function(){
  Route::get('/user/petRegister',[
    'uses' => 'PetRegisterController@showPetRegister',
    'as' => 'petRegister'
  ]);
  /*
  |--------------------------------------------------------------------------
  | Pet Register
  |--------------------------------------------------------------------------
  */
  Route::post('/user/petRegister',[
    'uses' => 'PetRegisterController@savePetRegister',
    'as' => 'savePetRegister'
  ]);
  /*
  |--------------------------------------------------------------------------
  | Login Panel
  |--------------------------------------------------------------------------
  */
  Route::get('/user/loginPanel',[
    'uses' => 'LoginPanelController@showLoginPanel',
    'as' => 'loginPanel'
  ]);
  /*---------------------------- User Profile  -----------------------------*/
  Route::get('/user/profile',[
    'uses' => 'ProfileController@showProfile',
    'as' => 'showProfile'
  ]);
  Route::post('/user/profile',[
    'uses' => 'ProfileController@updateProfile',
    'as' => 'updateProfile'
  ]);
/*------------------------------ Pet Transfer -----------------------------*/
  Route::get('/user/petChooseTransfer/',[
    'uses' => 'PetTransferController@choosePetTransfer',
    'as' => 'choosePetTransfer'
  ]);

  Route::post('/user/petTransfer/{id}',[
    'uses' => 'PetTransferController@showPetTransfer',
    'as' => 'showPetTransfer'
  ]);
  Route::post('/user/petTransfer/add/{id}',[
    'uses' => 'PetTransferController@savePetTransfer',
    'as' => 'savePetTransfer'
  ]);
  /*------------------------------ Pet History -----------------------------*/
  Route::get('/pet/petHistory/{id}',[
    'uses' => 'PetController@showPetHistory',
    'as' => 'showPetHistory'
  ]);
  Route::post('/pet/petHistory/{id}',[
    'uses' => 'PetController@updatePet',
    'as' => 'updatePet'
  ]);
  Route::get('/pet/petHistory/add/{id}', [
    'uses' => 'PetController@showHistoryForm',
    'as' => 'showHistoryForm'
  ]);
  Route::post('/pet/petHistory/add/{id}', 'PetController@addPetHistory');
  /*------------------------------- Logout ------------------------------*/
  Route::get('logout',[
    'uses' => 'UserController@getLogout',
    'as' => 'logout'
  ]);
});
