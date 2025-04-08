<?php

use App\Livewire\Dashboard;
use App\Livewire\Perfil;
use App\Livewire\Rotina;
use App\Livewire\Treino;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/inicio', Dashboard::class)->name('dashboard');

    Route::prefix('/treino')->name('treino.')->group(function () {
        Route::get('/', Treino::class)->name('list');

        Route::get('/rotina/{codigo}', Rotina::class)->name('rotina');
    });

    Route::get('/perfil', Perfil::class)->name('perfil');

    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';
