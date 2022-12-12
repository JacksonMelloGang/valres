<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Role::factory()->create([
            'libelle' => 'Administrateur',
        ]);

        \App\Models\Role::factory()->create([
            'libelle' => 'Responsable',
        ]);


        \App\Models\Role::factory()->create([
            'libelle' => 'Secretariat',
        ]);

        \App\Models\Role::factory()->create([
            'libelle' => 'Utilisateur',
        ]);
    }
}
