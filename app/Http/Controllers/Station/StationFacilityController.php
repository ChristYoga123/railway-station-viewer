<?php

namespace App\Http\Controllers\Station;

use App\Http\Controllers\Controller;
use App\Models\StationFacility;
use Illuminate\Http\Request;

class StationFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stationFacility = StationFacility::with('Station');
        return view('pages.station_facilities.index', [
            'stationFacilities' => $stationFacility
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.station_facilities.create');
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
     * @param  \App\Models\StationFacility  $stationFacility
     * @return \Illuminate\Http\Response
     */
    public function show(StationFacility $stationFacility)
    {
        return view('pages.station_facilities.show', [
            'stationFacility' => $stationFacility
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StationFacility  $stationFacility
     * @return \Illuminate\Http\Response
     */
    public function edit(StationFacility $stationFacility)
    {
        return view('pages.station_facilities.edit', [
            'stationFacility' => $stationFacility
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StationFacility  $stationFacility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StationFacility $stationFacility)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StationFacility  $stationFacility
     * @return \Illuminate\Http\Response
     */
    public function destroy(StationFacility $stationFacility)
    {
        //
    }
}
