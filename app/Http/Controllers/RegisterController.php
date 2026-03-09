<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Login;

class RegisterController extends Controller
{
    public function show()
    {
        return view('register');
    }

    // Traite l'inscription
    public function register(Request $request)
    {
        $request->validate([
            'login'    => 'required|min:3|unique:utilisateur,LoginUti',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = Login::create([
            'LoginUti'      => $request->login,
            'MdpUti'        => Hash::make($request->password),
            'IdTypeRoleUti' => 2, // 1 = admin, 2 = utilisateur standard
        ]);

        Auth::login($user);

        return redirect('/')->with('success', 'Compte créé avec succès !');
    }
}
