<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    public function testUserIsManager()
    {
        $user = User::factory()->create(['role' => 'manager']);
        $userIsManager = $user->isManager();
        $this->assertTrue($userIsManager);
    }

    public function testUserIsNotManager()
    {
        $user = User::factory()->create(['role' => 'user']);
        $userIsManager = $user->isManager();
        $this->assertFalse($userIsManager);
    }
}
