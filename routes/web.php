<?php

use App\Http\Controllers\ProfileController;
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
});

use App\Http\Controllers\ActivityController;

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
    Route::post('/activities/{activity}/update', [ActivityController::class, 'update'])->name('activities.update');
    Route::get('/activities/{activity}/history', [ActivityController::class, 'history'])->name('activities.history');
    
    // Handover View
    Route::get('/handover', [ActivityController::class, 'handover'])->name('activities.handover');
    
    // Reports View <--- MAKE SURE THIS LINE IS HERE
    Route::get('/reports', [ActivityController::class, 'reports'])->name('activities.reports');

});

require __DIR__.'/auth.php';
