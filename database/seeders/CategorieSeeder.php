<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Categorie_salle::factory()->create([
            'libelle' => 'Réunion',
        ]);
        \App\Models\Categorie_salle::factory()->create([
            'libelle' => 'Avec équipements',
        ]);
        \App\Models\Categorie_salle::factory()->create([
            'libelle' => 'Amphi',
        ]);



        \App\Models\Categorie_structure::factory()->create([
            'libelle' => 'Ligue',
        ]);
        \App\Models\Categorie_structure::factory()->create([
            'libelle' => 'Club sportif',
        ]);
        \App\Models\Categorie_structure::factory()->create([
            'libelle' => 'Comité départemental',
        ]);
        \App\Models\Categorie_structure::factory()->create([
            'libelle' => 'Association',
        ]);
        \App\Models\Categorie_structure::factory()->create([
            'libelle' => 'Lycée',
        ]);
        \App\Models\Categorie_structure::factory()->create([
            'libelle' => 'Collège',
        ]);
        \App\Models\Categorie_structure::factory()->create([
            'libelle' => 'Autres',
        ]);
    }
}
