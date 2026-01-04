<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SeanceController;
use App\Http\Controllers\ExerciceController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

 Route::get('/', function () {
     return Auth::check()
         ? redirect()->route('seances.index')
         : view('guest-home');
 });


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/seances', [SeanceController::class, 'index'])->name('seances.index');
    Route::get('/seances/create', [SeanceController::class, 'create'])->name('seances.create');
    Route::post('/seances', [SeanceController::class, 'store'])->name('seances.store');
    Route::get('/seances/{seance}/edit', [SeanceController::class, 'edit'])->name('seances.edit');
    Route::patch('/seances/{seance}', [SeanceController::class, 'update'])->name('seances.update');
    Route::delete('/seances/{seance}', [SeanceController::class, 'destroy'])->name('seances.destroy');
    Route::get('/seances/{seance}', [SeanceController::class, 'show'])->name('seances.show');

    Route::get('/exercices', [ExerciceController::class, 'index'])->name('exercices.index');
    Route::get('/exercices/create', [ExerciceController::class, 'create'])->name('exercices.create');
    Route::post('/exercices', [ExerciceController::class, 'store'])->name('exercices.store');
    Route::get('/exercices/{exercice}/edit', [ExerciceController::class, 'edit'])->name('exercices.edit');
    Route::patch('/exercices/{exercice}', [ExerciceController::class, 'update'])->name('exercices.update');
    Route::delete('/exercices/{exercice}', [ExerciceController::class, 'destroy'])->name('exercices.destroy');

    Route::get('/historique', [SeanceController::class, 'historique'])->name('seances.historique');
    });

require __DIR__.'/auth.php';
