<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use App\Notifications\OrganisationResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Organisation extends Authenticatable
{
    use Notifiable;

    protected $guard = 'org';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * Set up the relationship between organisations and organisation profiles.
     * 1 organisation HAS 1 organisation profile.
     */
    public function organisationProfile()
    {
        return $this->hasOne(OrganisationProfile::class);
    }

    /**
     * Send the password reset notification.
     * 
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new OrganisationResetPasswordNotification($token));
    }
}
