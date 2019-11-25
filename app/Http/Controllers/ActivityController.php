<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityCreateRequest;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
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
        $volunteers = $activity->volunteers()->paginate(10);

        return view('activity.activity-volunteers')
            ->with('activity', $activity)
            ->with('volunteers', $volunteers);
    }

    /**
     * Confirm the volunteer hours for one volunteer in the specified activity.
     */
    public function confirmHours($id, Request $request)
    {
        // Put logic here
    }

    public function logVolunteersHours($id)
    {
        // Find the volunteer.
        $volunteer = volunteerProfile::findOrFail($id);

        // Get all of the volunteers from that activity.
        $activities = $volunteer->activities()->get();

         return view('activity.activity-hours')
         ->with('volunteerProfiles', $volunteer)
         ->with('activities', $activities);
      
    }
    /*
    public function logVolunteersHours($id1)
    {
         //Find the volunteer_
          // $volunteers = Volunteer::findOrFail($id1);
           $activities = DB:table()
        //Get all the activities for the volunteer
       // $activity = $volunteers->activity()->get();
        return view('activity.activity-hours')
         //->with('volunteerProfiles', $volunteers)
         //->with('activity', $activity);
       ->with('activities', $activities);

        //Find the volunteer_
          // $volunteers = Volunteer::findOrFail($id1);
           $activities = Activity::all();
        //Get all the activities for the volunteer
       // $activity = $volunteers->activity()->get();
        return view('activity.activity-hours')
         //->with('volunteerProfiles', $volunteers)
         //->with('activity', $activity);
       ->with('activities', $activities);



          //Find the volunteer_
        $volunteer = Volunteer::findOrFail($id);
     
        //Get all the activities for the volunteer
      // $activity = $volunteer->activity()->get();
         $activity = $volunteer->activity()->get();
        return view('activity.activity-hours')
         //->with('volunteerProfiles', $volunteers)
         //->with('activity', $activity);
       ->with('activities', $activities);


       $volunteer = Volunteer::findOrFail ($id);
        $volunteerProfile = $volunteer->volunteerProfile;
        return view('volunteer/vol-profile')->with ('volunteer',$volunteer) ->with ('volunteerProfile',$volunteerProfile);
//-*******************************************************************
           //Find the volunteer_
        $volunteer = Volunteer::findOrFail($id);
     
        //Get all the activities for the volunteer
      // $activities = $volunteer->activity()->get();
         $activity = $volunteer->activity()->get();
        return view('activity.activity-hours')
         //->with('volunteerProfiles', $volunteers)
         //->with('activity', $activity);
       ->with('activities', $activities);
        }*/
}
