<?php

namespace App\Http\Controllers;

use App\Models\Station;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Station\StationRequest;
use App\Http\Requests\Station\UpdateStationRequest;
use App\Models\StationFacility;
use Illuminate\Support\Facades\Auth;

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
        return view('pages.stations.create');
    }

    public function store(StationRequest $request)
    {
        $this->authorize('station');
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        Station::create($data);

        return redirect()->route('station.index');
    }

    public function show(Station $station)
    {
        $stationFacility = StationFacility::all();
        return view('pages.stations.show', [
            'station' => $station,
            'stationFacility' => $stationFacility,
        ]);
    }

    public function edit(Station $station)
    {
        $this->authorize('station');
        return view('pages.stations.edit', [
            'station' => $station
        ]);
    }

    public function update(UpdateStationRequest $request, Station $station)
    {
        $this->authorize('station');
        $data = $request->all();
        $station->update($data);
        return redirect()->route('station.index');
    }

    public function destroy(Station $station)
    {
        $this->authorize('station');
        $station->delete();
        return redirect()->route('station.index');
    }
}
