<?php

namespace App\Http\Controllers\Admin;

use App\Models\Train;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

        return view('pages.Admin.trains.index', compact('trains'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin');
        return view('pages.Admin.trains.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrainRequest $request)
    {
        $this->authorize('admin');

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
        $this->authorize('admin');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Train  $train
     * @return \Illuminate\Http\Response
     */
    public function edit(Train $train)
    {
        $this->authorize('admin');

        return view('pages.Admin.trains.edit', [
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
        $this->authorize('admin');
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
        $this->authorize('admin');

        $train->delete();

        return redirect()->route('train.index')->with('success', 'Data berhasil dihapus');
    }
}
