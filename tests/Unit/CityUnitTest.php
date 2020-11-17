<?php

namespace Tests\Unit;

use App\Models\City;
use App\Models\CovidStatistic;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\User;
use Tests\TestCase;

class CityUnitTest extends TestCase
{
    use DatabaseMigrations;

    public function testCovidStatistic()
    {
        $author = User::factory()->create();
        $covidStatistic = CovidStatistic::factory()->create(['user_id' => $author]);
        $this->assertEquals($author->id, $covidStatistic->user_id);
    }

    public function testCity()
    {
        $city = City::factory()->create();
        $covidStatistic = CovidStatistic::factory()->create(['city_id' => $city]);
        $this->assertEquals($city->id, $covidStatistic->city_id);
    }
}
