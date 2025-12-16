<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Login;

class LoginController extends Controller
{
    // Affiche le formulaire de connexion
    public function show()
    {
        return view('login');
    }

    // Traite la connexion
    public function login()
    {
        request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // Récupérer l'utilisateur par LoginUti
        $user = Login::where('LoginUti', request('email'))->first();

        // Vérifier si l'utilisateur existe et si le mot de passe est correct
        if ($user && Hash::check(request('password'), $user->MdpUti)) {
            Auth::login($user);
            return redirect('/')->with('success', 'Connexion réussie !');
        }

        return back()->withErrors(['email' => 'Identifiants incorrects.'])->withInput();
    }

    // Déconnexion
    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Déconnexion réussie !');
    }
}
