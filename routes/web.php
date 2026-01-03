 <?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SeanceController;

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
    Route::get('/seances/{seance}/edit', [SeanceController::class, 'edit'])->name('seances.edit');
    Route::get('/seances/{seance}', [SeanceController::class, 'show'])->name('seances.show');

    Route::post('/seances', [SeanceController::class, 'store'])->name('seances.store');

    Route::patch('/seances/{seance}', [SeanceController::class, 'update'])->name('seances.update');
    Route::delete('/seances/{seance}', [SeanceController::class, 'destroy'])->name('seances.destroy');

    Route::get('/historique', [SeanceController::class, 'historique'])->name('seances.historique');
});

require __DIR__.'/auth.php';
