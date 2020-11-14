<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityAPIController extends Controller
{
    //

    public function index(Request $request){
        $cities = City::all();

        return response()->json($cities);
    }
}
