<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;

Route::resource('films', FilmController::class);


/*
Route::get('/films', [FilmController::class, 'index']);
Route::get('/films/create', [FilmController::class, 'create']);
Route::post('/films', [FilmController::class, 'store']);
Route::get('/films/{id}/edit', [FilmController::class, 'edit']);
Route::patch('/films/{id}', [FilmController::class, 'update']);
Route::get('/films/{id}', [FilmController::class, 'show']);
*/

