<?php

namespace App\Http\Livewire\Route;

use App\Models\Route;
use App\Models\Station;
use Livewire\Component;
use Ramsey\Uuid\Type\Integer;

class Index extends Component
{
    public $statusUpdate = false;
    protected $listeners = [
        "routeStored",
        "errorStored",
        "routeUpdated",
        "cancelUpdate"
    ];

    public $search_station_start;
    public $search_station_end;

    public function render()
    {
        $searchStart = Route::where('station_start_id', 'like', '%'.$this->search_station_start.'%')->get();
        $searchEnd = Route::where('station_end_id', 'like', '%'.$this->search_station_end.'%')->get();

        return view('livewire.route.index')->with([
            'stations' => Station::all(),
            "routes" => Route::with(["StartStation", "EndStation"])->get()
        ]);
    }

    public function routeStored($route)
    {
        session()->flash("success", "Data rute sukses disimpan");
    }

    public function errorStored($error)
    {
        session()->flash("error", "Stasiun awal tidak boleh sama stasiun akhir");
    }

    public function edit($route_id)
    {
        $this->statusUpdate = true;
        $route = Route::find($route_id);
        $this->emit("getRoute", $route);
    }

    public function cancelUpdate($statusUpdate)
    {
        $this->statusUpdate = $statusUpdate;
    }

    public function routeUpdated($route)
    {
        $this->statusUpdate = false;
        session()->flash("success", "Data berhasil dirubah");
    }

    public function destroy($route_id)
    {
        $route = Route::find($route_id);
        $route->delete();
        session()->flash("success", "Data berhasil dihapus");
    }
}
