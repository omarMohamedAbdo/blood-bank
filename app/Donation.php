<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    //
    public function user()
    {
         return $this->belongsTo('App\User', 'user_id');
    }

    public function donorHospital()
    {
         return $this->belongsTo('App\Hospital', 'hospital_id');
    }

    public function request()
    {
         return $this->belongsTo('App\Request', 'request_id');
    }

    protected $fillable = ['request_id','user_id','hospital_id','blood_type','donations_amount','target_hospital_id'];
}
