<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use App\Notifications\VolunteerResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Volunteer extends Authenticatable
{

    use Notifiable;

    protected $guard = 'vol';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Set up the relationship between volunteers and volunteer profiles.
     * 1 volunteer HAS 1 volunteer profile.
     */
    public function volunteerProfile()
    {
        return $this->hasOne(VolunteerProfile::class);
    }
    
    /**
     * Send the password reset notification.
     * 
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new VolunteerResetPasswordNotification($token));
    }
}
