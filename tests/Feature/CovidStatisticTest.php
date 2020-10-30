<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\CovidStatistic;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CovidStatisticTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGuestCantCreateCity()
    {
        $response = $this->get(route('statistic.create'));
        $response->assertRedirect('login');
    }

    public function testUserCantCreateCity()
    {
        $user = User::factory()->create(['role' => 'user']);
        $response = $this->actingAs($user)
            ->get(route('statistic.create'));
        $response->assertForbidden();
    }

    public function testManagerCanCreateCity()
    {
        $user = User::factory()->create(['role' => 'manager']);
        $response = $this->actingAs($user)
            ->get(route('statistic.create'));
        $response->assertStatus(200);
    }
}
