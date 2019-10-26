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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Routes for volunteer and organisation homepage
Route::get('/volunteer/home', 'HomeController@volunteerHome')
    ->name('volunteer.home')->middleware('is_volunteer');
Route::get('/organisation/home', 'HomeController@organisationHome')
    ->name('organisation.home')->middleware('is_organisation');

// Routes for activities
Route::resource('activity', 'ActivityController');
