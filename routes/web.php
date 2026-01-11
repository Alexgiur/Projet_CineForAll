<?php

use App\Http\Controllers\PersonneController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\LoginController;

Route::resource('films', FilmController::class);

/*
Route::get('/films', [FilmController::class, 'index']);
Route::get('/films/create', [FilmController::class, 'create']);
Route::post('/films', [FilmController::class, 'store']);
Route::get('/films/{id}/edit', [FilmController::class, 'edit']);
Route::patch('/films/{id}', [FilmController::class, 'update']);
Route::get('/films/{id}', [FilmController::class, 'show']);
*/

Route::resource('personnes', PersonneController::class);
/*
Route::get('/personnes', [PersonneController::class, 'index']);
Route::get('/personnes/create', [PersonneController::class, 'create']);
Route::post('/personnes', [PersonneController::class, 'store']);
Route::get('/personnes/{personne}', [PersonneController::class, 'show']);
*/



/*
Route::resource('login', LoginController::class);
*/
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Cette route gère la page d'accueil
Route::get('/', function () {
    return view('welcome');
});

// Vos autres routes existantes...
// Route::resource('films', App\Http\Controllers\FilmController::class);


// ... autres routes ...

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Nouvelles routes d'inscription
Route::get('/register', [LoginController::class, 'showRegister'])->name('register');
Route::post('/register', [LoginController::class, 'register'])->name('register.submit');

Route::get('/', function () {
    return view('welcome');
});
