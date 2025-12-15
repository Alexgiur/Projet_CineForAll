<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller
{
    public function index(){
        $films = film::all();
        return view('films.index', compact('films'));
    }
    public function create(){
        return view('films.create');
    }

    public function show(Film $film){
        return view('films.show', compact('film'));
    }

    public function store(){
        $validated = request()->validate([
            'titre' => 'required|min:5|max:50',
            'longueur' => 'required|integer|min:30',
            'datedesortie' => 'required|date',
            'resume' => 'required|min:5|max:250',
            'langue' => 'required',
            'troisD' => 'nullable|boolean',
            'affiche' => 'nullable',
            'genre' => 'required|integer|exists:genre_film,IdGenreFilm'
        ]);

        // Debug: Afficher toutes les données reçues
        /*
        dd([
            'request_all' => request()->all(),
            'validated' => $validated,
            'troisD_value' => request('troisD'),
        ]);*/

        $f = new Film;
        $f->TitreFilm = request('titre');
        $f->LongueurFilm = request('longueur');
        $f->DateSortieFilm = request('datedesortie');
        $f->ResumeFilm = request('resume');
        $f->LangueFilm = request('langue');
        $f->TroisDOuNon = request('troisD', 0);
        $f->AfficheFilm = request('affiche');
        $f->IdGenreFilm = request('genre');
        $f->save();
        return redirect('/films/'.$f->IdFilm);
    }

    public function edit(Film $film){
        return view('films.edit', compact('film'));
    }

    public function update(Film $film){
        request()->validate([
            'titre' => 'required|min:5|max:50',
            'longueur' => 'required|integer|min:30',
            'datedesortie' => 'required|date',
            'resume' => 'required|min:5|max:250',
            'langue' => 'required',
            'troisD' => 'nullable|boolean',
            'affiche' => 'nullable',
            'genre' => 'required|integer|exists:genre_film,IdGenreFilm',
        ]);

        $film->TitreFilm = request('titre');
        $film->LongueurFilm = request('longueur');
        $film->DateSortieFilm = request('datedesortie');
        $film->ResumeFilm = request('resume');
        $film->LangueFilm = request('langue');
        $film->TroisDOuNon = request('troisD', 0);
        $film->AfficheFilm = request('affiche');
        $film->IdGenreFilm = request('genre');
        $film->save();
        return redirect('/films/'. $film->IdFilm);
    }

    public function destroy(Film $film){
        $film->delete();
        return redirect('/films');
    }

}
