<?php

namespace Tests\Unit;

use App\Models\Client;
use App\Models\User;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{

    public function test_create_client(){
        $user = User::factory()->create();
        $structure = Structure::factory()->create();

        $client = Client::factory()->create(['utilisateur_id' => $user->utilisateur_id, 'structure_id' => $structure->structure_id]);
        $this->assertDatabaseHas('clients', ['id' => $client->id]);
    }

    public function test_update_client(){
        $user = User::factory()->create();
        $structure = Structure::factory()->create();

        $client = Client::factory()->create(['utilisateur_id' => $user->utilisateur_id, 'structure_id' => $structure->structure_id]);
        $this->assertNotNull(Client::where('utilisateur_id', $user->utilisateur_id)->where('structure_id', $structure->structure_id)->first());

        $client->user->nom = 'John Doe';
        $client->save();
        $this->assertDatabaseHas('users', ['id' => $client->user->id, 'nom' => 'John Doe']);

        $client->structure_id = 2;
        $client->save();
        $this->assertDatabaseHas('clients', ['id' => $client->id, 'structure_id' => 2]);
    }

    public function test_delete_client(){
        $user = User::factory()->create();
        $structure = Structure::factory()->create();

        $client = Client::factory()->create(['utilisateur_id' => $user->utilisateur_id, 'structure_id' => $structure->structure_id]);
        $this->assertNotNull(Client::where('utilisateur_id', $user->utilisateur_id)->where('structure_id', $structure->structure_id)->first());

        $client->delete();
        $this->assertDatabaseMissing('clients', ['id' => $client->id]);
    }
}
