<?php

use App\Http\Controllers\ProjectController;


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[ProjectController::class, 'index']
)->name('dashboard');

Route::get('/details',[ProjectController::class, 'show']
)->name('details');

Route::get('/edit',[ProjectController::class, 'edit']
)->name('edit');

Route::resource('projects', ProjectController::class)->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
