<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Activity;
use App\Organisation;
use App\Volunteer;
use DB;

class SingActivController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		// Get all activities
        $activities = activity::all();
		return view('singactivity.index');
		 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
       
	}
	
	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
	// $activity = activities::findOrFail($id);
	// $volunteer = volunteers::findOrFail($id);
	
    //  $activity_volunteer = new activity_volunteer;
	//  ([	'activity_id' => $activity,
	// 	'volunteer_id' => $volunteer,
	// ])
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
		return view('singactiv.index', ['activities' => Activity::findOrFail($id)]);
    }

    /**
     * Display all of the activities.
     */
    public function showAll() 
	{
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ActivityCreateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
		
		  
	}
        
    public function destroy($id)
    {
		
		$activity_volunteer=activity_volunteer::findOrFail($id);//connect to the database and find $id currently in use
		$activity_volunteer->delete();
		return redirect(url('/activity')); 
	}
}
