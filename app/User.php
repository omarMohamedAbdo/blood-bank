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
        'name', 'email', 'password','city','blood_type'
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

    public function donations()
    {
        return $this->hasMany('App\Donation', 'user_id');
    }

    public function donate()
    {
        return $this->belongsToMany('App\Request', 'donations', 'user_id', 'request_id')->withPivot('blood_type', 'donations_amount', 'status')->withTimestamps();
    }

    public function givenFeedbacks()
    {
        return $this->hasMany('App\Feedback', 'user_id');
    }
}
