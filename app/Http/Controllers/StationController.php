<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\TrainStation;
use Illuminate\Http\Request;
use App\Models\StationFacility;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Station\StationRequest;
use App\Http\Requests\Station\UpdateStationRequest;
use Illuminate\Support\Facades\Gate;

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
        // Gate::authorize('admin');
        return view('pages.stations.create');
    }

    public function store(StationRequest $request)
    {
        // Gate::authorize('admin');
        $data = $request->all();
        Station::create($data);

        return redirect()->route('station.index');
    }

    public function show(Station $station)
    {
        $stationFacilities = StationFacility::all();
        $trainStations = TrainStation::all();
        return view('pages.stations.show', [
            'station' => $station,
            'stationFacilities' => $stationFacilities,
            'trainStations' => $trainStations
        ]);
    }

    public function edit(Station $station)
    {
        // Gate::authorize('admin');
        return view('pages.stations.edit', [
            'station' => $station
        ]);
    }

    public function update(UpdateStationRequest $request, Station $station)
    {
        // Gate::authorize('admin');
        $data = $request->all();
        $station->update($data);
        return redirect()->route('station.index');
    }

    public function destroy(Station $station)
    {
        // Gate::authorize('admin');
        $station->delete();
        return redirect()->route('station.index');
    }
}
