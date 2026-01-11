<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Login;

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

        $user = Login::where('LoginUti', request('email'))->first();

        if ($user && Hash::check(request('password'), $user->MdpUti)) {
            Auth::login($user);
            return redirect('/')->with('success', 'Connexion réussie !');
        }

        return back()->withErrors(['email' => 'Identifiants incorrects.'])->withInput();
    }

    // Affiche le formulaire d'inscription
    public function showRegister()
    {
        return view('register');
    }

    // Traite l'inscription
    public function register(Request $request)
    {
        $request->validate([
            'login' => 'required|min:3|unique:utilisateur,LoginUti',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = Login::create([
            'LoginUti' => $request->login,
            'MdpUti' => Hash::make($request->password),
            'IdTypeRoleUti' => 1, // /!\ Vérifiez que l'ID 1 existe dans votre table type_role_uti
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
