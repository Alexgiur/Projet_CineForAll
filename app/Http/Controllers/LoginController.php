<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Login; // <-- On remet le modèle Login de ta base de données

class LoginController extends Controller
{
    public function show()
    {
        return view('login');
    }

    public function login()
    {
        request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // On cherche l'utilisateur avec le modèle Login
        $user = Login::where('LoginUti', request('email'))->first();

        if ($user && Hash::check(request('password'), $user->MdpUti)) {
            Auth::login($user);
            return redirect('/')->with('success', 'Connexion réussie !');
        }

        return back()->withErrors(['email' => 'Identifiants incorrects.'])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Déconnexion réussie !');
    }
}
