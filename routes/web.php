<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});

// Ajoutez cette route pour la connexion
Route::get('/login', function () {
    return view('login');
})->name('login');
