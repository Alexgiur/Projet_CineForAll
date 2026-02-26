<?php

namespace App\Http\Controllers;
use App\Models\GenreFilm;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::all();
        return view('films.index', compact('films'));
    }

    public function create()
    {
        $genres = GenreFilm::all();
        return view('films.create', compact('genres'));
    }

    public function show($id)
    {
        $film = Film::with('genre_film')->findOrFail($id);
        return view('films.show', compact('film'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|min:3|max:50',
            'longueur' => 'required|integer|min:30',
            'datedesortie' => 'required|date',
            'resume' => 'required|min:5|max:250',
            'langue' => 'required|max:20',
            'troisD' => 'nullable',
            'affiche' => 'nullable',
            'genre' => 'required|exists:genre_film,IdGenreFilm'
        ]);

        $f = new Film;
        $f->TitreFilm = $request->input('titre');
        $f->LongueurFilm = $request->input('longueur');
        $f->DateSortieFilm = $request->input('datedesortie');
        $f->ResumeFilm = $request->input('resume');
        $f->LangueFilm = $request->input('langue');
        $f->TroisDOuNon = $request->has('troisD') ? 1 : 0;
        $f->AfficheFilm = $request->input('affiche');
        $f->IdGenreFilm = $request->input('genre');
        $f->save();

        return redirect()->route('films.show', $f->IdFilm);
    }

    public function edit($id)
    {
        $genres = GenreFilm::all();
        $film = Film::findOrFail($id);
        return view('films.edit', compact('film', 'genres'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required|min:3|max:50',
            'longueur' => 'required|integer|min:30',
            'datedesortie' => 'required|date',
            'resume' => 'required|min:5|max:250',
            'langue' => 'required|max:20',
            'genre' => 'required|exists:genre_film,IdGenreFilm',
        ]);

        $film = Film::findOrFail($id);
        $film->TitreFilm = $request->input('titre');
        $film->LongueurFilm = $request->input('longueur');
        $film->DateSortieFilm = $request->input('datedesortie');
        $film->ResumeFilm = $request->input('resume');
        $film->LangueFilm = $request->input('langue');
        $film->TroisDOuNon = $request->has('troisD') ? 1 : 0;
        $film->AfficheFilm = $request->input('affiche');
        $film->IdGenreFilm = $request->input('genre');
        $film->save();

        return redirect()->route('films.show', $film->IdFilm);
    }

    public function destroy($id)
    {
        Film::findOrFail($id)->delete();
        return redirect()->route('films.index');
    }
}
