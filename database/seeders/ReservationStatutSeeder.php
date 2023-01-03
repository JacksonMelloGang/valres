<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationStatutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\ReservationStatut::factory()->create([
            'libelle' => 'Confirmée',
        ]);
        \App\Models\ReservationStatut::factory()->create([
            'libelle' => 'En attente',
        ]);
        \App\Models\ReservationStatut::factory()->create([
            'libelle' => 'Annulée',
        ]);
    }
}
