<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cause extends Model
{
    public function opportunities()
    {
        return $this->belongsToMany(Opportunity::class, 'opportunity_cause')->withTimestamps();
    }
}
