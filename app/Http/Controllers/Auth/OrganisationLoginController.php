<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Organisation;

class OrganisationLoginController extends Controller
{
    /**
     * Create a new controller instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:org');
    }

    /**
     * Show the organisation login form.
     * 
     */
    public function showLoginForm()
    {
        return view('auth.organisation-login');
    }

    /**
     * Login the organisation.
     * 
     */
    public function login(Request $request)
    {
        // Validate the login form data.
        $this->validate($request, [
            'email' => ['required', 'email',], 
            'password' => ['required', 'min:8',],
        ]);
        
        // Attempt to login the organisation.
        if (Auth::guard('org')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // If successful, then redirect to their inteded location.
            return redirect()->intended(route('org.dashboard'));
        }

        // If unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
