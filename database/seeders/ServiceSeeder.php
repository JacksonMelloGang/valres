<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Service::factory()->create([
            'libelle' => 'Administrateur',
        ]);

        \App\Models\Service::factory()->create([
            'libelle' => 'Responsable',
        ]);


        \App\Models\Service::factory()->create([
            'libelle' => 'Secretariat',
        ]);
    }
}
