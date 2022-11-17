<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation', function (Blueprint $table) {
            $table->id('reservation_id');
            $table->unsignedBigInteger('utilisateur_id');
            $table->unsignedBigInteger('salle_id');
            $table->dateTimeTz('date_reservation');
            $table->integer('reservation_periode');

            $table->foreign('utilisateur_id')->references('utilisateur_id')->on('utilisateur');
            $table->foreign('salle_id')->references('salle_id')->on('salle');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation');
    }
};
