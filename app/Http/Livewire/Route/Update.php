<?php

namespace App\Http\Livewire\Route;

use App\Models\Route;
use App\Models\Station;
use Livewire\Component;

class Update extends Component
{
    public $route_id, $station_start_id, $station_end_id;
    protected $listeners = [
        "getRoute"
    ];
    public function render()
    {
        return view('livewire.route.update')->with([
            "stations" => Station::all()
        ]);
    }

    public function getRoute($route)
    {
        $this->route_id = $route["id"];
        $this->station_start_id = $route["station_start_id"];
        $this->station_end_id = $route["station_end_id"];
    }

    public function update()
    {
        $this->validate([
            "station_start_id" => "required|integer",
            "station_end_id" => "required|integer"
        ]);

        $route = Route::find($this->route_id);
        $route->update([
            "station_start_id" => $this->station_start_id,
            "station_end_id" => $this->station_end_id
        ]);

        $this->resetInput();
        $this->emit("routeUpdated", $route);
    }

    private function resetInput()
    {
        $this->route_id = null;
        $this->station_start_id = null;
        $this->station_end_id = null;
    }

    public function cancel()
    {
        $statusUpdate = false;
        $this->emit("cancelUpdate", $statusUpdate);
    }
}
