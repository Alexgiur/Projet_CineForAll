<?php

namespace App\Http\Controllers;

use App\Models\Actionnaire;
use App\Models\Cinema;
use Illuminate\Http\Request;

class ActionnaireController extends Controller
{

    public function create()
    {
        $cinemas = Cinema::all();
        return view('actionnaires.create', compact('cinemas'));
    }

    // 2. Enregistrer l'actionnaire en base
    public function store(Request $request)
    {
        $request->validate([
            'NomActionnaire' => 'required|string|max:255',
            'PrenomActionnaire' => 'required|string|max:255',
            'cinemas' => 'nullable|array',
        ]);

        $actionnaire = new Actionnaire();
        $actionnaire->NomActionnaire = $request->NomActionnaire;
        $actionnaire->PrenomActionnaire = $request->PrenomActionnaire;
        $actionnaire->save();


        if ($request->has('cinemas')) {
            $actionnaire->cinemas()->attach($request->cinemas);
        }


        return redirect()->route('cinema.index')->with('success', 'Actionnaire créé');
    }
}
