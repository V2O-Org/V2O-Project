<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Volunteer extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * Set up the relationship between volunteers and volunteer profiles.
     * 1 volunteer HAS 1 volunteer profile.
     */
    public function volunteerProfile()
    {
        return $this->hasOne(VolunteerProfile::class);
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
