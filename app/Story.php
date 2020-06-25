<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $table = "stories";

    public function user()
    {
         return $this->belongsTo('App\User', 'user_id');
    }

    protected $fillable = ['user_id','title','story','image'];
}
