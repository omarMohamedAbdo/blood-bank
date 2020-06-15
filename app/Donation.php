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
}
