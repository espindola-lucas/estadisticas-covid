<?php

namespace Database\Seeders;

use App\Models\CovidStatistic;
use Illuminate\Database\Seeder;

class CovidStatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CovidStatistic::factory()->create();
    }
}
