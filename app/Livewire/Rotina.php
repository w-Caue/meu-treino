<?php

namespace App\Livewire;

use App\Models\Exercise;
use App\Models\Routine;
use App\Models\RoutineExercise;
use Livewire\Component;

class Rotina extends Component
{
    public $routine;

    public function mount(Routine $codigo)
    {
        $this->routine = $codigo;
    }

    public function listRoutineExercises()
    {
        $routines = RoutineExercise::where('routine_id', $this->routine->id)
            ->get();

        return $routines;
    }

    public function listExercises()
    {
        $exercises = Exercise::select(
            'id',
            'name',
            'muscle',
            'equipment',
        )
            ->get();

        return $exercises;
    }

    public function render()
    {
        return view('livewire.rotina', [
            'exercisesRoutines' => $this->listRoutineExercises(),
            'exercises' => $this->listExercises(),
        ]);
    }
}
