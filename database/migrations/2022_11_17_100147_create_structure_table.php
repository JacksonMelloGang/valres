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
        Schema::create('structure', function (Blueprint $table) {
            $table->id('structure_id');
            $table->text('structure_nom');
            $table->text('structure_adresse');
            $table->unsignedBigInteger('categorie_id');

            $table->foreign('categorie_id')->references('categorie_id')->on('categorie_structure');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('structure');
    }
};
