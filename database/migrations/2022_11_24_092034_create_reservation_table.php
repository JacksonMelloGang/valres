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
            $table->dateTime('date_reservation');
            $table->unsignedBigInteger('reservation_periode');
            $table->string('reservation_commentaire')->nullable();
            $table->unsignedBigInteger('reservation_statut'); // provisoire, confirmé, annulé

            $table->foreign('utilisateur_id')->references('utilisateur_id')->on('utilisateur');
            $table->foreign('salle_id')->references('salle_id')->on('salle');
            $table->foreign('reservation_statut')->references('reservation_statut_id')->on('reservation_statut');
            $table->foreign('reservation_periode')->references('id_rsperiode')->on('reservation_periode');

            $table->timestamps();
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
