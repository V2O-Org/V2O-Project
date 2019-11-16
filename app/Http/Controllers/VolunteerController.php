<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Volunteer;
use App\VolunteerProfile;

class VolunteerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:vol');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //$id = Auth::id();
        $volunteerProfile = VolunteerProfile::findOrFail ($id);
        $volunteer= Volunteer::findOrFail ($id);
                return view('volunteer/vol-profile')->with ('volunteer',$volunteer) ->with ('volunteerProfile',$volunteerProfile);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $volunteerProfile = VolunteerProfile::findOrFail($id);
        $volunteerProfile->first_name = $request->first_name;
        $volunteerProfile->last_name= $request->last_name;
        $volunteerProfile->street_address= $request->street_address;
        $volunteerProfile->city= $request->city;
        $volunteerProfile->state= $request->state;
        $volunteerProfile->country= $request->country;
        $volunteerProfile->save();
        return redirect (url('vol/profile/'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $volunteerProfile = VolunteerProfile::findOrFail ($id);
        $volunteer= Volunteer::findOrFail ($id);
        $volunteer->delete();
                return view('/');
    }



}
