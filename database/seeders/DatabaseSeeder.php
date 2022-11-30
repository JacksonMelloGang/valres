<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\User::factory(7)->create();


        \App\Models\Service::factory()->create([
            'libelle' => 'Administrateur',
        ]);

        \App\Models\Service::factory()->create([
            'libelle' => 'Reponsable',
        ]);


        \App\Models\Service::factory()->create([
            'libelle' => 'Secretariat',
        ]);

        \App\Models\Categorie_salle::factory(3)->create();

        \App\Models\Salle::factory(10)->create();

        \App\Models\Categorie_structure::factory(3)->create();

        \App\Models\Structure::factory(10)->create();

        \App\Models\Reservation::factory(10)->create();
    }
}
