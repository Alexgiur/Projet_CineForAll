<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // <-- Changement ici : On utilise le modèle User unifié

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

        // <-- Changement ici : User au lieu de Login
        $user = User::where('LoginUti', request('email'))->first();

        if ($user && Hash::check(request('password'), $user->MdpUti)) {
            Auth::login($user);
            return redirect('/')->with('success', 'Connexion réussie !');
        }

        return back()->withErrors(['email' => 'Identifiants incorrects.'])->withInput();
    }

    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'login' => 'required|min:3|unique:utilisateur,LoginUti',
            'password' => 'required|min:6|confirmed',
        ]);

        // <-- Changement ici : User au lieu de Login
        $user = User::create([
            'LoginUti' => $request->login,
            'MdpUti' => Hash::make($request->password),
            'IdTypeRoleUti' => 1,
        ]);

        Auth::login($user);

        return redirect('/')->with('success', 'Compte créé avec succès !');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Déconnexion réussie !');
    }
}
