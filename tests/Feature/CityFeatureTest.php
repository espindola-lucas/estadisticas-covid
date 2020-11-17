<?php

namespace Tests\Feature;

use App\Models\City;
use App\Models\User;
use App\Models\CovidStatistic;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CityFeatureTest extends TestCase
{
    use DatabaseMigrations;

    public function testGuestCantCreateCity()
    {
        $response = $this->get(route('cities.create'));
        $response->assertRedirect('login');
    }

    public function testManagerCanCreateCity()
    {
        $user = User::factory()->create(['role' => 'manager']);
        $response = $this->actingAs($user)
            ->get(route('cities.create'));
        $response->assertStatus(200);
        $response->assertSee('Completar con ciudad y poblacion e imagen.');
    }

    public function testStoreCity()
    {
        $user = User::factory()->create(['role' => 'manager']);
        $city = City::factory()->create();
        $response = $this->actingAs($user)->post('cities',
        [
            'name' => 'Prueba',
            'population' => 245,
            'user_id' => $user->id
        ]);
        $response = $this->actingAs($user)->get('/cities');
        $city = City::first();
        $this->assertNotEquals($city->name, 'Prueba');
    }

    public function testManagerCanEdit()
    {
        $user = User::factory()->create(['role' => 'manager']);
        $city = City::factory()->create(['user_id' => $user->id]);
        $response = $this->actingAs($user)->get('cities/'.$city->id.'/edit/');
        $response->assertStatus(200);
    }

    public function testEditCity()
    {
        $user = User::factory()->create(['role' => 'manager']);
        $city = City::factory()->create(['user_id' => $user->id]);
        $response = $this->actingAs($user)->put('cities/'.$city->id,
            [
                'name' => 'Prueba',
                'population' => 245,
                'user_id' => $user->id
            ]);
        $city = City::first();
        $this->assertEquals($city->name, 'Prueba');
        $this->assertEquals($city->population, 245);
    }

    public function testDestroyCity()
    {
        $city = City::factory()->create();
        $user = User::factory()->create(['role' => 'manager']);
        $response = $this->actingAs($user)->delete('cities/'.$city->id);
        $city = City::all();
        $this->assertEquals($city->count(), 0);
    }

    public function testViewCityList()
    {
        $city = City::factory()->create();
        $user = User::factory()->create(['role' => 'manager']);
        $response = $this->actingAs($user)->get('cities');
        $response->assertSee($city->name);
    }
}
