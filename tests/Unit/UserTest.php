<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function test_create_user()
    {
        $user = User::factory()->create();
        $this->assertDatabaseHas('users', ['id' => $user->id]);
    }

    public function test_update_user()
    {
        $user = User::factory()->create();
        $user->nom = 'John Doe';
        $user->save();
        $this->assertDatabaseHas('users', ['id' => $user->id, 'name' => 'John Doe']);
    }

    public function test_delete_user()
    {
        $user = User::factory()->create();
        $user->delete();
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }


    public function test_create_user_with_admin_role()
    {
        $user = User::factory()->create();
        $user->id_role = 1;
        $this->assertDatabaseHas('users', ['id' => $user->id]);
        $this->assertTrue($user->isAdministrateur());
    }

    public function test_create_user_with_secretariat_role()
    {
        $user = User::factory()->create();
        $user->id_role = 3;
        $this->assertDatabaseHas('users', ['id' => $user->id]);
        $this->assertTrue($user->isSecretaire());
    }

    public function test_create_user_with_responsable_role(){
        $user = User::factory()->create();
        $user->id_role = 2;
        $this->assertDatabaseHas('users', ['id' => $user->id]);
        $this->assertTrue($user->isResponsable());
    }

    public function test_create_user_with_invalid_role(){
        $user = User::factory()->create();
        $user->id_role = 0;
        // role not exists, assert exception is thrown
        $this->expectException(\Exception::class);
    }



}
