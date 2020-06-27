<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = "messages";

    public function receiverUser()
    {
         return $this->belongsTo('App\User', 'receiver_user_id');
    }

    public function senderUser()
    {
         return $this->belongsTo('App\User', 'sender_user_id');
    }

    public function receiverHospital()
    {
         return $this->belongsTo('App\Hospital', 'receiver_hospital_id');
    }

    public function senderHospital()
    {
         return $this->belongsTo('App\Hospital', 'sender_hospital_id');
    }


    protected $fillable = ['receiver_user_id','receiver_hospital_id','sender_user_id','sender_hospital_id','subject','message'];
}
