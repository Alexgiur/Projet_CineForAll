<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // 1. Récupérer les films de la semaine
        $filmsSemaine = Film::with('genre_film')
            ->where('DateSortieFilm', '<=', now())
            ->orderBy('DateSortieFilm', 'desc')
            ->take(3)
            ->get();

        // 2. Récupérer les prochains films
        $filmsAvenir = Film::with('genre_film')
            ->where('DateSortieFilm', '>', now())
            ->orderBy('DateSortieFilm', 'asc')
            ->take(3)
            ->get();

        // 3. Rediriger vers la bonne vue avec les données selon l'utilisateur
        if (Auth::check()) {
            if (Auth::user()->IdTypeRoleUti == 1) {
                return view('admin.welcomeAdmin', compact('filmsSemaine', 'filmsAvenir'));
            }
            return view('utilisateur.welcomeUti', compact('filmsSemaine', 'filmsAvenir'));
        }

        // Vue par défaut (visiteur non connecté)
        return view('welcome', compact('filmsSemaine', 'filmsAvenir'));
    }
}
