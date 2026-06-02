<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cinema;

class CinemaController extends Controller
{
    public function index() {
        $cinemas = Cinema::all();
        return view('cinema.index', compact('cinemas'));
    }

    public function create() {
        return view('cinema.create');
    }

    public function store(Request $request) {
        $request->validate([
            'NomCinema' => 'required',
            'AdresseCine' => 'required|min:5|max:255',
            'CodPostCine' => 'required|min:3|max:5',
            'VilleCine' => 'required|min:3|max:255'
        ]);

        $c = new Cinema;
        $c->NomCinema = $request->input('NomCinema');
        $c->AdresseCine = $request->input('AdresseCine');
        $c->CodPostCine = $request->input('CodPostCine');
        $c->VilleCine = $request->input('VilleCine');
        $c->save();

        return redirect(url('/cinemas'));
    }

    public function show(Cinema $cinema) {
        return view('cinema.show', compact('cinema'));
    }

    public function edit(Cinema $cinema) {
        return view('cinema.edit', compact('cinema'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'NomCinema' => 'required',
            'AdresseCine' => 'required|min:5|max:255',
            'CodPostCine' => 'required|min:3|max:5',
            'VilleCine' => 'required|min:3|max:255'
        ]);

        $c = Cinema::findOrFail($id);
        $c->NomCinema = $request->input('NomCinema');
        $c->AdresseCine = $request->input('AdresseCine');
        $c->CodPostCine = $request->input('CodPostCine');
        $c->VilleCine = $request->input('VilleCine');
        $c->save();

        return redirect(url('/cinemas'));
    }

    public function destroy($id) {
        $c = Cinema::findOrFail($id);
        $c->delete();

        return redirect(url('/cinemas'));
    }
}