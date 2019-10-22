<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    public function causes()
    {
        return $this->belongsToMany(Cause::class, 'opportunity_cause')->withTimestamps();
    }
}
