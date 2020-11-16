<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityAPIController extends Controller
{
    //
    public function index(){
        $cities = City::all();

        return response()->json($cities);
    }
}
