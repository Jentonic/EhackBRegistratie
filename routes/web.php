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

   Route::resource('registration', 'RegistrationController',['except' => ['index','destroy']]);

    // Display form to register
    Route::get('register', 'RegistrationController@create');

    // Store a new Team
    Route::post('registerteam', 'RegistrationController@storeTeam');

    Route::get('invite','RegisterController@')

});
