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
        Schema::create('administration', function (Blueprint $table) {
            $table->unsignedBigInteger('utilisateur_id');
            $table->unsignedBigInteger('service_id');

            $table->foreign('utilisateur_id')->references('utilisateur_id')->on('utilisateur');
            $table->foreign('service_id')->references('id_service')->on('service');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('administration');
    }
};
