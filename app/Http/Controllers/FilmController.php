<?php

namespace App\Http\Controllers;
use App\Models\GenreFilm;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller
{
    public function index(){
        $films = film::all();
        return view('films.index', compact('films'));
    }
    public function create(){
        $genres = DB::table('genre_film')->get();
            return view('films.create', compact('genres'));
    }

    public function show(int $film){
        $film = Film::where('IdFilm', $film)->first();
            return view('films.show', ['film' => $film]);
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

    public function edit(int $film_id){
        $genres = GenreFilm::get();
        $film = Film::with('genre_film')->where('IdFilm', $film_id)->first();
            //return view('films.create', ['genres' =>'genres']);
        return view('films.edit', ['film'=> $film,'genres' => $genres]);
    }

    public function update(Request $request){
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
        $idfilm = $request->input("id");
        $film = Film::where('IdFilm', $idfilm)->first();
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

    public function destroy(Request $request){
        $id = $request->input("id");
        $film = Film::where('IdFilm', $id)->first();
        $film->delete();
        return to_route('films.index');
    }

}
