<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TrainStationRequest;
use App\Models\Station;
use App\Models\Train;
use App\Models\TrainStation;
use Illuminate\Http\Request;

class TrainStationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainStations = TrainStation::paginate(10);
        return view('pages.train_stations.index', [
            'trainStations' => $trainStations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trains = Train::all();
        $stations = Station::all();
        return view('pages.train_stations.create', [
            'trains' => $trains,
            'stations' => $stations
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrainStationRequest $request)
    {
        $data = $request->all();
        TrainStation::create($data);
        return redirect()->route('trainStation.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrainStation  $trainStation
     * @return \Illuminate\Http\Response
     */
    public function show(TrainStation $trainStation)
    {
        return view('pages.train_stations.show', [
            'trainStation' => $trainStation
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrainStation  $trainStation
     * @return \Illuminate\Http\Response
     */
    public function edit(TrainStation $trainStation)
    {
        $trains = Train::all();
        $stations = Station::all();
        return view('pages.train_stations.edit', [
            'trainStation' => $trainStation,
            'trains' => $trains,
            'stations' => $stations
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrainStation  $trainStation
     * @return \Illuminate\Http\Response
     */
    public function update(TrainStationRequest $request, TrainStation $trainStation)
    {
        $data = $request->all();
        $trainStation->update($data);
        return redirect()->route('trainStation.index')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrainStation  $trainStation
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrainStation $trainStation)
    {
        $trainStation->delete();
        return redirect()->route('trainStation.index')->with('success', 'Data berhasil dihapus');
    }
}
