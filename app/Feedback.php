<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = "feedbacks";
    public function hospital()
    {
         return $this->belongsTo('App\Hospital', 'hospital_id');
    }

    public function user()
    {
         return $this->belongsTo('App\User', 'user_id');
    }


    protected $fillable = ['user_id','hospital_id','comment'];
}
