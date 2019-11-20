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
use Illuminate\Http\Request;
use App\Activity;

Route::get('/org/slider', function() {
    return view('organisation.slider');
});

// TEST ROUTES
Route::get('/', function () {
    return view('volunteer.tester');
});

// Route::get('/',function(){
// 	return view('welcome');
// });

Auth::routes();

// Volunteer Routes
Route::prefix('/vol')->group(function() {
    // Home Routes
    Route::get('/dashboard', 'VolunteerHomeController@index')->name('vol.dashboard');
    Route::get('/profile/{volunteer}', 'VolunteerController@show')->name('vol.profile');

    // Login Routes
    Route::get('/login', 'Auth\Vol\VolunteerLoginController@showLoginForm')->name('vol.login.form');
    Route::post('/login', 'Auth\Vol\VolunteerLoginController@login')->name('vol.login');

    // Registration Routes
    Route::get('/register', 'Auth\Vol\VolunteerRegisterController@showRegistrationForm')->name('vol.register.form');
    Route::post('/register', 'Auth\Vol\VolunteerRegisterController@register')->name('vol.register');

    // Logout Route
    Route::get('/logout', 'Auth\Vol\VolunteerLoginController@logout')->name('vol.logout');

    // Password Reset Routes
    Route::get('/password/reset', 'Auth\Vol\VolunteerForgotPasswordController@showLinkRequestForm')->name('vol.password.request');
    Route::post('/password/email', 'Auth\Vol\VolunteerForgotPasswordController@sendResetLinkEmail')->name('vol.password.email');
    Route::get('/password/reset/{token}', 'Auth\Vol\VolunteerResetPasswordController@showResetForm')->name('vol.password.reset');
    Route::post('/password/reset', 'Auth\Vol\VolunteerResetPasswordController@reset')->name('vol.password.update');
});

// Organisation Routes
Route::prefix('/org')->group(function() {
    // Home Routes
    Route::get('/dashboard', 'OrganisationHomeController@index')->name('org.dashboard');
    Route::get('/profile/{organisation}', 'OrganisationController@showProfile')->name('org.profile');

    // Login Routes
    Route::get('/login', 'Auth\Org\OrganisationLoginController@showLoginForm')->name('org.login.form');
    Route::post('/login', 'Auth\Org\OrganisationLoginController@login')->name('org.login');

    // Registration Routes
    Route::get('/register', 'Auth\Org\OrganisationRegisterController@showRegistrationForm')->name('org.register.form');
    Route::post('/register', 'Auth\Org\OrganisationRegisterController@register')->name('org.register');

    // Logout Route
    Route::get('/logout', 'Auth\Org\OrganisationLoginController@logout')->name('org.logout');

    // Password Reset Routes
    Route::get('/password/reset', 'Auth\Org\OrganisationForgotPasswordController@showLinkRequestForm')->name('org.password.request');
    Route::post('/password/email', 'Auth\Org\OrganisationForgotPasswordController@sendResetLinkEmail')->name('org.password.email');
    Route::get('/password/reset/{token}', 'Auth\Org\OrganisationResetPasswordController@showResetForm')->name('org.password.reset');
    Route::post('/password/reset', 'Auth\Org\OrganisationResetPasswordController@reset')->name('org.password.update');
    
	// Single Activity View
	Route::get('/acti', 'SingActivController@index')->name('singactivity.org_sing_act');
});

// Activity Routes
Route::prefix('/activity')->group(function() {
    // Index and Search Route
    Route::get('/search/index', 'ActivityController@index')->name('activity.index');

    // Volunteer List for Activity (Organisation Perspective)
    Route::get('/{activity}/volunteers', 'ActivityController@showVolunteerList')->name('activity.volunteers');
});

// Activity Sign Up Routes
Route::prefix('/singact')->group(function() {
	//Single Activity View
	Route::get('/acti', 'SingActivController@index')->name('singactivity.index');
});

// Resourceful Routes
Route::resources([
    'activity' => 'ActivityController',
    'org' => 'OrganisationController',
    'vol' => 'VolunteerController',
	'singact' => 'SingActivController',
]);

//search activities by making query to database
Route::any('/search', function(Request $request){
    $name = $request->input('name');
    $startDate = $request->input('startDate');

    $activity = Activity::where('name', 'LIKE', '%'.$name.'%')
                          ->orWhere('start_date', 'LIKE', '%'.$startDate.'%')
                          ->orWhere('description', 'LIKE', '%'.$name.'%')->get();
 
    if (count($activity) > 0){
        return view('activity/activity-search-results')->withDetails($activity)->withQuery($name);
    }
    else{
        return view('activity/activity-search-results')->withMessage('No activities matching your search')->withQuery($name);
    }
});

Route::get('/search/results', function(){
    return view('activity/activity-search-results');
});

// Joining Instruction Route
Route::Resource('instruction', 'InstructionController');
    
// // Home Router
// Route::get('/home', 'HomeController@index')->name('home');
