<?php

namespace App\Http\Controllers;

use App\Models\CovidStatistic;
use App\Models\City;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        $statistics = CovidStatistic::with('city')->orderBy('created_at', 'DESC')->get();
        return view('statistic.index',[
            'statistics' => $statistics,
            'cities' => $cities
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('statistic.create', [
            'cities' => $cities 
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        CovidStatistic::create($input);
        return redirect('statistic');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CovidStatistic  $covidStatistic
     * @return \Illuminate\Http\Response
     */
    public function show(CovidStatistic $covidStatistic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CovidStatistic  $covidStatistic
     * @return \Illuminate\Http\Response
     */
    public function edit(CovidStatistic $statistic)
    {
        $cities = City::all();
        return view('statistic.edit', [
            'statistic'=>$statistic,
            'cities'=>$cities
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CovidStatistic  $covidStatistic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CovidStatistic $statistic)
    {
        $input = $request->all(); 
        $statistic->update([
            'cases' => $input['cases'],
            'dead' => $input['dead'],
            'city_id' => $input['city_id']
        ]);
        return redirect('statistic');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CovidStatistic  $covidStatistic
     * @return \Illuminate\Http\Response
     */
    public function destroy(CovidStatistic $statistic)
    {
        $statistic->delete();
        return redirect('statistic');
    }
}
