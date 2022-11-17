<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Station;
use Illuminate\Http\Request;

class StationController extends Controller
{
    public function index()
    {
        $stations = Station::paginate(10);
        return view('pages.Admin.stations.index', [
            'stations' => $stations
        ]);
    }

    public function show(Station $station)
    {
        return view('pages.Admin.stations.show', [
            'station' => $station
        ]);
    }
}
