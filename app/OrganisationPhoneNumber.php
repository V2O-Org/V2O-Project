<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrganisationPhoneNumber extends Model
{
    /**
     * Set up the relationship between phone numbers and organisation profiles.
     * 1 phone number BELONGS TO 1 organisation profile.
     */
    public function organisationProfile()
    {
        return $this->belongsTo(OrganisationProfile::class, 'organisation_profiles');
    }
}
