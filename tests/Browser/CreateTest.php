<?php

namespace Tests\Browser;

use Facebook\WebDriver\Remote\LocalFileDetector;
use Facebook\WebDriver\WebDriverBy;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
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

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Covid');
        });
        // $user = User::factory()->create([
        //     'email' => 'test@test.com',
        //     'password' => bcrypt('12345678')
        // ]);

        // $this->browse(function ($browser) use ($user) {
        //     $file = $browser->driver->findElements(WebDriverBy::id('image'));
        //     $file->setFileDetector(new LocalFileDetector());
        //     $file->sendKeys('/home/lucas/Descargas/bariloche.jpg');

        //     $browser->visit('/login')
        //         ->type('email', $user->email)
        //         ->type('password', '12345678')
        //         ->press('LOGIN')
        //         ->visit('cities')
        //         ->click('@insertar')
        //         ->type('name', 'Test')
        //         ->type('population', '1000')
        //         ->type('image', $file)
        //         ->click('@create')
        //         ->assertSee('Test');
        //     });
    }
}
