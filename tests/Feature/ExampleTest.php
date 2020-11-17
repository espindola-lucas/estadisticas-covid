<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use DatabaseMigrations;
    
    public function testhome()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testCasSeeDashboardAsUser()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->get('/dashboard');
      $response->assertStatus(200);
    }
    public function testGuestIsRedirectToLogin()
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect('login');
    }

}
