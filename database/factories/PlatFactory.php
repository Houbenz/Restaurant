<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Plat;
use Faker\Generator as Faker;

$factory->define(Plat::class, function (Faker $faker) {
    return [
        'nom'=> $faker->name,
        'type'=>'Pizza',
        'prix'=>2500,
        'ingrediants' => 'Tomate',
        'disponibilite' => 1,
        'cover_image' => 'none'
    ];
});
