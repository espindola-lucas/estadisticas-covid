<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CityAPIController extends Controller
{
    //

    public function index(){
        $cities = \App\Models\City::all();

        return response()->json($cities);
    }
}
