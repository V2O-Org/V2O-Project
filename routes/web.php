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
    return view('tester');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Test Routes - Login
Route::get('/vol-login',function(){
return view('login');
});

//Test Routes - Register
Route::get('/vol-reg',function(){
    return view('vol-register');
    });

Route::post('/',function(){
	return view('welcome');
});