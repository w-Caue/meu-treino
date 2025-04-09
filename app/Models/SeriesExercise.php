<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeriesExercise extends Model
{
    protected $fillable = [
        'routine_exercise_id',
        'series',
        'kg',
        'reps',
    ];
}
