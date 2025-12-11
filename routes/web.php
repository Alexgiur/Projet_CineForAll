<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Page d'accueil
Route::get('/', function () {
    return view('index'); // Affiche resources/views/index.blade.php
})->name('home');

// Page Films
Route::get('/films', function () {
    return view('films'); // Affiche resources/views/films.blade.php
})->name('films');

// Page Connexion
Route::get('/login', function () {
    return view('login'); // Affiche resources/views/login.blade.php
})->name('login');

// Page Inscription (Celle qui vous manque)
Route::get('/register', function () {
    return view('register'); // Affiche resources/views/register.blade.php
})->name('register');

// Page Réservation
Route::get('/reservation', function () {
    return view('reservation'); // Affiche resources/views/reservation.blade.php
})->name('reservation');

// --- Section Admin ---

// Dashboard Admin (Celle qui vous manque)
Route::get('/admin', function () {
    return view('admin'); // Affiche resources/views/admin.blade.php
})->name('admin.dashboard');

// Gestion Films
Route::get('/admin/films', function () {
    return view('admin-films'); // Affiche resources/views/admin-films.blade.php
})->name('admin.films');

// Gestion Personnes
Route::get('/admin/personnes', function () {
    return view('admin-personnes'); // Affiche resources/views/admin-personnes.blade.php
})->name('admin.personnes');


// Page pour afficher le formulaire d'ajout
Route::get('/admin/films/add', function () {
    return view('admin-add-film');
})->name('admin.films.add');

// Route pour traiter le formulaire (Simulation pour l'instant)
Route::post('/admin/films/store', function () {
    // Ici, on enregistrerait normalement les données dans la base de données
    // Pour l'instant, on redirige vers la liste des films
    return redirect()->route('admin.films');
})->name('admin.films.store');

Route::get('/films', [FilmController::class, 'index']);
Route::get('/films/{film}', [FilmController::class, 'show']);
