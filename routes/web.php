 <?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SeanceController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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
});

require __DIR__.'/auth.php';
