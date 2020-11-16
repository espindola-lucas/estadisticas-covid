<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityAPIController extends Controller
{
    //
    /*
    public function index(){
        $cities = \App\Models\City::all();

        return response()->json($cities);
    } */
    public function city(){
        return City::all();
    }

    public function index(){
        return response()->json(city());
    }
}
