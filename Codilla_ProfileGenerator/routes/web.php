<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', [ProfileController::class, 'index'])->name('profiles.index');
Route::post('/add-profile', [ProfileController::class, 'store'])->name('profiles.store');
Route::post('/clear-profiles', [ProfileController::class, 'clear'])->name('profiles.clear');