<?php

namespace App\Livewire;

use App\Models\Exercise;
use App\Models\Routine;
use App\Models\RoutineExercise;
use App\Models\SeriesExercise;
use Livewire\Component;

class Rotina extends Component
{
    public $routine;

    public $search;

    public function mount(Routine $codigo)
    {
        $this->routine = $codigo;
    }

    public function listRoutineExercises()
    {
        $routines = RoutineExercise::select([
            'routine_exercises.id',
            'exercises.name',
            'exercises.equipment',
        ])
            ->leftJoin('exercises', 'exercises.id', '=', 'routine_exercises.exercise_id')
            ->where('routine_id', $this->routine->id)
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
            ->when(!empty($this->search), function ($query) {
                return $query->where('name', 'LIKE', '%' . $this->search . '%');
            })

            ->get();

        return $exercises;
    }

    public function getExercise($exercise)
    {
        $exists = RoutineExercise::where('id', $exercise)->first();

        if (!$exists) {
            $exercise = RoutineExercise::create(
                [
                    'routine_id' => $this->routine->id,
                    'exercise_id' => $exercise,
                ]
            );

            if ($exercise->save()) {

                $series = SeriesExercise::create([
                    'routine_exercise_id' => $exercise->id,
                    'series' => 1,
                    'kg' => 0,
                    'reps' => 0,
                ]);

                $series->save();

                return $this->dispatch('close-modal-main');
            }
        }

        return;
    }

    public function listSeries()
    {
        $series = SeriesExercise::all();

        return $series;
    }

    public function getSeries($exercise)
    {
        $serie = SeriesExercise::where('routine_exercise_id', $exercise)->orderBy('id', 'DESC')->first();

        $series = $serie->series + 1;

        $addSerie = SeriesExercise::create([
            'routine_exercise_id' => $exercise,
            'series' => $series,
            'kg' => 0,
            'reps' => 0,
        ]);

        if ($addSerie->save()) {
            return;
        }
    }

    public function render()
    {
        return view('livewire.rotina', [
            'exercisesRoutines' => $this->listRoutineExercises(),
            'exercises' => $this->listExercises(),
            'series' => $this->listSeries(),
        ]);
    }
}
