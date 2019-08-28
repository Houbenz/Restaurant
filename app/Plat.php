<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//soft deleting
use Illuminate\Database\Eloquent\SoftDeletes;

class Plat extends Model
{    
    use SoftDeletes;

    protected $table = 'plats';

    public $primaryKey = "id";

    public $timestamp = true;

    /*relation un plat appartien a plusieur commande (elle va creer une table pivote 
        similaire a commande_plat_map)
    */
    public function commande()
    {
        return $this->belongsToMany('App/Commande');
    }

}
