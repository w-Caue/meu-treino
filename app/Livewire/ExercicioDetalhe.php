<?php

namespace App\Livewire;

use App\Models\Exercise;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ExercicioDetalhe extends Component
{
    public $exercise;

    public function mount(Exercise $codigo)
    {
        $this->exercise = $codigo;
        // dd($this->exercise);
    }


    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.exercicio-detalhe');
    }
}
