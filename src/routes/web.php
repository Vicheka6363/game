<?php

use Illuminate\Support\Facades\Route;
use YourName\RPS\Http\Controllers\RPSController;

Route::get('rps', [RPSController::class, 'index'])->name('rps.index');
Route::post('rps/play', [RPSController::class, 'play'])->name('rps.play');
