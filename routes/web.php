<?php

use App\Http\Controllers\FilmController;

Route::get('/films', [FilmController::class, 'index']);
Route::get('/films/{film}', [FilmController::class, 'show']);
