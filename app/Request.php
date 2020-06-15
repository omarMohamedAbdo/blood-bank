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
}
