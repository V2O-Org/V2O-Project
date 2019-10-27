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

// TEST ROUTES
Route::get('/', function () {
    return view('tester');
});

// Test Route - Login
Route::get('/vol-login',function(){
    return view('login');
});

// Test Route - Register
Route::get('/vol-reg',function(){
    return view('vol-register');
    });

Route::post('/',function(){
	return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Resource router for volunteer
Route::resource('volunteer', 'VolunteerController');

// Resource router for organisation
Route::resource('organisation', 'OrganisationController');

// Resource router for activities
Route::resource('activity', 'ActivityController');
