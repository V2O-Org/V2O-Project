<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Volunteer extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];

    /**
     * Set up the relationship between volunteers and users.
     * 1 volunteer IS 1 user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
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
        return $this->belongsToMany(Activity::class, 'activity_volunteer')->withTimestamps();
    }

    /**
     * Return the full name of the volunteer
     */
    public function fullName() {
        return $this->first_name . ' ' . $this->last_name;
    }
}
