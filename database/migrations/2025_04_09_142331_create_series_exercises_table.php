<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('series_exercises', function (Blueprint $table) {
            $table->id();
            $table->foreignId('routine_exercise_id');
            $table->string('obs')->nullable();
            $table->integer('series');
            $table->double('kg');
            $table->integer('reps');
            $table->enum('done', ['S', 'N'])->default('N');
            $table->timestamps();

            $table->foreign('routine_exercise_id')->references('id')->on('routine_exercises');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('series_exercises');
    }
};
