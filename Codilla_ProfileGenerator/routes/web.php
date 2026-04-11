<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', [ProfileController::class, 'index']);
Route::post('/add-profile', [ProfileController::class, 'store']);
Route::post('/clear-profiles',
[ProfileController::class, 'clear']);
