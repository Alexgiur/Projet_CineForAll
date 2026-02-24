<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\PersonneController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\IsAdmin;

/* 1. Page d'accueil */
Route::get('/', function () {
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->IdTypeRoleUti == 1) {
            return view('admin.welcomeAdmin');
        } else {
            return view('utilisateur.welcomeUti');
        }
    }
    return view('welcome');
})->name('home');


/* 2. Routes Administrateur (Uniquement rôle = 1)*/
Route::middleware(['auth', IsAdmin::class])->group(function () {
    // Génère les routes create, store, edit, update, destroy
    Route::resource('films', FilmController::class)->except(['index', 'show']);
    Route::resource('personnes', PersonneController::class)->except(['index', 'show']);
});


/* 3. Routes Publiques (Lecture uniquement) */
// Tout le monde peut voir la liste (index) et les détails (show)
Route::resource('films', FilmController::class)->only(['index', 'show']);
Route::resource('personnes', PersonneController::class)->only(['index', 'show']);


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

    Route::resource('films', FilmController::class)->except(['index', 'show']);
    Route::resource('personnes', PersonneController::class)->except(['index', 'show']);
});
