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
        Schema::create('digicode', function (Blueprint $table) {
            $table->id();
            $table->integer('code', false, false);
            $table->unsignedBigInteger('salleId');
            $table->integer('month')->default(date('m'));
            $table->year('year')->default(date('Y'));

            $table->foreign('salleId')->references('salle_id')->on('salle')->onDelete('CASCADE')->onUpdate('CASCADE');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('digicode');
    }
};
