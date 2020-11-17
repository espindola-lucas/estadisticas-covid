<?php

namespace Tests\Feature;

use App\Models\City;
use App\Models\User;
use App\Models\CovidStatistic;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Str;
use Tests\TestCase;

class CovidStatisticFeatureTest extends TestCase
{
    use DatabaseMigrations;

    public function testGuestCantCreateCovidStatistic()
    {
        $response = $this->get(route('statistic.create'));
        $response->assertRedirect('login');
    }

    public function testUserCantCreateCovidStatistic()
    {
        $user = User::factory()->create(['role' => 'user']);
        $response = $this->actingAs($user)
            ->get(route('statistic.create'));
        $response->assertForbidden();
    }

    public function testManagerCanCreateCovidStatistic()
    {
        $user = User::factory()->create(['role' => 'manager']);
        $response = $this->actingAs($user)
            ->get(route('statistic.create'));
        $response->assertStatus(200);
        $response->assertSee('Completar con ciudad, fecha, poblacion, casos y muertos.');
    }

    public function testStoreCovidStatistic()
    {
        $user = User::factory()->create(['role' => 'manager']);
        $city = City::factory()->create();
        $response = $this->actingAs($user)->post('statistic',
        [
            'cases' => 1045,
            'dead' => 245,
            'city_id' => $city->id,
            'user_id' => $user->id
        ]);
        $response->assertRedirect('/statistic');
        $covidStatistic = CovidStatistic::first();
        $this->assertEquals($covidStatistic->cases, 1045);
    }

    public function testManagerCanEdit()
    {
        $covidStatistic = CovidStatistic::factory()->create();
        $user = User::factory()->create(['role' => 'manager']);
        $response = $this->actingAs($user)->get('statistic/'.$covidStatistic->id.'/edit/');
        $response->assertForbidden();
    }

    public function testEditCovidStatistic()
    {
        $city = City::factory()->create();
        $covidStatistic = CovidStatistic::factory()->create();
        $user = User::factory()->create(['role' => 'manager']);
        $response = $this->actingAs($user)->put('statistic'.$covidStatistic->id,
            [
                'cases' => 1045,
                'dead' => 245,
                'city_id' => $city->id,
                'user_id' => $user->id
            ]);
        $covidStatistic = CovidStatistic::first();
        $this->assertNotEquals($covidStatistic->cases, 1045);
        $this->assertNotEquals($covidStatistic->dead, 245);
    }

    public function testDestroyCovidStatistic()
    {
        $covidStatistic = CovidStatistic::factory()->create();
        $user = User::factory()->create(['role' => 'manager']);
        $response = $this->actingAs($user)->delete('statistic/'.$covidStatistic->id);
        $covidStatistic = CovidStatistic::all();
        $this->assertEquals($covidStatistic->count(), 0);
    }

    public function testViewCovidStatisticList()
    {
        $covidStatistic = CovidStatistic::factory()->create();
        $user = User::factory()->create(['role' => 'manager']);
        $response = $this->actingAs($user)->get('statistic');
        $response->assertSee(Str::limit($covidStatistic->name,25));
        $response->assertSee($covidStatistic->created_at);
    }
}
