<?php

namespace App\Http\Controllers;

use App\Models\Personne;
use Illuminate\Http\Request;

class PersonneController extends Controller{
    public function index(){
        $personnes = Personne::all();
        return view('personnes.index', compact('personnes'));
    }

    public function create(){
        return view('personnes.create');
    }

    public function show(personne $personne){
        return view('personnes.show', compact('personne'));
    }

    public function store(){
        request()->validate([
            'nom' => 'required|min:3|max:50',
            'prenom' => 'required|min:2|max:50',
            'datedenaissance' => 'required|date',
            'nationalite' => 'required|min:5|max:50',
            'biographie' => 'required|min:5|max:250',
            ]);

        $p = new Personne;
        $p->Nomper = request('nom');
        $p->PrePer = request('prenom');
        $p->DateNaissancePer = request('datedenaissance');
        $p->NationalitePer = request('nationalite');
        $p->BiographiePer = request('biographie');
        $p->save();
        return redirect('/personnes/'.$p->Idper);
    }

    public function edit(personne $personne){
        return view('personnes.edit', compact('personne'));
    }

    public function update(personne $personne){
        request()->validate([
            'nom' => 'required|min:3|max:50',
            'prenom' => 'required|min:2|max:50',
            'datedenaissance' => 'required|date',
            'nationalite' => 'required|min:5|max:50',
            'biographie' => 'required|min:5|max:250',
        ]);

        $personne->Nomper = request('nom');
        $personne->PrePer = request('prenom');
        $personne->DateNaissancePer = request('datedenaissance');
        $personne->NationalitePer = request('nationalite');
        $personne->BiographiePer = request('biographie');
        $personne->save();
        return redirect('/personnes/'.$personne->Idper);
    }

    public function destroy(Personne $personne){
        $personne->delete();
        return redirect('/personnes');
    }

}
