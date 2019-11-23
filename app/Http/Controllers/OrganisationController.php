<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Organisation;
use App\OrganisationProfile;


class OrganisationController extends Controller
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
    }

    /**
     * Show all of the past activities for the specified organisation.
     */
    public function showPastActivities()
    {
        // Find the organisation and get its profile.
        $org = Organisation::findOrFail(Auth::id())->organisationProfile;

        // Get the past activities of this organisation.
        $pastActivities = $org->getPastActivities();

        return view('organisation.org-past-activities')
            ->with('pastActivities', $pastActivities);
    }

    public function searchPastActivities(Request $request)
    {
        // Find the organisation and get its profile.
        $org = Organisation::findOrFail(Auth::id())->organisationProfile;

        // Extract query from request.
        $query = $request['query'];

        // Find past activities that match requests
        $matchingActivities = $org->activities()
            ->where('is_active', false)
            ->where('name', 'LIKE', "%$query%")->get();

        return view('organisation.org-past-activities')
            ->with('pastActivities', $matchingActivities);
    }
}
