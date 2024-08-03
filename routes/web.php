<?php

use App\Http\Controllers\ScoutController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BadgeController;
use App\Http\Controllers\MeetingController;

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

    Route::get('/scouts/create', [ScoutController::class, 'create'])->name('scouts.create');
    Route::post('/scouts', [ScoutController::class, 'store'])->name('scouts.store');
    Route::get('/scouts', [ScoutController::class, 'index'])->name('scouts.index');
    Route::get('/scouts/{id}', [ScoutController::class, 'manage'])->name('scouts.manage');

    Route::get('/badges/create', [BadgeController::class, 'create'])->name('badges.create');
    Route::post('/badges', [BadgeController::class, 'store'])->name('badges.store');
    Route::get('/badges', [BadgeController::class, 'index'])->name('badges.index');
    Route::get('/badges/{id}', [BadgeController::class, 'manage'])->name('badges.manage');


    Route::get('/meetings', [MeetingController::class, 'index'])->name('meetings.index');
    Route::get('/meetings/create', [MeetingController::class, 'create'])->name('meetings.create');
    Route::post('/meetings', [MeetingController::class, 'store'])->name('meetings.store');
});

require __DIR__.'/auth.php';
