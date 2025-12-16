<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\LoginController;

Route::resource('films', FilmController::class);

/*
Route::resource('login', LoginController::class);
*/
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


/*
Route::get('/films', [FilmController::class, 'index']);
Route::get('/films/create', [FilmController::class, 'create']);
Route::post('/films', [FilmController::class, 'store']);
Route::get('/films/{id}/edit', [FilmController::class, 'edit']);
Route::patch('/films/{id}', [FilmController::class, 'update']);
Route::get('/films/{id}', [FilmController::class, 'show']);
*/




// Cette route gère la page d'accueil
Route::get('/', function () {
    return view('welcome');
});

// Vos autres routes existantes...
// Route::resource('films', App\Http\Controllers\FilmController::class);
