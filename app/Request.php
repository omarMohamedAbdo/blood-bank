<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    //
    public function donatedBy()
    {
        return $this->belongsToMany('App\User', 'donations', 'request_id', 'user_id');
    }
}
