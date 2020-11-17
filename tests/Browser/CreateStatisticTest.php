<?php

namespace Tests\Browser;

use App\Models\City;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateStatisticTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testStatisticCovidCreate(){
    $user = User::factory()->create([
            'email' => 'manager@manger.com',
            'password' => bcrypt('12345678'),
            'role' => 'manager'
        ]);

    $city = City::factory()->create();

        $this->browse(function ($browser) use ($user, $city)
        {
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', '12345678')
                ->press('LOGIN')
                ->visit('statistic')
                ->click('@insert')
                ->select('city_id', $city->id)
                ->type('cases', 1234)
                ->type('dead', 453)
                ->select('user_id', $user->id)
                ->click('@create')
                ->assertSee(1234);
            });
    }
}
