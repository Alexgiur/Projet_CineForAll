<?php

namespace App\Http\Controllers;

use App\Models\Personne;
use Illuminate\Http\Request;

class PersonneController extends Controller {

    public function index(Request $request) {
        // 1. Paramètres de recherche et de pagination
        $search = $request->input('search');
        $perPage = 10; // Nombre d'éléments par page
        $currentPage = (int) $request->input('page', 1);
        if ($currentPage < 1) $currentPage = 1;

        // 2. Construction de la requête avec filtre de recherche
        $query = Personne::query();
        if ($search) {
            $query->where('Nomper', 'LIKE', "%{$search}%")
                ->orWhere('PrePer', 'LIKE', "%{$search}%");
        }

        // 3. Calcul manuel pour la pagination
        $totalResults = $query->count();
        $totalPages = ceil($totalResults / $perPage);
        $offset = ($currentPage - 1) * $perPage;

        // 4. Récupération des données avec skip et take (méthode alternative à paginate)
        $personnes = $query->with('roles')->skip($offset)->take($perPage)->get();

        return view('personnes.index', compact('personnes', 'search', 'currentPage', 'totalPages'));
    }

    public function create() {
        $roles = \App\Models\RolePersonne::all();
        return view('personnes.create', compact('roles'));
    }

    public function show(Personne $personne) {
        $personne->load('roles');
        return view('personnes.show', compact('personne'));
    }

    public function store() {
        request()->validate([
            'nom'             => 'required|min:3|max:50',
            'prenom'          => 'required|min:2|max:50',
            'datedenaissance' => 'required|date',
            'nationalite'     => 'required|min:5|max:50',
            'biographie'      => 'required|min:5|max:250',
            'roles'           => 'required|array', // Ajout d'une vérification que c'est bien un tableau
            'roles.*'         => 'required|exists:role_personne,IdRoleper', // Correction : 'roles.*' au lieu de 'role.*'
        ]);

        $p = new \App\Models\Personne;
        $p->Nomper           = request('nom');
        $p->PrePer           = request('prenom');
        $p->DateNaissancePer = request('datedenaissance');
        $p->NationalitePer   = request('nationalite');
        $p->BiographiePer    = request('biographie');
        $p->save();

        // Insertion dans Travailler
        if (request()->has('roles')) {
            foreach (request('roles') as $roleId) {
                \DB::table('Travailler')->insert([
                    'IdPer'      => $p->Idper,
                    'IdRolePer'  => $roleId,
                    'IdFilm'     => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        return redirect('/personnes/' . $p->Idper);
    }

    public function edit(Personne $personne) {
        $roles = \App\Models\RolePersonne::all();
        $personne->load('roles');
        return view('personnes.edit', compact('personne', 'roles'));
    }

    public function update(Personne $personne) {

        request()->validate([
            'nom'             => 'required|min:3|max:50',
            'prenom'          => 'required|min:2|max:50',
            'datedenaissance' => 'required|date',
            'nationalite'     => 'required|min:5|max:50',
            'biographie'      => 'required|min:5|max:250',
            'roles'           => 'required|array',
            'roles.*'         => 'required|exists:role_personne,IdRolePer', // Correction ici aussi
        ]);

        $personne->Nomper           = request('nom');
        $personne->PrePer           = request('prenom');
        $personne->DateNaissancePer = request('datedenaissance');
        $personne->NationalitePer   = request('nationalite');
        $personne->BiographiePer    = request('biographie');
        $personne->save();

        // supprime les rôles de base (non liés à des films)
        \DB::table('Travailler')
            ->where('IdPer', $personne->Idper)
            ->whereNull('IdFilm')
            ->delete();

        // insère les nouveaux rôles cochés
        if (request()->has('roles')) {
            foreach (request('roles') as $roleId) {
                // Vérifie que ce rôle n'existe pas déjà (via un film)
                $dejaPresent = \DB::table('Travailler')
                    ->where('IdPer', $personne->Idper)
                    ->where('IdRolePer', $roleId)
                    ->exists();

                if (!$dejaPresent) {
                    \DB::table('travailler')->insert([
                        'IdPer'      => $personne->Idper,
                        'IdRolePer'  => $roleId,
                        'IdFilm'     => null,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }

        return redirect('/personnes/' . $personne->Idper);
    }

    public function destroy(Personne $personne) {
        $personne->delete();
        return redirect('/personnes');
    }
}
