<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\City;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CityApiTest extends TestCase
{
    use DatabaseMigrations;

    public function testUserCanViewCities()
    {
        $user = User::factory()->create();
        $city = City::factory()->create();

        $response = $this->actingAs($user)->getJson('/api/cities');

        $response->assertStatus(200);
        $response->assertJsonFragment([
            "name" => $city->name
        ]);
    }
}
