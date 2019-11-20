<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cause extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
    ];

    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'activity_cause');
    }

    /**
     * Set up the relationship between causes and organisations.
     * 1 cause BELONGS TO many organisations.
     */
    public function organisations()
    {
        return $this->belongsToMany(OrganisationProfile::class, 'organisation_cause');
    }

    /**
     * Set up the relationship between causes and volunteers.
     * 1 cause BELONGS TO many volunteers.
     */
    public function volunteers()
    {
        return $this->belongsToMany(VolunteerProfile::class, 'volunteer_cause');
    }
}
