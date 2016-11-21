<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'web'], function () {

  Route::get('/', 'RegistrationController@index');

  Route::get('/get/teams/{gameid}','RegistrationController@ajaxTeams');

  Route::resource('registration', 'RegistrationController',['except' => ['index','destroy']]);

<<<<<<< HEAD
    Route::get('invite','RegisterController@createMailInvite');





    Route::get('test','RegistrationController@test');
=======
  // Display form to register Casual
  Route::get('registerCasual', 'RegistrationController@createCasual');

  // Display form to register Public
  Route::get('registerPublic', 'RegistrationController@createPublic');

  // Display form to register
  Route::get('register', 'RegistrationController@create');

  // Store a new Casual
  Route::post('registercasual', 'RegistrationController@storeCasual');

  // Store a new Public
  Route::post('registerpublic', 'RegistrationController@storePublicTeam');

  // Store a new Team
  Route::post('registerteam', 'RegistrationController@storeTeam');

  Route::get('invite/{token}','RegistrationController@createMailInvite');
>>>>>>> master

});
