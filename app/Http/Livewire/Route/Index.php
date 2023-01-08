<?php

namespace App\Http\Livewire\Route;

use App\Models\Route;
use Livewire\Component;

class Index extends Component
{
    public $statusUpdate = false;
    protected $listeners = [
        "routeStored",
        "errorStored",
        "routeUpdated",
        "cancelUpdate"
    ];
    public function render()
    {
        return view('livewire.route.index')->with([
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
