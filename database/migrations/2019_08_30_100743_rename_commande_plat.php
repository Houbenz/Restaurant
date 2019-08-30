<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameCommandePlat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema::rename('commande_plat_map', 'commande_plat');
        Schema::table('commande_plat', function (Blueprint $table) {
            $table->renameColumn('id_commande', 'commande_id');
            $table->renameColumn('id_plat', 'plat_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
