<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testResgirter()
    {
        $user =User::factory() ->create([
            'email'=> 'test@laravel.com',
            'password' => bcrypt('12345678')
        ]);
        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/register')
                ->type('name',$user ->name)
                ->type('email',$user->email)
                ->type('password','12345678')
                ->type('password_confirmation','12345678')
                ->press('REGISTER')
                ->assertSee('Name');
                $browser->visit('/user/profile')
                ->assertSee('Email');
        });
    }
}