<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\PersonneController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\IsAdmin;

/* 1. Page d'accueil */

Route::get('/', function () {return view('welcome');})->name('home');

/* 2. Routes Administrateur (Uniquement rôle = 1)*/
Route::middleware(['auth', IsAdmin::class])->group(function () {
    // Génère les routes create, store, edit, update, destroy
    Route::get('films', [FilmController::class, 'index'])->name('films.index');
    Route::get('films/{id}', [FilmController::class, 'show'])->name('films.show');
    Route::get('createfilm', [FilmController::class, 'create'])->name('films.create');
    Route::post('store/film', [FilmController::class, 'store'])->name('films.store');
    Route::get('/films/{id}/edit', [FilmController::class, 'edit'])->name('films.edit');
    Route::patch('update/film', [FilmController::class, 'update'])->name('films.update');
    Route::delete('destroy/film/{id}', [FilmController::class, 'destroy'])->name('films.destroy');
//    Route::resource('personnes', PersonneController::class)->except(['index', 'show']);
});


/* 3. Routes Publiques (Lecture uniquement) */
// Tout le monde peut voir la liste (index) et les détails (show)
//Route::resource('films', [FilmController::class, 'show'])->only(['index', 'show']);
//Route::resource('personnes', PersonneController::class)->only(['index', 'show']);
Route::middleware(['auth', IsAdmin::class])->group(function (){
    Route::get('personnes', [PersonneController::class, 'index'])->name('personnes.index');
    Route::get('personnes/{id}', [PersonneController::class, 'show'])->name('personnes.show');
    Route::get('createpersonnes', [PersonneController::class, 'create'])->name('personnes.create');
    Route::post('store/personnes', [PersonneController::class, 'store'])->name('personnes.store');
    Route::get('/personnes/{id}/edit', [FilmController::class, 'edit'])->name('personnes.edit');
    Route::patch('update/film', [PersonneController::class, 'update'])->name('personnes.update');
    Route::delete('destroy/film/{id}', [PersonneController::class, ])->name('personnes.destroy');
});


/* 4. Authentification */
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::get('/register', [LoginController::class, 'showRegister'])->name('register');
Route::post('/register', [LoginController::class, 'register'])->name('register.submit');

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});


Route::middleware(['auth', IsAdmin::class])->group(function () {

    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    //Route::resource('films', FilmController::class)->except(['index', 'show']);
    Route::resource('personnes', PersonneController::class)->except(['index', 'show']);
});

