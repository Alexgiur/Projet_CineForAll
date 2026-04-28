@extends('Layouts.user')

@section('content')
    <main class="container" style="max-width: 600px; margin: 40px auto; padding: 20px;">

        <div style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
            <h2 style="color: #2c3e50; text-align: center; border-bottom: 2px solid #f39c12; padding-bottom: 10px;">
                Confirmer ma réservation
            </h2>

            {{-- Affichage des erreurs si la validation échoue au lieu de recharger en silence --}}
            @if ($errors->any())
                <div style="background: #e74c3c; color: white; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Détails du film et de la séance --}}
            <div style="margin: 20px 0; background: #f8f9fa; padding: 15px; border-radius: 8px;">
                <h3 style="margin-top: 0; color: #34495e;">{{ $seance->film->TitreFilm ?? 'Film inconnu' }}</h3>
                <p style="margin: 5px 0;">
                    <strong> Date :</strong> {{ \Carbon\Carbon::parse($seance->DateProg)->format('d/m/Y') }}
                </p>
                <p style="margin: 5px 0;">
                    <strong> Heure :</strong> {{ $seance->HeureProg }}
                </p>
                <p style="margin: 5px 0; color: #e67e22; font-weight: bold;">
                    📍 Cinéma : {{ $seance->salle->cinema->VilleCine ?? 'Ville inconnue' }}
                    ({{ $seance->salle->cinema->AdresseCine ?? 'Adresse inconnue' }})
                </p>
                <p style="margin: 5px 0;">
                    <strong> Salle :</strong> n°{{ $seance->salle->NumSalle ?? 'N/A' }}
                </p>
            </div>

            {{-- Formulaire de réservation --}}
            <form action="{{ route('reservations.store') }}" method="POST" style="display: flex; flex-direction: column; gap: 15px;">
                @csrf

                {{-- On cache l'ID de la séance pour l'envoyer au contrôleur --}}
                <input type="hidden" name="IdProg" value="{{ $seance->IdProg }}">
                <div style="margin-top: 15px;">
                    {{-- affiche nb places dispo --}}
                    <p style="margin: 0 0 10px 0; color: #27ae60; font-weight: bold; background: #e8f8f5; padding: 10px; border-radius: 5px; text-align: center;">
                        Places disponibles : {{ $seance->placesRestantes() }} / {{ $seance->salle->Capacite }}
                    </p>

                    <label for="NbPlaces" style="font-weight: bold; color: #34495e;">Nombre de places :</label>
                    {{-- on bloque le max avec la méthode du modèle --}}
                    <input type="number" name="NbPlaces" id="NbPlaces" value="1" min="1" max="{{ $seance->placesRestantes() }}"
                           style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; margin-top: 5px;" required>
                </div>

                <div style="display: flex; gap: 10px; margin-top: 20px;">
                    <a href="{{ route('films.show', $seance->IdFilm ?? 1) }}"
                       style="flex: 1; text-align: center; padding: 12px; background: #95a5a6; color: white; text-decoration: none; border-radius: 5px; font-weight: bold;">
                        Annuler
                    </a>

                    <button type="submit"
                            style="flex: 2; padding: 12px; background: #f39c12; color: white; border: none; border-radius: 5px; font-weight: bold; font-size: 16px; cursor: pointer;">
                        Valider la réservation
                    </button>
                </div>
            </form>
        </div>

    </main>
@endsection
