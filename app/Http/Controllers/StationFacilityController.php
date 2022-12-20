<?php

namespace App\Http\Controllers;

use App\Http\Requests\StationFacilityRequest;
use App\Models\Station;
use App\Models\StationFacility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StationFacilityController extends Controller
{
    public function __construct()
    {
        $this->authorize('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $this->authorize('station');

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
        $this->authorize('station');

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
        $this->authorize('station');

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
        $this->authorize('station');

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
        $this->authorize('station');

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
        $this->authorize('station');

        if($stationFacility->image){
            Storage::delete($stationFacility->image);
        }
        $stationFacility->delete();

        return redirect()->route('stationFacility.index')->with('success', 'Data berhasil dihapus');
    }
}
