<?php

namespace App\Http\Controllers;

use App\Http\Requests\StationFacilityRequest;
use App\Models\Station;
use App\Models\StationFacility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class StationFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('admin');
        return view('pages.station_facilities.index', [
            'station_facilities' => StationFacility::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('admin');
        return view('pages.station_facilities.create', [
            'stations' => Station::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StationFacilityRequest $request)
    {
        Gate::authorize('admin');
        $data = $request->all();
        if($request->file('image')){
            $data["image"] = $request->file('image')->store('facility');
        }
        StationFacility::create($data);

        return redirect()->route('stationFacility.index')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StationFacility  $stationFacility
     * @return \Illuminate\Http\Response
     */
    public function show(StationFacility $stationFacility)
    {
        Gate::authorize('admin');
        return view('pages.station_facilities.show', [
            'station_facility' => $stationFacility
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
        Gate::authorize('admin');
        $stations = Station::all();

        return view('pages.station_facilities.edit', [
            'stationFacility' => $stationFacility,
            'stations' => $stations
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StationFacility  $stationFacility
     * @return \Illuminate\Http\Response
     */
    public function update(StationFacilityRequest $request, StationFacility $stationFacility)
    {
        Gate::authorize('admin');
        $data = $request->all();
        if ($request->image) {
            if ($request->old_image) {
                Storage::delete($request->old_image);
            }
            $data["image"] = $request->file('image')->store('facility');
        }

        $stationFacility->update($data);

        return redirect()->route('stationFacility.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StationFacility  $stationFacility
     * @return \Illuminate\Http\Response
     */
    public function destroy(StationFacility $stationFacility)
    {
        Gate::authorize('admin');
        if($stationFacility->image){
            Storage::delete($stationFacility->image);
        }
        $stationFacility->delete();

        return redirect()->route('stationFacility.index')->with('success', 'Data berhasil dihapus');
    }
}
