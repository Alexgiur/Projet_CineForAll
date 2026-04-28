@extends('Layouts.user')

@section('content')
    <div class="container" style="max-width: 900px; margin: 40px auto; padding: 20px;">

        <h2 style="color: #2c3e50; border-bottom: 2px solid #f39c12; padding-bottom: 10px;">
            Mes Réservations - {{ Auth::user()->LoginUti }}
        </h2>

        {{-- Message de succès --}}
        @if(session('success'))
            <div style="background: #2ecc71; color: white; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        {{-- Message d'erreur (si l'utilisateur tente de forcer une action interdite) --}}
        @if(session('error'))
            <div style="background: #e74c3c; color: white; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                {{ session('error') }}
            </div>
        @endif

        {{-- Tableau des réservations --}}
        @if($reservations->isEmpty())
            <p style="color: #7f8c8d; font-style: italic;">Vous n'avez aucune réservation pour le moment.</p>
        @else
            <div style="background: white; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); overflow: hidden;">
                <table style="width: 100%; border-collapse: collapse; text-align: left;">
                    <thead style="background-color: #f8f9fa; border-bottom: 2px solid #ddd;">
                    <tr>
                        <th style="padding: 15px; color: #34495e;">Réservé le</th>
                        <th style="padding: 15px; color: #34495e;">Film</th>
                        <th style="padding: 15px; color: #34495e;">Date et Heure</th>
                        <th style="padding: 15px; color: #34495e;">Places</th>
                        <th style="padding: 15px; color: #34495e;">Lieu</th>
                        <th style="padding: 15px; color: #34495e; text-align: center;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reservations as $res)
                        <tr style="border-bottom: 1px solid #ecf0f1;">
                            <td style="padding: 15px;">{{ \Carbon\Carbon::parse($res->DateDeRes)->format('d/m/Y') }}</td>

                            <td style="padding: 15px; font-weight: bold;">
                                {{ $res->details->film->TitreFilm ?? 'Film introuvable' }}
                            </td>

                            <td style="padding: 15px;">
                                @if(isset($res->details))
                                    Le {{ \Carbon\Carbon::parse($res->details->DateProg)->format('d/m/Y') }}<br>
                                    à {{ \Carbon\Carbon::parse($res->details->HeureProg)->format('H:i') }}
                                @else
                                    N/A
                                @endif
                            </td>

                            <td style="padding: 15px; text-align: center;">
                                <strong>{{ $res->NbPlaces }}</strong>
                            </td>

                            <td style="padding: 15px;">
                                <strong>{{ $res->details->salle->cinema->VilleCine ?? 'N/A' }}</strong><br>
                                <span style="font-size: 0.9em; color: #7f8c8d;">Salle n°{{ $res->details->salle->NumSalle ?? 'N/A' }}</span>
                            </td>



                            {{-- BOUTONS D'ACTION AVEC VERIFICATION DE LA DATE --}}
                            <td style="padding: 15px; text-align: center; display: flex; gap: 10px; justify-content: center;">
                                @php
                                    $isFuture = false;
                                    if(isset($res->details)) {
                                        $seanceDateTime = \Carbon\Carbon::parse($res->details->DateProg . ' ' . $res->details->HeureProg);
                                        $isFuture = $seanceDateTime->isFuture();
                                    }
                                @endphp

                                @if($isFuture)
                                    <a href="{{ route('reservations.edit', $res->IdRes) }}" class="btn-menu-uniforme" style="background-color: #3498db !important; padding: 8px 15px; font-size: 0.9em;">
                                        Modifier
                                    </a>

                                    <form action="{{ route('reservations.destroy', $res->IdRes) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment annuler cette réservation ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-menu-uniforme" style="background-color: #e74c3c !important; padding: 8px 15px; font-size: 0.9em; cursor: pointer; border: none;">
                                            Annuler
                                        </button>
                                    </form>
                                @else
                                    <span style="color: #7f8c8d; font-style: italic; background: #ecf0f1; padding: 5px 10px; border-radius: 5px;">
                                        Séance terminée
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
