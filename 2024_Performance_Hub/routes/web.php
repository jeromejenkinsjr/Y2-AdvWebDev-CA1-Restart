<?php

use App\Http\Controllers\PerformanceController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;
use App\Models\UserView;
use App\Models\Performance;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAdmin;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\MusicianController;
use App\Http\Controllers\TagController;


Route::get('/', function () {
    return view('welcome');
});

// Pass the suggested performances data to the dashboard view.

Route::get('/dashboard', function () {
    $user = auth()->user();
    $suggestedPerformances = $user ? $user->getSuggestedPerformances() : collect(); // If no user, return empty collection

    return view('dashboard', compact('suggestedPerformances'));
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

Route::resource('reviews', ReviewController::class);

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
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// The 2 routes below are for displaying the edit form for a performance. {performance} is a route parameter representing the ID of the performance to be edited. The 'edit' method in PerformanceController is responsible for fetching the specific performance and returning the edit form view.


Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
});

Route::resource('musicians', MusicianController::class);

Route::get('/tags/{tag}', [TagController::class, 'show'])->name('tags.show');


Route::fallback(function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect('/');
});

require __DIR__.'/auth.php';
