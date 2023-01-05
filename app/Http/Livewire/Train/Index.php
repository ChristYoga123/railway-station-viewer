<?php

namespace App\Http\Livewire\Train;

use App\Models\Train;
use Livewire\Component;

class Index extends Component
{
    public $statusUpdate = false;

    protected $listeners = [
        "trainStored",
        "trainUpdated",
        "cancelUpdate"
    ];
    public function render()
    {
        return view('livewire.train.index')->with([
            "trains" => Train::all()    
        ]);
    }

    public function trainStored($train)
    {
        session()->flash("success", "Kereta berhasil ditambahkan");
    }

    public function getTrain($train)
    {
        $this->statusUpdate = true;
        $train = Train::findOrFail($train);
        $this->emit("getTrain", $train);
    }

    public function cancelUpdate($updateStatus)
    {
        $this->statusUpdate = $updateStatus;
    }
    
    public function trainUpdated($train)
    {
        $this->statusUpdate = false;
        session()->flash("success", "Kereta berhasil diubah");
    }
    public function destroy($train)
    {
        $train = Train::findOrFail($train);
        $train->delete();
    }
}
