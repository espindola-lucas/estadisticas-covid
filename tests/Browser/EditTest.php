<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testEditTodo(){
        $this->browse(function ($browser) {
            $browser->visit('/register')
                ->type('name', 'edit dusk test')
                ->type('email', 'edit@dusk')
                ->type('password','12345678')
                ->type('password_confirmation','12345678')
                ->press('REGISTER')
                ->visit('cities/create')
                ->type('name', 'City Dusk')
                ->type('population', '200.000')
                ->type('image', 'imagen/dusk')
                ->click('@create')
                ->assertSee('City')
                ->visit('cities/1/edit')
                ->type('name', 'Edit Dusk')
                ->type('population', '200.000')
                ->type('image', 'imagen/dusk')
                ->click('@edit')
                ->assertSee('Edit Dusk');
        }   );
    }
}
