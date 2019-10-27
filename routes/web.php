<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can login web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// TEST ROUTES
Route::get('/', function () {
    return view('volunteer.tester');
});

// Test Route - Login
Route::get('/vol-login',function(){
    return view('auth.vol-login');
});

// Test Route - Login
Route::get('/vol-reg',function(){
    return view('auth.vol-login');
});

Route::post('/',function(){
	return view('welcome');
});

Auth::routes();

// Login Routes
Route::get('/vol/login', 'Auth\LoginController@showVolunteerLoginForm')->name('vol-login');
Route::post('/vol/login', 'Auth\LoginController@loginVolunteer');
Route::get('/org/login', 'Auth\LoginController@showOrganisationLoginForm')->name('org-login');
Route::post('/org/login', 'Auth\LoginController@loginOrganisation');

// Registration Routes
Route::get('/vol/register', 'Auth\RegisterController@showVolunteerRegisterForm')->name('vol-register');
Route::post('/vol/register', 'Auth\RegisterController@registerVolunteer');
Route::get('/org/register', 'Auth\RegisterController@showOrganisationRegisterForm')->name('org-register');
Route::post('/org/register', 'Auth\RegisterController@registerOrganisation');

// Home Router
Route::get('/home', 'HomeController@index')->name('home');

// Resource router for volunteer
Route::resource('volunteer', 'VolunteerController');

// Resource router for organisation
Route::resource('organisation', 'OrganisationController');

// Resource router for activities
Route::resource('activity', 'ActivityController');
