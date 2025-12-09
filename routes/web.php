<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Ajoutez cette route pour la connexion
Route::get('/login', function () {
    return view('login');
})->name('login');

// Page d'accueil (index.html)
Route::get('/', function () {
    return view('index');
})->name('home');

// Page Films (films.html)
Route::get('/films', function () {
    return view('films');
})->name('films');

// Page de Connexion (login.html)
Route::get('/login', function () {
    return view('login');
})->name('login');

// Page d'Inscription (register.html)
Route::get('/register', function () {
    return view('register');
})->name('register');

// Page de Réservation (reservation.html)
Route::get('/reservation', function () {
    return view('reservation');
})->name('reservation');

// --- Espace Admin ---

// Dashboard Admin (admin.html)
Route::get('/admin', function () {
    return view('admin');
})->name('admin.dashboard');

// Gestion Films (admin-films.html)
Route::get('/admin/films', function () {
    return view('admin-films');
})->name('admin.films');

// Gestion Personnes (admin-personnes.html)
Route::get('/admin/personnes', function () {
    return view('admin-personnes');
})->name('admin.personnes');
