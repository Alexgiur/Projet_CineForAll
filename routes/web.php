<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PersonneController;
use App\Http\Controllers\GenreFilmController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\IsAdmin;

/* 1. Page d'accueil */
Route::get('/', [HomeController::class, 'index'])->name('home');


/* 2. Routes Films */
Route::get('films', [FilmController::class, 'index'])->name('films.index');
Route::get('films/create', [FilmController::class, 'create'])->name('films.create');
Route::post('films', [FilmController::class, 'store'])->name('films.store');
Route::get('films/{id}', [FilmController::class, 'show'])->name('films.show');
Route::get('films/{id}/edit', [FilmController::class, 'edit'])->name('films.edit');
Route::put('films/{id}', [FilmController::class, 'update'])->name('films.update');
Route::delete('films/{id}', [FilmController::class, 'destroy'])->name('films.destroy');

/* 3. Routes Personnes */
Route::get('personnes', [PersonneController::class, 'index'])->name('personnes.index');
Route::get('personnes/create', [PersonneController::class, 'create'])->name('personnes.create');
Route::post('personnes', [PersonneController::class, 'store'])->name('personnes.store');
Route::get('personnes/{personne}', [PersonneController::class, 'show'])->name('personnes.show');
Route::get('personnes/{personne}/edit', [PersonneController::class, 'edit'])->name('personnes.edit');
Route::put('personnes/{personne}', [PersonneController::class, 'update'])->name('personnes.update');
Route::delete('personnes/{personne}', [PersonneController::class, 'destroy'])->name('personnes.destroy');

/* 4. Routes Genre film */
Route::resource('genre_film', GenreFilmController::class);

/* 4. Authentification */
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::get('/register', [LoginController::class, 'showRegister'])->name('register');
Route::post('/register', [LoginController::class, 'register'])->name('register.submit');

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

/* 5. Administration */
Route::middleware(['auth', IsAdmin::class])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

Route::get('/termes', function () {
    return view('termes');
})->name('termes');
