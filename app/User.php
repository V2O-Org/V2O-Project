<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
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
     * Set up the relationship between users and volunteers.
     * 1 user CAN BE 1 volunteer.
     */
    public function volunteer()
    {
        if ($this->role == 'VOLUNTEER') { 
            return $this->hasOne(Volunteer::class, 'volunteers');
        }
    }

    /**
     * Set up the relationship between users and organisations.
     * 1 user CAN BE 1 organisation.
     */
    public function organisation()
    {
        if ($this->role == 'ORGANISATION') { 
            return $this->hasOne(Organisation::class, 'organisations');
        }
    }
}
