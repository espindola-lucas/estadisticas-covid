<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;

class CityController extends Controller
{
    
    public function index()
    {
        $cities = City::all();
        return view('cities.index', [
            'cities' => $cities
        ]);
    }

    public function create()
    {
        $users = User::all();
        return view('cities.create', [
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        // Save file to disk

        $filePath = $request->file('image')->store('files',
        [
            'disk' => 'public'
        ]);
        $input['image'] = $filePath;

        

        City::create([
            'name' => $input['name'],
            'population' => $input['population'],
            'image' =>  $input['image'],
            'user_id' => $input['user_id']
        ]);
        return redirect('cities');
    }

    public function edit(City $city)
    {
        $this->authorize('update', $city);
        return view ('cities.edit', [
            'city' => $city
            ]);
    }

    public function update(Request $request, City $city)
    {
        $this->authorize('update', $city);
        $input=$request->all();
        $city -> update($input);
        return redirect('cities');
    }

    public function destroy(City $city)
    {
        $city->delete();
        return redirect('cities');
    }
}
