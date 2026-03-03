<?php

namespace App\Http\Controllers;

use App\Models\GenreFilm;
use Illuminate\Http\Request;

class GenreFilmController extends Controller
{
    /**
     * Affiche la liste des genres de film.
     */
    public function index()
    {
        $genres = GenreFilm::all();
        return view('genre_film.index', compact('genres'));
    }

    /**
     * Affiche le formulaire de création d'un genre de film.
     */
    public function create()
    {
        return view('genre_film.create');
    }

    /**
     * Enregistre un nouveau genre de film.
     */
    public function store(Request $request)
    {
        $request->validate([
            'LibGenreFilm' => 'required|string|max:255|unique:genre_film,LibGenreFilm',
        ]);

        GenreFilm::create($request->only('LibGenreFilm'));

        return redirect()->route('genre_film.index')
            ->with('success', 'Genre de film créé avec succès.');
    }

    /**
     * Affiche un genre de film spécifique.
     */
    public function show(GenreFilm $genre_film)
    {
        return view('genre_film.show', compact('genre_film'));
    }

    /**
     * Affiche le formulaire d'édition d'un genre de film.
     */
    public function edit(GenreFilm $genre_film)
    {
        return view('genre_film.edit', compact('genre_film'));
    }

    /**
     * Met à jour un genre de film existant.
     */
    public function update(Request $request, GenreFilm $genre_film)
    {
        $request->validate([
            'LibGenreFilm' => 'required|string|max:255|unique:genre_film,LibGenreFilm,' . $genre_film->IdGenreFilm . ',IdGenreFilm',
        ]);

        $genre_film->update($request->only('LibGenreFilm'));

        return redirect()->route('genre_film.index')
            ->with('success', 'Genre de film mis à jour avec succès.');
    }

    /**
     * Supprime un genre de film.
     */
    public function destroy(GenreFilm $genre_film)
    {
        $genre_film->delete();

        return redirect()->route('genre_film.index')
            ->with('success', 'Genre de film supprimé avec succès.');
    }
}
