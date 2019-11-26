<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class VolunteerProfile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'volunteer_id', 'first_name', 'last_name', 'date_of_birth', 'profile_img',
        'street_address', 'state', 'city', 'country',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Set up the relationship between volunteer profiles and volunteers.
     * 1 volunteer profile BELONGS TO 1 volunteer.
     */
    public function volunteer()
    {
        return $this->belongsTo(Volunteer::class);
    }

    /**
     * Set up the relationship between volunteers and causes.
     * 1 volunteer HAS many causes.
     */
    public function causes()
    {
        return $this->belongsToMany(Cause::class, 'volunteer_cause');
    }

    /**
     * Set up the relationship between volunteers and activities.
     * 1 volunteer REGISTERS FOR many activities.
     */
    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'activity_volunteer')
            ->withPivot(['volunteer_profile_id','volunteer_hours_earned', 'hours_confirmed'])
            ->withTimestamps();
    }

    /**
     * Return all of the current activities for the volunteer.
     */
    public function getCurrentActivities()
    {
        return $this->activities()->get()->where('is_active', true)->all();
    }

    /**
     * Return all of the activities completed by the volunteer.
     */
    public function getPastActivities()
    {
        return $this->activities()->get()->where('is_active', false)->all();
    }
    
    /**
     * Return the full name of the volunteer.
     */
    public function getName() {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Return the email of the volunteer from the volunteer user model.
     */
    public function getEmail() {
        return $this->volunteer->email;
    }

    /**
     * Return the age of the volunteer.
     */
    public function getAge()
    {
        return Carbon::parse($this->attributes['date_of_birth'])->age;
    }

    /**
     * Return full address of the volunteer.
     */
    public function fullAddress()
    {
        return $this->street_address. ' '.$this->state.' '. $this->city . ' ' . $this->country;
    }

    /**
     * Return total volunteer hours earned.
     */
    public function getAllHoursEarned()
    {
        // Result of the sum of all hours earned.
        $result = 0;

        // For every activitiy the volunteer is registered for...
        foreach($this->activities()->get()->all() as $activity)
        {
            // Add their corresponding volunteer hours to the sum.
            $result += $activity->pivot->volunteer_hours_earned;
        }

        return $result;
    }

    /**
     * Return hours earned for specified activity.
     */
    public function getHoursEarned($activityId) 
    {
        // Find the activity
        $activity = $this->activities()->where('id', $activityId)->first();

        return $activity->pivot->volunteer_hours_earned;
    }
}
