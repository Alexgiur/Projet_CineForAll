<?php

namespace App\Http\Controllers;

use App\Models\Programmation;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    /**
     * Affiche la liste des réservations de l'utilisateur connecté.
     */
    public function index()
    {
        $user = Auth::user();

        // Récupère les réservations de l'utilisateur via la relation définie dans le modèle User
        $reservations = $user->reservations()
            ->orderBy('DateDeRes', 'desc')
            ->get();

        // Pour chaque réservation, on récupère les détails de la séance (Film + Salle)
        // en utilisant l'IdProg directement présent dans la table réservation
        foreach ($reservations as $res) {
            if (isset($res->IdProg)) {
                $res->details = Programmation::with(['film', 'salle'])
                    ->where('IdProg', $res->IdProg)
                    ->first();
            }
        }

        return view('reservations.index', compact('reservations'));
    }

    /**
     * Affiche le formulaire de réservation pour une séance précise.
     */
    public function create($id)
    {
        // On récupère la séance avec les infos du film et de la salle
        $seance = Programmation::with(['film', 'salle'])->findOrFail($id);

        return view('reservations.create', compact('seance'));
    }

    /**
     * Enregistre la réservation en base de données.
     */
    public function store(Request $request)
    {
        // Validation des données : on vérifie uniquement que la séance existe
        $request->validate([
            'IdProg' => 'required|exists:programmation,IdProg',
        ]);

        // 1. Création de l'enregistrement dans la table 'reservation'
        $res = new Reservation();
        $res->DateDeRes = now(); // Utilise la date et l'heure actuelle
        $res->IdProg    = $request->IdProg; // On insère directement l'ID de la programmation
        $res->save();

        // 2. Création du lien dans la table pivot 'effectuer'
        // Cette table fait le lien entre l'Utilisateur et la Réservation
        DB::table('effectuer')->insert([
            'IdUtilisateur' => Auth::id(),
            'IdRes'         => $res->IdRes, // Id de la réservation fraîchement créée
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        return redirect()->route('reservations.index')->with('success', 'Votre réservation a été validée avec succès !');
    }
}
