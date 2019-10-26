<?php

namespace App;

class Volunteer extends User
{
    /**
     * Set up the relationship between volunteers and users.
     * 1 volunteer IS 1 user.
     */
    public function user()
    {
        return $this->hasOne(User::class, 'users')->withTimestamps();
    }


    /**
     * Set up the relationship between volunteers and causes.
     * 1 volunteer HAS many causes.
     */
    public function causes()
    {
        return $this->belongsToMany(Cause::class, 'volunteer_cause')->withTimestamps();
    }

    /**
     * Set up the relationship between volunteers and activities.
     * 1 volunteer REGISTERS FOR many activities.
     */
    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'activity_volunteer')->withTimestamps();
    }
}
