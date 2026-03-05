<?php

namespace App\Http\Controllers;

use App\Models\GenreFilm;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Film;
use Illuminate\Support\Facades\Storage;

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

    /**
     * Affiche les détails d'un film ainsi que ses séances (programmations)
     */
    public function show($id)
    {
        // MODIFICATION ICI : On charge le genre, mais aussi les séances et leurs salles
        // Cela permet d'afficher le bouton "Réserver" pour chaque séance existante.
        $film = Film::with(['genre_film', 'programmations.salle'])->findOrFail($id);

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
            'affiche' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'genre' => 'required|exists:genre_film,IdGenreFilm'
        ]);

        $f = new Film;
        $f->TitreFilm = $request->input('titre');
        $f->LongueurFilm = $request->input('longueur');
        $f->DateSortieFilm = $request->input('datedesortie');
        $f->ResumeFilm = $request->input('resume');
        $f->LangueFilm = $request->input('langue');
        $f->TroisDOuNon = $request->has('troisD') ? 1 : 0;
        $f->IdGenreFilm = $request->input('genre');

        if ($request->hasFile('affiche')) {
            $path = $request->file('affiche')->store('affiches', 'public');
            $f->AfficheFilm = $path;
        }

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
            'affiche' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $film = Film::findOrFail($id);
        $film->TitreFilm = $request->input('titre');
        $film->LongueurFilm = $request->input('longueur');
        $film->DateSortieFilm = $request->input('datedesortie');
        $film->ResumeFilm = $request->input('resume');
        $film->LangueFilm = $request->input('langue');
        $film->TroisDOuNon = $request->has('troisD') ? 1 : 0;
        $film->IdGenreFilm = $request->input('genre');

        if ($request->hasFile('affiche')) {
            if ($film->AfficheFilm && Storage::disk('public')->exists($film->AfficheFilm)) {
                Storage::disk('public')->delete($film->AfficheFilm);
            }

            $path = $request->file('affiche')->store('affiches', 'public');
            $film->AfficheFilm = $path;
        }

        $film->save();

        return redirect()->route('films.show', $film->IdFilm);
    }

    public function destroy($id)
    {
        $film = Film::findOrFail($id);

        if ($film->AfficheFilm && Storage::disk('public')->exists($film->AfficheFilm)) {
            Storage::disk('public')->delete($film->AfficheFilm);
        }

        $film->delete();
        return redirect()->route('films.index');
    }
}
