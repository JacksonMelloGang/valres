<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Salle::factory()->create([
            'salle_nom' => 'Daum',
            'cat_id' => 1,
        ]);
        \App\Models\Salle::factory()->create([
            'salle_nom' => 'Corbin',
            'cat_id' => 1,
        ]);
        \App\Models\Salle::factory()->create([
            'salle_nom' => 'Baccarat',
            'cat_id' => 1,
        ]);
        \App\Models\Salle::factory()->create([
            'salle_nom' => 'Longwy',
            'cat_id' => 1,
        ]);
        \App\Models\Salle::factory()->create([
            'salle_nom' => 'Baccarat',
            'cat_id' => 2,
        ]);
        \App\Models\Salle::factory()->create([
            'salle_nom' => 'Multimédia',
            'cat_id' => 2,
        ]);
        \App\Models\Salle::factory()->create([
            'salle_nom' => 'Amphithéâtre',
            'cat_id' => 3,
        ]);
        \App\Models\Salle::factory()->create([
            'salle_nom' => 'Lamour',
            'cat_id' => 1,
        ]);
        \App\Models\Salle::factory()->create([
            'salle_nom' => 'Grüber',
            'cat_id' => 1,
        ]);
        \App\Models\Salle::factory()->create([
            'salle_nom' => 'Majorelle',
            'cat_id' => 1,
        ]);
        \App\Models\Salle::factory()->create([
            'salle_nom' => 'Salle de restauration',
            'cat_id' => 2,
        ]);
        \App\Models\Salle::factory()->create([
            'salle_nom' => 'Galerie',
            'cat_id' => 1,
        ]);
        \App\Models\Salle::factory()->create([
            'salle_nom' => 'Salle informatique',
            'cat_id' => 2,
        ]);
        \App\Models\Salle::factory()->create([
            'salle_nom' => 'Hall d\'accueil',
            'cat_id' => 2,
        ]);
        \App\Models\Salle::factory()->create([
            'salle_nom' => 'Gallé',
            'cat_id' => 1,
        ]);
    }
}
