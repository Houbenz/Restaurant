<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Plat;
use App\User;

class Commande extends Model
{
    /*protected $attributes = [
        'id_client' => 0,
        'id_serveur' => 0,
        'id_valideur' => 0,
    ];

    /*relation une commande  a plusieur plat (elle va creer une table pivote 
        similaire a commande_plat_map)
    */
    public function plat()
    {
        return $this->belongsToMany('App\Plat');
    }
    
    public function client()
    {
        return $this->belongsTo('App\User','id_client');
    }
    
    public function serveur()
    {
        return $this->belongsTo('App\User','id_serveur');
    }
    
    public function valideur()
    {
        return $this->belongsTo('App\User','id_valideur');
    }
}
