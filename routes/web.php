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

// Route::get('/org/slider', function() {
//     return view('organisation.slider');
// });

// // TEST ROUTES
// Route::get('/', function () {
//     return view('volunteer.tester');
// });

// // Test Route - Login
// Route::get('/vol-login',function(){
//     return view('auth.vol-login');
// });

// // Test Route - Login
// Route::get('/vol-reg',function(){
//     return view('auth.vol-login');
// });

Route::get('/',function(){
	return view('welcome');
});

Auth::routes();

// Volunteer Routes
Route::prefix('/vol')->group(function() {
    // Home Routes
    Route::get('/', 'VolunteerHomeController@index')->name('vol.dashboard');

    // Login Routes
    Route::get('/login', 'Auth\Vol\VolunteerLoginController@showLoginForm')->name('vol.login.form');
    Route::post('/login', 'Auth\Vol\VolunteerLoginController@login')->name('vol.login');

    // Registration Routes
    Route::get('/register', 'Auth\Vol\VolunteerRegisterController@showRegistrationForm')->name('vol.register.form');
    Route::post('/register', 'Auth\Vol\VolunteerRegisterController@register')->name('vol.register');

    // Logout Route
    Route::get('/logout', 'Auth\Vol\VolunteerLoginController@logout')->name('vol.logout');

    // Password Reset Routes
    Route::post('/password/email', 'Auth\Vol\VolunteerForgotPasswordController@sendResetLinkEmail')->name('vol.password.email');
    Route::post('/password/reset', 'Auth\Vol\VolunteerResetPasswordController@reset')->name('vol.password.update');
    Route::get('/password/reset', 'Auth\Vol\VolunteerForgotPasswordController@showLinkRequestForm')->name('vol.password.request');
    Route::get('/password/reset/{token}', 'Auth\Vol\VolunteerResetPasswordController@showResetForm')->name('vol.password.reset'); 
});

// Organisation Routes
Route::prefix('/org')->group(function() {
    // Home Routes
    Route::get('/', 'OrganisationHomeController@index')->name('org.dashboard');

    // Login Routes
    Route::get('/login', 'Auth\Org\OrganisationLoginController@showLoginForm')->name('org.login.form');
    Route::post('/login', 'Auth\Org\OrganisationLoginController@login')->name('org.login');

    // Registration Routes
    Route::get('/register', 'Auth\Org\OrganisationRegisterController@showRegistrationForm')->name('org.register.form');
    Route::post('/register', 'Auth\Org\OrganisationRegisterController@register')->name('org.register');

    // Logout Route
    Route::get('/logout', 'Auth\Org\OrganisationLoginController@logout')->name('org.logout');

    // Password Reset Routes
    Route::post('/password/email', 'Auth\Org\OrganisationForgotPasswordController@sendResetLinkEmail')->name('org.password.email');
    Route::post('/password/reset', 'Auth\Org\OrganisationResetPasswordController@reset')->name('org.password.update');
    Route::get('/password/reset', 'Auth\Org\OrganisationForgotPasswordController@showLinkRequestForm')->name('org.password.request');
    Route::get('/password/reset/{token}', 'Auth\Org\OrganisationResetPasswordController@showResetForm')->name('org.password.reset');   
});

// // Home Router
// Route::get('/home', 'HomeController@index')->name('home');

// // Resource router for volunteer
// Route::resource('volunteer', 'VolunteerController');

// // Resource router for organisation
// Route::resource('organisation', 'OrganisationController');

// // Activity Routes
// Route::resource('activity', 'ActivityController');
// Route::get('/activities', 'ActivityController@showAll')->name('activity-list');
