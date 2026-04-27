@extends('Layouts.user')

@section('content')
    <main class="container" style="max-width: 600px; margin: 40px auto; padding: 20px;">

        <div style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
            <h2 style="color: #2c3e50; text-align: center; border-bottom: 2px solid #3498db; padding-bottom: 10px;">
                Modifier ma réservation
            </h2>

            @if ($errors->any())
                <div style="background: #e74c3c; color: white; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div style="margin: 20px 0; background: #f8f9fa; padding: 15px; border-radius: 8px;">
                <h3 style="margin-top: 0; color: #34495e;">Film : {{ $seanceActuelle->film->TitreFilm ?? 'Inconnu' }}</h3>
                <p style="margin-bottom: 5px;"><strong>Séance actuelle :</strong></p>
                <p style="margin: 0; color: #7f8c8d;">
                    Le {{ \Carbon\Carbon::parse($seanceActuelle->DateProg)->format('d/m/Y') }}
                    à {{ \Carbon\Carbon::parse($seanceActuelle->HeureProg)->format('H:i') }}
                    - Salle n°{{ $seanceActuelle->salle->NumSalle ?? 'N/A' }}
                </p>
            </div>

            <form action="{{ route('reservations.update', $reservation->IdRes) }}" method="POST" style="display: flex; flex-direction: column; gap: 15px;">
                @csrf
                @method('PUT')

                <label for="IdProg" style="font-weight: bold; color: #34495e;">Choisir une nouvelle séance :</label>
                <select name="IdProg" id="IdProg" style="padding: 10px; border-radius: 5px; border: 1px solid #ccc; font-size: 16px;">
                    @foreach($autresSeances as $seance)
                        <option value="{{ $seance->IdProg }}" {{ $seance->IdProg == $reservation->IdProg ? 'selected' : '' }}>
                            Le {{ \Carbon\Carbon::parse($seance->DateProg)->format('d/m/Y') }}
                            à {{ \Carbon\Carbon::parse($seance->HeureProg)->format('H:i') }}
                            - {{ $seance->salle->cinema->VilleCine ?? '' }} (Salle {{ $seance->salle->NumSalle ?? '' }})
                        </option>
                    @endforeach
                </select>

                <div style="margin-top: 15px;">
                    <label for="NbPlaces" style="font-weight: bold; color: #34495e;">Modifier le nombre de places :</label>
                    <input type="number" name="NbPlaces" id="NbPlaces" value="{{ $reservation->NbPlaces }}" min="1" max="10"
                           style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; margin-top: 5px;" required>
                </div>

                <div style="display: flex; gap: 10px; margin-top: 20px;">
                    <a href="{{ route('reservations.index') }}"
                       style="flex: 1; text-align: center; padding: 12px; background: #95a5a6; color: white; text-decoration: none; border-radius: 5px; font-weight: bold;">
                        Retour
                    </a>

                    <button type="submit"
                            style="flex: 2; padding: 12px; background: #3498db; color: white; border: none; border-radius: 5px; font-weight: bold; font-size: 16px; cursor: pointer;">
                        Sauvegarder les modifications
                    </button>
                </div>
            </form>
        </div>
    </main>
@endsection
