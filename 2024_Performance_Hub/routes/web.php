<?php

use App\Http\Controllers\PerformanceController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAdmin;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin-protected routes
Route::middleware('admin')->group(function () {
    Route::get('/performances/create', [PerformanceController::class, 'create'])->name('performances.create');
    Route::post('/performances', [PerformanceController::class, 'store'])->name('performances.store');
    Route::get('/performances/{performance}/edit', [PerformanceController::class, 'edit'])->name('performances.edit');
    Route::put('/performances/{performance}', [PerformanceController::class, 'update'])->name('performances.update');
    Route::delete('/performances/{performance}', [PerformanceController::class, 'destroy'])->name('performances.destroy');
});


// Public routes for all users
Route::get('/performances/{performance}', [PerformanceController::class, 'show'])->name('performances.show');
Route::get('/performances', [PerformanceController::class, 'index'])->name('performances.index');

// Route for authenticated users to create reviews
Route::middleware('auth')->group(function () {
    // Add a new review for a performance
    Route::post('/performances/{performance}/reviews', [ReviewController::class, 'store'])->name('reviews.store');

    // Delete a review
    Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
});

// Routes for viewing performance details
Route::get('/performances/{performance}', [PerformanceController::class, 'show'])->name('performances.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// The 2 routes below are for displaying the edit form for a performance. {performance} is a route parameter representing the ID of the performance to be edited. The 'edit' method in PerformanceController is responsible for fetching the specific performance and returning the edit form view.


require __DIR__.'/auth.php';
