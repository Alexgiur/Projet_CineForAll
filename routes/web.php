<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PersonneController;
use App\Http\Controllers\GenreFilmController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProgrammationController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\IsAdmin;

Route::get('/', [HomeController::class, 'index'])->name('home');

/* Routes Films */
Route::get('films', [FilmController::class, 'index'])->name('films.index');
Route::get('films/create', [FilmController::class, 'create'])->name('films.create');
Route::post('films', [FilmController::class, 'store'])->name('films.store');
Route::get('films/{id}', [FilmController::class, 'show'])->name('films.show');
Route::get('films/{id}/edit', [FilmController::class, 'edit'])->name('films.edit');
Route::put('films/{id}', [FilmController::class, 'update'])->name('films.update');
Route::delete('films/{id}', [FilmController::class, 'destroy'])->name('films.destroy');

/* Routes Personnes */
Route::resource('personnes', PersonneController::class);

/* Routes Genre film */
Route::resource('genre_film', GenreFilmController::class);

//Route cinema
Route::resource('cinemas', CinemaController::class);

/* Authentification */
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

/* Espace Utilisateur Connecté (Réservations) */
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // NOUVEAU : Routes pour les réservations
    Route::get('/mes-reservations', [ReservationController::class, 'index'])->name('reservations.index');
    Route::get('/reserver/{id}', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/reserver', [ReservationController::class, 'store'])->name('reservations.store');

    // Ajout des routes pour modifier et annuler une réservation
    Route::get('/mes-reservations/{id}/edit', [ReservationController::class, 'edit'])->name('reservations.edit');
    Route::put('/mes-reservations/{id}', [ReservationController::class, 'update'])->name('reservations.update');
    Route::delete('/mes-reservations/{id}', [ReservationController::class, 'destroy'])->name('reservations.destroy');
});

/* Administration */
Route::middleware(['auth', IsAdmin::class])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // CORRECTION ICI : Ajout de ".index" au nom de la route
    Route::get('/admin/programmations', [ProgrammationController::class, 'index'])->name('admin.programmations.index');
    Route::post('/admin/programmations', [ProgrammationController::class, 'store'])->name('admin.programmations.store');
    Route::delete('/admin/programmations/{id}', [ProgrammationController::class, 'destroy'])->name('admin.programmations.destroy');
});

Route::get('/termes', function () {
    return view('termes');
})->name('termes');
