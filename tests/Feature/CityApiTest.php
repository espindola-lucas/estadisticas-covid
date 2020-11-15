<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\City;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CityApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserCanViewCities()
    {
        $user = User::factory()->create();
        $city = City::factory()->create();
        Sanctum::actingAs(
            $user,
            ['view-cities']
        );

        $response = $this->getJson('/api/cities');

        $response->assertStatus(200);
        $response->assertJsonFragment([
            "name" => $city->name
        ]);
    }
}
