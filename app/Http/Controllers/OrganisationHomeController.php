<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganisationHomeController extends Controller
{
    /**
     * Create a new controller instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:organisation');
    }

    /**
     * Show the application dashboard.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('organisation.home');
    }

    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('is_volunteer');

    //     $this->middleware('is_organisation');
    // }

    // /**
    //  * Show the application dashboard.
    //  *
    //  * @return \Illuminate\Contracts\Support\Renderable
    //  */
    // public function index()
    // {
    //     if (Auth::user()->role === 'VOLUNTEER') {
    //         return redirect()->action('VolunteerController@index');
    //     } else if (Auth::user()->role === 'ORGANISATION') {
    //         return redirect()->action('OrganisationController@index');
    //     }
    // }
}
