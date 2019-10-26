<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the volunteer homepage.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function volunteerHome()
    {
        return view('volunteer.home');
    }

    /**
     * Show the organisation homepage.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function organisationHome()
    {
        return view('organisation.home');
    }
}
