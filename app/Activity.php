<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id', 'status',
    ];

    protected $fillable=['volunteer_hours_earned'];

    /**
     * Set up the relationship between activities and causes.
     * 1 activity HAS many causes.
     */
    public function causes()
    {
        return $this->belongsToMany(Cause::class, 'activity_cause');
    }

    /**
     * Set up the relationship between activities and volunteers.
     * 1 activity HAS many volunteers.
     */
    public function volunteers()
    {
        return $this->belongsToMany(VolunteerProfile::class, 'activity_volunteer')
            ->withPivot(['volunteer_profile_id','volunteer_hours_earned', 'hours_confirmed'])
            ->withTimestamps();
    }

    /**
     * Set up the relationship between activities and organisations.
     * 1 activity HAS many organisations.
     */
    public function organisations()
    {
        return $this->belongsToMany(OrganisationProfile::class, 'activity_organisation')
            ->withTimestamps();
    }
	
	public function ActivityEvaluation()
    {
        return $this->hasMany(ActivityEvaluation::class);
    }
    
    /**
     * Set up the relationship between activities and instructions.
     * 1 activity HAS one set instructions.
     */
    public function instruction()
    {
        return $this->hasOne(Instruction::class);
    }
}
