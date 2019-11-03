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
        $this->middleware('auth:org');
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
}
