<?php

namespace App\Http\Livewire\Train;

use App\Models\Train;
use Livewire\Component;

class Update extends Component
{
    public $trainId,
           $name;

    protected $listeners = [
        "getTrain" => "showTrain"  
    ];
    public function render()
    {
        return view('livewire.train.update');
    }

    public function showTrain($train)
    {
        $this->trainId = $train["id"];
        $this->name = $train["name"];
    }

    public function update()
    {
        $this->validate([
           "name" => "required|max:255|unique:trains,name,".$this->trainId 
        ]);
        $train = Train::findOrFail($this->trainId);
        $train->update([
           "name" => $this->name 
        ]); 
        $this->resetInput();
        $this->emit("trainUpdated", $train);
    }

    public function cancel()
    {
        $updateStatus = false;
        $this->emit("cancelUpdate", $updateStatus);
    }

    private function resetInput()
    {
        $this->name = null;
        $this->trainId = null;
    }

}
