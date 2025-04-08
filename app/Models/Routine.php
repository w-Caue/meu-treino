<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Routine extends Model
{
    // protected $table = 'routines';
    protected $fillable = [
        'user_id',
        'name',
        'date',
    ];
}
