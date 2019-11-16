<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
    //
    protected $fillable = [
            'activity_name',
            'required_item',
            'meeting_point',
            'date',
            'time',
            'attire',
            'document',
    ];
    
    public function activityName()
    {
        return $this->activity_name;
    }
    
    public function activityInstruction()
    {
        return $this->hasOne(ActivityInstruction::class);
    }
}
