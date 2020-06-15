<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Hospital extends Authenticatable
{
    use Notifiable;

    protected $guard = 'hospital';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','city'
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

    public function donate()
    {
        return $this->belongsToMany('App\Request', 'donations', 'hospital_id', 'request_id')->withPivot('blood_type', 'donations_amount', 'status')->withTimestamps();
    }

    public function givenDonations()
    {
        return $this->hasMany('App\Donation', 'hospital_id');
    }

    public function requests()
    {
        return $this->hasMany('App\Request', 'hospital_id');
    }

    public function recievedRequests()
    {
        return $this->hasMany('App\Request', 'target_hospital_id');
    }
}
