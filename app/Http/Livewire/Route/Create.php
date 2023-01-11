<?php

namespace App\Http\Livewire\Route;

use App\Models\Route;
use App\Models\Station;
use Livewire\Component;

class Create extends Component
{
    public $station_start_id,
           $station_end_id;

    public function render()
    {
        return view('livewire.route.create')->with([
            "stations" => Station::all()
        ]);
    }

    public function store()
    {
        $this->validate([
            "station_start_id" => "required|integer",
            "station_end_id" => "required|integer"
        ]);

        if($this->station_start_id === $this->station_end_id)
        {
            $error = "Stasiun awal dan stasiun akhir tidak boleh sama";
            $this->resetInput();
            $this->emit("errorStored", $error);
        }else{
            $route = Route::create([
                "station_start_id" => $this->station_start_id,
                "station_end_id" => $this->station_end_id,
                ]);

            $this->resetInput();
            $this->emit("routeStored", $route);
        }
    }

    private function resetInput()
    {
        $this->station_start_id = null;
        $this->station_end_id = null;
    }
}
