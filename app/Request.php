<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    //
    public function donatedByUser()
    {
        return $this->belongsToMany('App\User', 'donations', 'request_id', 'user_id');
    }

    public function donatedByHospital()
    {
        return $this->belongsToMany('App\Hospital', 'donations', 'request_id', 'hospital_id');
    }

    public function donations()
    {
        return $this->hasMany('App\Donation', 'request_id');
    }

    public function hospital()
    {
         return $this->belongsTo('App\Hospital', 'hospital_id');
    }

    public function targetHospital()
    {
         return $this->belongsTo('App\Hospital', 'target_hospital_id');
    }
}
