<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
    //
    protected $fillable = [
            'required_items',
            'meeting_point',
            'date',
            'time',
            'document',
    ];
    
    public function activityName()
    {
        return $this->activity_name;
    }
    
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
