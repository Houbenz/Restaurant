<?php

use Illuminate\Database\Seeder;
use App\Plat;
class Platseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Plat::class,20)->create();
    }
}
