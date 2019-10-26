<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id', 'status',
    ];

    /**
     * Set up the relationship between activities and causes.
     * 1 activity HAS many causes.
     */
    public function causes()
    {
        return $this->belongsToMany(Cause::class, 'activity_cause')->withTimestamps();
    }

    /**
     * Set up the relationship between activities and volunteers.
     * 1 activity HAS many volunteers.
     */
    public function volunteers()
    {
        return $this->belongsToMany(Volunteer::class, 'activity_volunteer')->withTimestamps();
    }
}
