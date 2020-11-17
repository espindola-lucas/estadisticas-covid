<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\CityController;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\CovidStatistic;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function (){
    Route::resource('statistic', StatisticController::class);
});

Route::middleware(['auth:sanctum', 'verified'])->group(function (){
    Route::resource('cities', CityController::class);
});

Route::get('/',function () {
    $cities = City::with('statistics')->get();
    $statistics = CovidStatistic::all();
  return view('welcome', [
      'cities'=> $cities,
      'statistics'=> $statistics 
      ]);
})->name('welcome');
