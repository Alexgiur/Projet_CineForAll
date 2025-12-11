<?php

namespace App\Http\Controllers;

use App\Models\Film;

class FilmController extends Controller
{
    public function index()
    {
        $films = film::all();
        return view('films.index', compact('films'));
    }
}


