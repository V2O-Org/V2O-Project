<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityCreateRequest;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use App\Organisation;
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
        $this->middleware('org')->only(['create', 'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all activities
        $activities = Activity::all();

        // Return view for list of activities
        return view('activity.index')->with('activities', $activities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $activity = new Activity;
        $causes = Cause::pluck('name');
        
        return view('activity.create')->with('activity', $activity)->with('causes', $causes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ActivityCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActivityCreateRequest $request)
    {
        $imagePath = null;

        // If image exists, 
        if ($request['image'] == 1) {
            $imagePath = $request['image']->store('uploads/images/activity', 'public');
    
            $image = Image::make(public_path("storage/{$imagePath}"));
            $image->save();
        }

        // dd($request->input('causes'));

        // $causes = $request->input('causes');

        $activity = Activity::create([
            'name' => $request['name'],
            'description'=> $request['description'],
            'image' => $imagePath,
            'start_date' => $request['start_date'],
            'end_date' => $request['end_date'],
            'start_time' => $request['start_time'],
            'end_time' => $request['end_time'],
            'location' => $request['location'],
            'co_host' => $request['co_host'],
            'registration_deadline' => $request['registration_deadline'],
            'volunteer_hours' => $request['volunteer_hours']
        ]);
        
        // Connect activity to organisation
        $org_id = Auth::user()->id;
        $activity->organisations()->sync([$org_id]);
        
        // dd($activity);

        // Connect activity to causes
        // $activity->causes()->sync($causes);

        return redirect(url('organisation.home'));
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
        $activity = Activity::findOrFail($id);
        $causes = Cause::pluck('name');

        return view('activity.update')->with('activity', $activity)->with('causes', $causes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ActivityCreateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActivityCreateRequest $request, $id)
    {
        // Find the activity to be updated.
        $activity = Activity::findOrFail($id);

        // Update the activity with the edited fields.
        $activity->update($request->all());

        return redirect(url('organisation.home'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the activity to be removed.
        $activity = Activity::findOrFail($id);

        // Remove all many-to-many references to activity
        $activity->causes()->detach();
        $activity->organisations()->detach();
        $activity->volunteers()->detach();

        $activity->delete();

        return redirect(url('organisation.home'));
    }
}
