<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    //
    public function dest()
    {
        return $this->belongsTo('App/User','id_dist');
    }
    public function src()
    {
        return $this->belongsTo('App/User','id_src');
    }
}
