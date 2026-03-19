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
        foreach ($reservations as $res) {
            if (isset($res->IdProg)) {
                $res->details = Programmation::with(['film', 'salle.cinema'])
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
        $seance = Programmation::with(['film', 'salle.cinema'])->findOrFail($id);
        return view('reservations.create', compact('seance'));
    }

    /**
     * Enregistre la réservation en base de données.
     */
    public function store(Request $request)
    {
        $request->validate([
            'IdProg' => 'required|exists:programmation,IdProg',
        ]);

        $res = new Reservation();
        $res->DateDeRes = now();
        $res->IdProg    = $request->IdProg;
        $res->save();

        DB::table('effectuer')->insert([
            'IdUtilisateur' => Auth::id(),
            'IdRes'         => $res->IdRes,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        return redirect()->route('reservations.index')->with('success', 'Votre réservation a été validée avec succès !');
    }

    /**
     * Affiche le formulaire pour modifier la réservation.
     */
    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);

        // Vérification de sécurité : la réservation appartient-elle à l'utilisateur ?
        $isOwner = DB::table('effectuer')
            ->where('IdRes', $id)
            ->where('IdUtilisateur', Auth::id())
            ->exists();

        if (!$isOwner) abort(403, 'Accès non autorisé.');

        $seanceActuelle = Programmation::with('film')->findOrFail($reservation->IdProg);

        // VÉRIFICATION : La séance est-elle passée ?
        $dateHeureSeance = \Carbon\Carbon::parse($seanceActuelle->DateProg . ' ' . $seanceActuelle->HeureProg);
        if ($dateHeureSeance->isPast()) {
            return redirect()->route('reservations.index')->with('error', 'Vous ne pouvez pas modifier une réservation dont la séance est déjà passée.');
        }

        // Récupérer toutes les séances futures pour ce même film
        $autresSeances = Programmation::with(['salle.cinema'])
            ->where('IdFilm', $seanceActuelle->IdFilm)
            ->where('DateProg', '>=', now()->toDateString())
            ->orderBy('DateProg')
            ->orderBy('HeureProg')
            ->get();

        return view('reservations.edit', compact('reservation', 'seanceActuelle', 'autresSeances'));
    }

    /**
     * Met à jour la réservation.
     */
    public function update(Request $request, $id)
    {
        $request->validate(['IdProg' => 'required|exists:programmation,IdProg']);

        $reservation = Reservation::findOrFail($id);
        $isOwner = DB::table('effectuer')->where('IdRes', $id)->where('IdUtilisateur', Auth::id())->exists();
        if (!$isOwner) abort(403);

        $seanceActuelle = Programmation::findOrFail($reservation->IdProg);

        // VÉRIFICATION : La séance initiale est-elle passée ?
        $dateHeureSeance = \Carbon\Carbon::parse($seanceActuelle->DateProg . ' ' . $seanceActuelle->HeureProg);
        if ($dateHeureSeance->isPast()) {
            return redirect()->route('reservations.index')->with('error', 'Impossible de modifier une réservation passée.');
        }

        $reservation->IdProg = $request->IdProg;
        $reservation->DateDeRes = now();
        $reservation->save();

        return redirect()->route('reservations.index')->with('success', 'Votre réservation a été modifiée avec succès.');
    }

    /**
     * Supprime la réservation (Annulation).
     */
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $isOwner = DB::table('effectuer')->where('IdRes', $id)->where('IdUtilisateur', Auth::id())->exists();
        if (!$isOwner) abort(403);

        $seanceActuelle = Programmation::findOrFail($reservation->IdProg);

        // VÉRIFICATION : La séance est-elle passée ?
        $dateHeureSeance = \Carbon\Carbon::parse($seanceActuelle->DateProg . ' ' . $seanceActuelle->HeureProg);
        if ($dateHeureSeance->isPast()) {
            return redirect()->route('reservations.index')->with('error', 'Impossible d\'annuler une réservation pour une séance qui est déjà passée.');
        }

        DB::table('effectuer')->where('IdRes', $id)->delete();
        $reservation->delete();

        return redirect()->route('reservations.index')->with('success', 'Votre réservation a été annulée avec succès.');
    }
}
