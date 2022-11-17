<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Http\Requests\StationRequest;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stations = Station::latest()->get();
        return view('pages.station.index', [
            'stations' => $stations
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function show(Station $station)
    {
        return view('pages.station.show ',[
            'station' => $station
        ]);
    }
}
