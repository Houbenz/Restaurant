<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'email', 'password','adresse'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //relation: un client a plusieurs commandes
    public function commande()
    {
        return $this->hasMany('App/Commande','id_client','id');
    }
    
    
    //relation: un serveur a servi plusieurs commandes
    public function commandeS()
    {
        return $this->hasMany('App/Commande','id_serveur','id');
    }
    
    //relation: un chef/responsable a valider plusieurs commandes
    public function commandeV()
    {
        return $this->hasMany('App/Commande','id_valideur','id');
    }

    //relation un employé a envoyé plusieur notif
    public function notifE()
    {
        return $this->hasMany('App/Notification','id_src');
    }

    //relation: un client a recu plusieur notifs

    public function notifR()
    {
        return $this->hasMany('App/Notifications','id_dist');
    }   

    public function message(){
        return $this->hasMany('App/Message','id_client');
    }
}
