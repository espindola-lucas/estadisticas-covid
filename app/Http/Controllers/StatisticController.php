<?php

namespace App\Http\Controllers;

use App\Models\CovidStatistic;
use App\Models\City;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
 
    public function index()
    {
        $cities = City::all();
        $statistics = CovidStatistic::with('city')->orderBy('created_at', 'DESC')->get();
        return view('statistic.index',[
            'statistics' => $statistics,
            'cities' => $cities,
        ]);
    }

    public function create()
    {
        $this->authorize('create', CovidStatistic::class);
        $cities = City::all();
        return view('statistic.create', [
            'cities' => $cities,
            'users' => \App\Models\User::all()
            ]);
    }

    public function store(Request $request)
    {
        $this->authorize('create', CovidStatistic::class);
        $input = $request->all();
        //$input['user_id'] = $request->has('user_id') && !empty($input['user_id']) ?? $request->user()->id;
        CovidStatistic::create($input);
        return redirect('statistic');
    }

    public function show(CovidStatistic $covidStatistic)
    {
        //
    }

    public function edit(CovidStatistic $statistic)
    {
        $this->authorize('update', $statistic);
        $cities = City::all();
        return view('statistic.edit', [
            'statistic'=>$statistic,
            'cities'=>$cities
            ]);
    }

    public function update(Request $request, CovidStatistic $statistic)
    {
        $this->authorize('update', $statistic);
        $input = $request->all();
        $statistic->update([
            'cases' => $input['cases'],
            'dead' => $input['dead'],
            'city_id' => $input['city_id']
        ]);
        return back()->with('success', 'Estadistica Actualizada!');
    }

    public function destroy(CovidStatistic $statistic)
    {
        $statistic->delete();
        return redirect('statistic');
    }
}
