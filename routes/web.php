<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JetController;
use App\Http\Controllers\ReviewController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('jets', JetController::class);
Route::get('jets/{jet}/reviews', [ReviewController::class, 'index']);  
Route::post('jets/{jet}/reviews', [ReviewController::class, 'store'])->name('jets.reviews.store');