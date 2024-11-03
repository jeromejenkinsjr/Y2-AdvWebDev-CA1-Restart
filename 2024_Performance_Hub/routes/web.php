<?php

use App\Http\Controllers\PerformanceController;
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


Route::get('/performances', [PerformanceController::class, 'index'])->name('performances.index');
Route::get('/performances/create', [PerformanceController::class, 'create'])->name('performances.create');
Route::get('/performances/{performance}', [PerformanceController::class, 'show'])->name('performances.show');
Route::post('/performances', [PerformanceController::class, 'store'])->name('performances.store');

// The routes below are for displaying the edit form for a performance. {performance} is a route parameter representing the ID of the performance to be edited. The 'edit' method in PerformanceController is responsible for fetching the specific performance and returning the edit form view.

Route::get('/performances/{performance}/edit', [PerformanceController::class, 'edit'])->name('performances.edit');
Route::put('/performances/{performance}', [PerformanceController::class, 'update'])->name('performances.update');
require __DIR__.'/auth.php';
