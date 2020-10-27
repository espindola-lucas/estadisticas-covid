<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\City;
use App\Models\User;

class CreateTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCreateCity(){

        $user = User::factory()->create([
            'email' => 'test@test.com',
            'password' => bcrypt('12345678')
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', '12345678')
                ->press('LOGIN')
                ->visit('cities')
                ->click('@insertar')
                ->type('name', 'Test City')
                ->type('population', '1000')
                ->type('image', 'Photo city')
                ->click('@create')
                ->assertSee('Test City');
            });
    }
}
