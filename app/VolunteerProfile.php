<?php

namespace App;

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
        return $this->belongsToMany(Activity::class, 'activity_volunteer')->withTimestamps();
    }

    /**
     * Return the full name of the volunteer
     */
    public function fullName() {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Return full volunteer Address
     */

    public function fullAddress(){
        return $this->street_address. ' '.$this->state.' '. $this->city . ' ' . $this->country;
    }


    /**
     * Set up the relationship between volunteers and comments.
     * 1 volunteer HAS many comments.
     */
    public function VolunteerEvaluation()
    {
        return $this->hasMany(VolunteerEvaluation::class);
    }
}
