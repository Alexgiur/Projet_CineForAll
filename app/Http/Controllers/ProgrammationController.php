<?php

namespace App\Http\Controllers;

use App\Models\Programmation;
use App\Models\Film;
use App\Models\Salle;
use Illuminate\Http\Request;

class ProgrammationController extends Controller
{
    public function index()
    {
        $programmations = Programmation::with(['film', 'salle'])
            ->orderBy('DateProg', 'asc')
            ->get();

        $films = Film::all();
        $salles = Salle::all();

        return view('admin.programmations', compact('programmations', 'films', 'salles'));
    }

    public function store(Request $request)
    {
        // Validation : on vérifie l'existence dans la colonne NumSalle
        $request->validate([
            'IdFilm' => 'required|exists:films,IdFilm',
            'IdSalle' => 'required|exists:salle,NumSalle',
            'DateProg' => 'required|date',
            'HeureProg' => 'required',
        ]);

        // Insertion : on écrit dans la colonne NumSalle
        Programmation::create([
            'IdFilm'    => $request->IdFilm,
            'NumSalle'  => $request->IdSalle, // On mappe la valeur du formulaire vers NumSalle
            'DateProg'  => $request->DateProg,
            'HeureProg' => $request->HeureProg,
        ]);

        return redirect()->back()->with('success', 'La séance a été ajoutée avec succès !');
    }

    public function destroy($id)
    {
        $prog = Programmation::findOrFail($id);
        $prog->delete();

        return redirect()->back()->with('success', 'La séance a été supprimée.');
    }
}
