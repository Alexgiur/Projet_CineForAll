<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;

 Route::resource('films', FilmController::class);

/*
Route::get('/films', [FilmController::class, 'index']);
Route::get('/films/create', [FilmController::class, 'create']);
Route::get('/films/{film}', [FilmController::class, 'show']);
Route::post('/films', [FilmController::class, 'store']);
*/

