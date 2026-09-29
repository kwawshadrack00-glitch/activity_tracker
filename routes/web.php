<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

// Registration
Route::get('/register', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'store'])->name('register');

// Login
Route::get('/login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store'])->name('login');

// Logout
Route::post('/logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::middleware(['auth', 'verified'])->group(function () {
    
    // THIS IS THE SAFETY NET: It prevents the "Route [dashboard] not defined" error
    Route::get('/dashboard', function () {
        return redirect()->route('activities.index');
    })->name('dashboard');

    // Your actual Activity Tracker routes
    Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
    Route::post('/activities/{activity}/update', [ActivityController::class, 'update'])->name('activities.update');
    Route::get('/activities/{activity}/history', [ActivityController::class, 'history'])->name('activities.history');
    Route::get('/handover', [ActivityController::class, 'handover'])->name('activities.handover');
    Route::get('/reports', [ActivityController::class, 'reports'])->name('activities.reports');
    Route::post('/activities/store', [ActivityController::class, 'store'])->name('activities.store');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
