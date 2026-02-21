<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // On vérifie si l'utilisateur est connecté ET si son rôle est 1 (Admin)
        if (Auth::check() && Auth::user()->IdTypeRoleUti == 1) {
            // C'est un admin, on le laisse passer à la suite de sa requête
            return $next($request);
        }

        // Si ce n'est pas un admin, on lui refuse l'accès avec une erreur 403 (Accès interdit)
        // (Tu pourrais aussi faire un redirect('/') si tu préfères)
        abort(403, 'Accès refusé. Vous devez être administrateur pour effectuer cette action.');
    }
}
