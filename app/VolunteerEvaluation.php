<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class VolunteerEvaluation extends Model
{

/**
 * Work Around for database name
 */


    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    protected $fillable = [
        'volunteer_id','organisation_id','rating','comment'
    ];

    public function VolunteerProfile()
    {
        return $this ->belongsTo(VolunteerProfile::class);
    }
    

}

