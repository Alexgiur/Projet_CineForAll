<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'IdFilm' => 'required|exists:films,IdFilm',
            'note' => 'required|integer|min:0|max:5',
            'commentaire' => 'required|string|max:500',
        ]);

        // Vérifier si l'utilisateur a déjà noté ce film
        $dejaNote = Note::where('IdUtilisateur', Auth::id())
            ->where('IdFilm', $request->IdFilm)
            ->first();

        if ($dejaNote) {
            return back()->with('error', 'Vous avez déjà donné votre avis sur ce film.');
        }

        Note::create([
            'IdUtilisateur' => Auth::id(),
            'IdFilm' => $request->IdFilm,
            'Note' => $request->note,
            'Commentaire' => $request->commentaire,
        ]);

        return back()->with('success', 'Merci pour votre avis !');
    }
}
