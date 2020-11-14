<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityAPIController extends Controller
{
    //

    public function index(Request $request){
        $cities = City::where('assigned_to' , $request->user()->id)->get();

        return response()->json($cities);
    }
}
