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
        Schema::create('utilisateur', function (Blueprint $table) {
            $table->id('utilisateur_id');

            $table->string('nom', 50);
            $table->string('prenom', 50);
            $table->string('mail', 100);

            $table->string('username', 50);
            $table->string('password', 70);

            $table->string('remember_token', 100)->nullable();

            $table->boolean('is_banned')->default(false);

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
        Schema::dropIfExists('utilisateur');
    }
};
