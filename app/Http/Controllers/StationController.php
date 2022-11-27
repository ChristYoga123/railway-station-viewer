<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Station;
use Illuminate\Http\Request;

class StationController extends Controller
{
    public function index()
    {
        $stations = Station::paginate(10);
        return view('pages.stations.index', [
            'stations' => $stations
        ]);
    }
    
    public function create()
    {
        $this->authorize('station');
        return view('pages.station_facilities.create');
    }

    public function store(Request $request)
    {
        $this->authorize('station');
    }

    public function show(Station $station)
    {
        return view('pages.stations.show', [
            'station' => $station
        ]);
    }

    public function edit(Station $station)
    {
        $this->authorize('station');
        return view('pages.station_facilities.edit', [
            'station' => $station
        ]);
    }

    public function update(Request $request, Station $station)
    {
        $this->authorize('station');
    }

    public function destroy(Station $station)
    {
        $this->authorize('station');
        $station->delete();
        return redirect()->route('station.index');
    }
}
