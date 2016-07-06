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
  'as' => 'register'
]);
<<<<<<< HEAD
Route::get('/user/loginPanel',[
  'uses' => 'UserController@showLoginPanel',
  'as' => 'loginPanel'
]);

//Route::group(['middleware' => [ 'web' ]], function(){


Route::get('/user/profile', 'UserController@showProfile');
Route::get('/user/petRegister','UserController@showPetRegister');
Route::get('/user/petTransfer','UserController@showPetTransfer');

Route::get('/pet/petHistory',  'PetController@showPetHistory');

//});

//Route::get('/profile/{userId}', function($userId) {
//});

Route::any('/lostnfound', 'LostnFoundController@showPage');

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
=======
Route::get('/lostnfound', 'LostnFoundController@showPage');
Route::post('/lostnfound', 'LostnFoundController@doSearch');
/*
Routes - Middleware - auth
*/
Route::group(['middleware' => [ 'auth' ]], function(){
  Route::get('/user/petRegister',[
    'uses' => 'PetRegisterController@showPetRegister',
    'as' => 'petRegister'
  ]);
  Route::post('/user/petRegister',[
    'uses' => 'PetRegisterController@savePetRegister',
    'as' => 'savePetRegister'
  ]);
  Route::get('/user/loginPanel',[
    'uses' => 'LoginPanelController@showLoginPanel',
    'as' => 'loginPanel'
  ]);
  Route::get('/user/profile',[
    'uses' => 'ProfileController@showProfile',
    'as' => 'showProfile'
  ]);
  Route::post('/user/profile',[
    'uses' => 'ProfileController@updateProfile',
    'as' => 'updateProfile'
  ]);
  Route::get('/user/petTransfer',[
    'uses' => 'UserController@showPetTransfer',
    'as' => 'showPetTransfer'
  ]);
  Route::get('/pet/petHistory',[
    'uses' => 'PetController@showPetHistory',
    'as' => 'showPetHistory'
  ]);

  Route::get('/admin/user', 'AdminController@showUser');
  Route::post('/admin/addUser', 'AdminController@addUser');
  Route::get('/admin/vaccine', 'AdminController@showVaccine');
  Route::post('/admin/addVaccine', 'AdminController@addVaccine');
  Route::get('/admin/exam', 'AdminController@showExam');
  Route::post('/admin/addExam', 'AdminController@addExam');

  Route::get('logout',[
    'uses' => 'UserController@getLogout',
    'as' => 'logout'
  ]);
});
>>>>>>> feature/alekuri03
