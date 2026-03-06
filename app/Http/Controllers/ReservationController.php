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
        // On suppose que la relation 'reservations' est définie dans le modèle User
        $reservations = $user->reservations()
            ->orderBy('DateDeRes', 'desc')
            ->get();

        // Pour chaque réservation, on récupère les détails de la séance (Film + Salle)
        // en passant par la table pivot 'effectuer'
        foreach ($reservations as $res) {
            if (isset($res->pivot->IdProg)) {
                $res->details = Programmation::with(['film', 'salle'])
                    ->where('IdProg', $res->pivot->IdProg)
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
        // Note : On utilise l'ID de la programmation (IdProg)
        $seance = Programmation::with(['film', 'salle'])->findOrFail($id);

        return view('reservations.create', compact('seance'));
    }

    /**
     * Enregistre la réservation en base de données.
     */
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'nb_places' => 'required|integer|min:1|max:10',
            'IdProg'    => 'required|exists:programmation,IdProg',
        ]);

        // 1. Création de l'enregistrement dans la table 'reservation'
        $res = new Reservation();
        $res->NbPlacesRes = $request->nb_places;
        $res->DateDeRes   = now(); // Utilise la date et l'heure actuelle
        $res->save();

        // 2. Création du lien dans la table pivot 'effectuer'
        // Cette table fait le lien entre l'Utilisateur, la Réservation et la Séance
        DB::table('effectuer')->insert([
            'IdUtilisateur' => Auth::id(),
            'IdRes'         => $res->IdRes, // Id de la réservation fraîchement créée
            'IdProg'        => $request->IdProg,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        return redirect()->route('reservations.index')->with('success', 'Votre réservation a été validée avec succès !');
    }
}
