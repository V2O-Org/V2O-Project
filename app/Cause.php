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
        return $this->belongsToMany(Activity::class, 'activity_cause')->withTimestamps();
    }
}
