<?php

namespace App\Http\Controllers;

use App\Models\CovidStatistic;
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
        $statistics = CovidStatistic::all();
        return view('statistics.index', [
            'statistics' => $statistics
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(CovidStatistic $covidStatistic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CovidStatistic  $covidStatistic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CovidStatistic $covidStatistic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CovidStatistic  $covidStatistic
     * @return \Illuminate\Http\Response
     */
    public function destroy(CovidStatistic $covidStatistic)
    {
        //
    }
}
