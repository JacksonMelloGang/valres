<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationPeriodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\ReservationPeriode::factory()->create([
            'libelle' => '8h30 - 12h30',
        ]);

        \App\Models\ReservationPeriode::factory()->create([
            'libelle' => '11h30 - 14h30',
        ]);


        \App\Models\ReservationPeriode::factory()->create([
            'libelle' => '14h00 - 18h00',
        ]);

        \App\Models\ReservationPeriode::factory()->create([
            'libelle' => '18h30 - 23h00',
        ]);
    }
}
