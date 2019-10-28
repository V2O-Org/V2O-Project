<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the volunteer login form.
     * 
     */
    public function showVolunteerLoginForm()
    {
        $user = new User;

        return view('auth.vol-login')->with('user', $user);
    }

    /**
     * Login the volunteer.
     * 
     */
    public function loginVolunteer(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'email',], 
            'password' => ['required', 'min:8',],
        ]);
        
        if(auth()->attempt(array('email' => $request['email'], 'password' => $request['password'])))
        {
            if (auth()->user()->role === 'VOLUNTEER') {
                return view('volunteer.home');
            }
            // else {
            //     return redirect()->route('home');
            // }
        } else{
            return redirect(url('/vol/login'))
                ->with('error','Email-Address and Password are Wrong.');
        }
    }

    /**
     * Show the organisation login form.
     * 
     */
    public function showOrganisationLoginForm()
    {
        $user = new User;

        return view('auth.org-login')->with('user', $user);
    }

    /**
     * Login the organisation.
     * 
     */
    public function loginOrganisation(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'email',], 
            'password' => ['required', 'min:8',],
        ]);
        
        if(auth()->attempt(array('email' => $request['email'], 'password' => $request['password'])))
        {
            if (auth()->user()->role === 'ORGANISATION') {
                return view('organisation.home');
            } 
            // else {
            //     return redirect()->route('home');
            // }
        } else{
            return redirect()->route('login')
                ->with('error','Email-Address and Password are Wrong.');
        }
    }
}
