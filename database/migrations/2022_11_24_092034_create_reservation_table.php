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
            $table->integer('reservation_periode');
            $table->string('reservation_commentaire');
            $table->string('status'); // provisoire, confirmé, annulé
            $table->timestamp('created_at')->useCurrent();

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
