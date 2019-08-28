<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function client(){
        return $this->belongsTo('App/User','id_client');
    }
}
