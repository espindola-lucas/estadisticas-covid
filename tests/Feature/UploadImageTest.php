<?php

namespace Tests\Feature;

use App\Models\City;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class UploadImageTest extends TestCase
{
    public function testImageUpload()
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->create('test.pdf', '1200');

        $city = City::factory()->make()->toArray();
        $city['imageToUpload'] = $file;

        $user = User::factory()->create(['role' => 'manager']);
        $response = $this->actingAs($user)->post('/cities', $city);

        $response = $this->actingAs($user)->get('/cities');

        //assert the file was stored...
        Storage::disk('public')->assertExists('files/' . $file->hashName());

        $city = City::first();
        $this->assertNotEmpty($city->image);
    }
}
