<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityCreateRequest;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Activity;
use App\Cause;
use App\Volunteer;
use App\VolunteerProfile;


class ActivityController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:org')->except(['index', 'show']);
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
        // Handle activity causes.
        $causes = $request['causes'];
     
        // Handle activity image.
        $imagePath = null;

        // If image exists... 
        if (Arr::exists($request, 'image')) {
            $imagePath = $request['image']->store('uploads/images/activity', 'public');
            
            $image = Image::make(public_path("storage/{$imagePath}"));
            $image->save();
        }

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
        $org_id = Auth::user()->organisationProfile->id;
        $activity->organisations()->sync([$org_id]);

        // Connect activity to causes
        $activity->causes()->sync($causes);

        return redirect(url("/activity/$activity->id"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activity = Activity::findOrFail($id);

        return view('activity.activity-show')
            ->with('activity', $activity);
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

        // List of all causes.
        $causes = Cause::pluck('name');

        // List of causes associated with the activity
        $activityCauses = $activity->causes()->get()->pluck('id')->toArray();

        return view('activity.edit')
            ->with('activity', $activity)
            ->with('causes', $causes)
            ->with('associatedCauses', $activityCauses);
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
        
        // Handle activity causes.
        $causes = $request['causes'];
     
        // Handle activity image.
        $imagePath = $activity->image;

        // If image exists... 
        if (Arr::exists($request, 'image')) {
            // Remove the old image of the activity.
            Storage::delete("public/{$imagePath}");

            $imagePath = $request['image']->store('uploads/images/activity', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"));
            $image->save();
        }

        // Update the activity with the edited fields.
        $activity->name = $request['name'];
        $activity->description = $request['description'];
        $activity->image = $imagePath;
        $activity->start_date = $request['start_date'];
        $activity->end_date = $request['end_date'];
        $activity->start_time = $request['start_time'];
        $activity->end_time = $request['end_time'];
        $activity->location = $request['location'];
        $activity->co_host = $request['co_host'];
        $activity->registration_deadline = $request['registration_deadline'];
        $activity->volunteer_hours = $request['volunteer_hours'];

        // Update activity.
        $activity->save();
        
        // Update activity causes.
        $activity->causes()->sync($causes);

        return redirect(url("/activity/$activity->id"));
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

        return redirect(route('org.dashboard'));
    }

    /**
     * Show the list of volunteers for a specified activity.
     */
    public function showVolunteerList($id)
    {
        // Find the activity.
        $activity = Activity::findOrFail($id);

        // Get all of the volunteers from that activity.
        $volunteers = $activity->volunteers()->orderBy('last_name')->paginate(10);

        return view('activity.activity-volunteers')
            ->with('activity', $activity)
            ->with('volunteers', $volunteers);
    }


    /**
     * Confirm the volunteer hours for one volunteer in the specified activity.
     */
    public function confirmHours($id, Request $request)
    {
        // Find the activity.
        $activity = Activity::findOrFail($id);

        // Find the volunteer profile.
        $vol = VolunteerProfile::findOrFail($request['vol']);

        // dd($request->all()); // Debugging

        // Validate the request
        $request->validate([
            'confirm-hours' => ['required', 'integer', "max:$activity->volunteer_hours"]
        ]);

        // Log the volunteer hour earned for the volunteer.
        $activity->volunteers()->syncWithoutDetaching([
            $vol->id => ['volunteer_hours_earned' => $request['confirm-hours']]
        ]);

        return redirect(route('activity.volunteers', ['activity' => $activity->id]));
    }


    public function showLogVolunteerHoursForm($id)
    {
        // Find the volunteer.
        $volunteer = VolunteerProfile::findOrFail($id);

        // Get all of the activities for that volunteer.
        $activities = $volunteer->activities()
            ->where('is_active', false)
            // ->wherePivot('volunteer_hours_earned', '=', 0)
            ->get();

        return view('activity.activity-hours')
        ->with('volunteerProfiles', $volunteer)
        ->with('activities', $activities);
    }
    
    public function updateVolunteerHours(Request $request, $vol_id, $act_id)
    {
        // Find the volunteer
        $volunteer = VolunteerProfile::findOrFail($vol_id);

        //Find the activity for that volunteer 
        $activity = $volunteer->activities()
            ->where('activity_id','=',$act_id)->first();

        // Validate the request
        $request->validate([
            'volunteer_hours_earned' => ['required', 'integer', "max:$activity->volunteer_hours"]
        ]);

        // Log the volunteer hour earned for the volunteer.
        $activity->volunteers()->syncWithoutDetaching([
            $volunteer->id => ['volunteer_hours_earned' => $request['volunteer_hours_earned']]
        ]);
        /*

        // $activity = Activity::where ('activity_id','=',$id)
            //                    ->where ('volunteer_profile_id','=',$volunteer)->first();
            
        // $activity->volunteer_hours_earned = $request['volunteer_hours_earned'];
            $activity->volunteer_hours_earned = $request->volunteer_hours_earned;
        
            $activity = Activity::where('activity_id','=',$id)
                    ->where ('volunteer_profile_id','=',$volunteer)->first(); 
            $activity = Activity::findOrFail($id)->where ('volunteer_profile_id',$volunteer)->first();
            $activity->volunteer_hours_earned = $request->volunteer_hours_earned;
            $activity->save();*/
            
        return redirect(route('activity.volunteer.log.form', ['volunteer' => $volunteer->id]));
            
    }
  


}
