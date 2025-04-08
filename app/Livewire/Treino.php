<?php

namespace App\Livewire;

use App\Models\Routine;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Treino extends Component
{
    #[Validate('required', message: 'Informe o título da rotina!')]
    public $name;

    public function createRoutine()
    {
        $this->validate();

        $user = Auth::user()->id;

        $routine = Routine::create([
            'user_id' => $user,
            'name' => $this->name,
            'date' => date('Y-m-d'),
        ]);

        if ($routine->save()) {
            return redirect()->route('treino.rotina', ['codigo' => $routine->id]);
        }

        return;
    }

    public function listRoutines()
    {
        $routines = Routine::all();

        return $routines;
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.treino', [
            'routines' => $this->listRoutines(),
        ]);
    }
}
