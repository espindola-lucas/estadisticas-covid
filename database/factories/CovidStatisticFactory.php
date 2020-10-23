<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\CovidStatistic;
use Illuminate\Database\Eloquent\Factories\Factory;

class CovidStatisticFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CovidStatistic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cases'=>$this->faker->numberBetween(1,1000000),
            'dead'=>$this->faker->numberBetween(1,1000000),
            'city_id'=> City::factory()->create()
        ];
    }
}
