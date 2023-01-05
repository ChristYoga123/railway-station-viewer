<?php

namespace App\Http\Livewire\Train;

use App\Models\Train;
use Livewire\Component;

class Create extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.train.create');
    }

    public function store()
    {
        $this->validate([
           "name" => "required|max:255|unique:trains,name", 
        ]);

        $train = Train::create([
           "name" => $this->name
        ]);

        $this->resetInput();
        $this->emit("trainStored", $train);
    }

    private function resetInput()
    {
        $this->name = null;
    }
}
