<?php

namespace App\Http\Controllers;

use App\Models\Train;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\TrainRequest;
use App\Http\Requests\Admin\UpdateTrainRequest;

class TrainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trains = Train::latest()->get();
        return view('pages.trains.index', compact('trains'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Gate::authorize('train');
        return view('pages.trains.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrainRequest $request)
    {
        // Gate::authorize('train');

        $data = $request->all();

        Train::create($data);

        return redirect()->route('train.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Train  $train
     * @return \Illuminate\Http\Response
     */
    public function show(Train $train)
    {
        // Gate::authorize('train');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Train  $train
     * @return \Illuminate\Http\Response
     */
    public function edit(Train $train)
    {
        // Gate::authorize('train');

        return view('pages.trains.edit', [
            'train' => $train
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Train  $train
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrainRequest $request, Train $train)
    {
        // Gate::authorize('train');
        $data = $request->all();

        $train->update($data);

        return redirect()->route('train.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Train  $train
     * @return \Illuminate\Http\Response
     */
    public function destroy(Train $train)
    {
        // Gate::authorize('train');

        $train->delete();

        return redirect()->route('train.index')->with('success', 'Data berhasil dihapus');
    }
}
