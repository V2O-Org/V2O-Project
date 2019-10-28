<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrganisationProfile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
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
     * Set up the relationship between organisation profiles and organisations.
     * 1 organisation profile BELONGS TO 1 organisation.
     */
    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }

    /**
     * Set up the relationship between organisation profiles and phone numbers.
     * 1 organisation profile HAS many phone numbers.
     */
    public function phoneNumbers()
    {
        return $this->hasMany(OrganisationPhoneNumbers::class, 'organisation_phone_numbers');
    }


    /**
     * Set up the relationship between organisation profiles and causes.
     * 1 organisation profile BELONGS TO many causes.
     */
    public function causes()
    {
        return $this->belongsToMany(Cause::class, 'organisation_cause');
    }
}
