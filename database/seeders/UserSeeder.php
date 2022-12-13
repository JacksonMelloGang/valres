<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Administrateur
        \App\Models\User::factory()->create([
            'nom' => 'Aniyah',
            'prenom' => 'Russel',
            'mail' => 'torphy.emile@example.org',
            'username' => 'durgan.tierra',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role_id' => 1,
            'is_banned' => false
        ]);

        // Responsable
        \App\Models\User::factory()->create([
            'nom' => 'Ezekiel',
            'prenom' => 'Delphine',
            'mail' => 'sswift@example.net',
            'username' => 'marvin.rahsaan',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role_id' => 2,
            'is_banned' => false
        ]);

        // Secretariat
        \App\Models\User::factory()->create([
            'nom' => 'Rosenbaum',
            'prenom' => 'Christian',
            'mail' => 'malcolm.kassulke@example.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role_id' => 3,
            'is_banned' => false
        ]);

        // Banned Utilisateur
        \App\Models\User::factory()->create([
            'nom' => 'BANDILELLA',
            'prenom' => 'CLEMENT',
            'mail' => 'cbandilella@llgvolleyball.fr',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role_id' => 4,
            'is_banned' => true
        ]);

        \App\Models\User::factory()->count(2)->create();

    }
}
