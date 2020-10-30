<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHome()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testDashboardAsUser()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
                        ->get('/dashboard');
        $response->assertStatus(200);
    }

    public function testDashboardAsGuest()
    {
        $response = $this->get('/dashboard');
        $response->assertRedirect('login');
    }
}
