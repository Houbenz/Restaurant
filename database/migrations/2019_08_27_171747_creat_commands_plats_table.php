<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatCommandsPlatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commande_plat_map', function (Blueprint $table) {
            $table->biginteger('id_commande')->unsigned();
            $table->biginteger('id_plat')->unsigned();
            $table->foreign('id_commande')->references('id')->on('commandes');
            $table->foreign('id_plat')->references('id')->on('plats');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commande_plat_map');
    }
}
