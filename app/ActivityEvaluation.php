<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityEvaluation extends Model
{
    //
	 protected $fillable = [
	 'volunteer_id',
	 'activity_id',
        'rating',
		'comment',
    ];
	
	
	 public function Activity()
    {
        return $this ->belongsTo(Activity::class);
    }
	
}
