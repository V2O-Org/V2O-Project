<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ActivityCreateRequest;
use Intervention\Image\Facades\Image;
use App\Activity;
use App\Cause;

class ActivityController extends Controller
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
        $activity = new Activity;
        $causes = Cause::lists("name");
        
        return view('activity.create')->with("activity", $activity)->with("causes", $causes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ActivityCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActivityCreateRequest $request)
    {

        $imagePath = $request['image']->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        // $causes = $request->input('causes');

        $activity = Activity::create([
            'name' => $request['name'],
            'details'=> $request['details'],
            'image' => $imagePath,
            'start_date' => $request['start_date'],
            'end_date' => $request['end_date'],
            'start_time' => $request['start_time'],
            'end_time' => $request['end_time'],
            'location' => $request['location'],
            // 'co-host' => $request['co-host'],

        ]);

        // $activity->causes()->sync($causes);

        dd($activity);
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
}
