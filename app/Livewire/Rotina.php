<?php

namespace App\Livewire;

use App\Models\Routine;
use Livewire\Component;

class Rotina extends Component
{
    public $routine;

    public function mount(Routine $codigo)
    {
        $this->routine = $codigo;
    }

    public function render()
    {
        return view('livewire.rotina');
    }
}
