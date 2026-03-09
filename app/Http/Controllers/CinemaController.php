<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cinema;

class CinemaController extends Controller
{
    public function index() {
        $cinema = Cinema::all();
        return view('cinema.index', compact('cinema'));
    }

    public function create() {
        return view('cinema.create');
    }

    public function store(Request $request) {
        $request->validate([
            'AdresseCine' => 'required|min:5|max:255',
            'CodPostCine' => 'required|min:3|max:5',
            'VilleCine' => 'required|min:3|max:255'
        ]);

        $c = new Cinema;
        $c->AdresseCine = $request->input('AdresseCinema');
        $c->CodPostCine = $request->input('CodPostCine');
        $c->VilleCine = $request->input('VilleCine');
        $c->save();

        return redirect()->route('cinemas.show', $c->IdCinema);
    }

    public function show(Cinema $cinema) {
        return view('cinema.show', compact('cinema'));
    }

    public function edit(Cinema $cinema) {
        return view('cinema.edit', compact('cinema'));
    }

    public function update(Request $request, $c) {
        $request->validate([
            'AdresseCine' => 'required|min:5|max:255',
            'CodPostCine' => 'required|min:3|max:5',
            'VilleCine' => 'required|min:3|max:255'
        ]);
        $c = Cinema::findOrFail($c);
        $c->AdresseCine = $request->input('AdresseCinema');
        $c->CodPostCine = $request->input('CodPostCine');
        $c->VilleCine = $request->input('VilleCine');
        $c->save();

        return redirect()->route('cinema.show', $c->IdCinema);
    }

    public function destroy($id) {
        $c = Cinema::findOrFail($id);
        $c->delete();
        return redirect()->route('cinema.index');
    }

}
