<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
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
     * Set up the relationship between organisations and users.
     * 1 organisation IS 1 user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Set up the relationship between organisations and phone numbers.
     * 1 organisation HAS many phone numbers.
     */
    public function phoneNumbers()
    {
        return $this->belongsToMany(Organisation::class, 'organisation_phone_numbers');
    }


    /**
     * Set up the relationship between organisations and causes.
     * 1 organisation HAS many causes.
     */
    public function causes()
    {
        return $this->belongsToMany(Cause::class, 'organisation_cause');
    }

    /**
     * Set up the relationship between organisations and activities.
     * 1 organisation REGISTERS FOR many activities.
     */
    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'activity_organisation')->withTimestamps();
    }
}
