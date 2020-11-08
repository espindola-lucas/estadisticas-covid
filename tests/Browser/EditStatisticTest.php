<?php

namespace Tests\Browser;

use App\Models\City;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditStatisticTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testStatisticCovidEdit(){

        $user = User::factory()->create([
            'email' => 'example2@example.com',
            'password' => bcrypt('12345678'),
            'role' => 'manager'
        ]);

        $city = City::factory()->create();

        $this->browse(function ($browser) use ($user, $city){
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
                ->assertSee(1234)
                ->click('@goEdit')
                ->type('cases', 9876)
                ->click('@edit')
                ->visit('statistic')
                ->assertSee(9876);
        }   );
    }
}
