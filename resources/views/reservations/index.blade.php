@extends('Layouts.user')

@section('content')
    <div class="container" style="max-width: 800px; margin: 40px auto; padding: 20px;">

        <h2 style="color: #2c3e50; border-bottom: 2px solid #f39c12; padding-bottom: 10px;">
            {{-- Affiche le nom/login de l'utilisateur connecté --}}
            Mes Réservations - {{ Auth::user()->LoginUti }}
        </h2>

        {{-- Message de succès après une réservation --}}
        @if(session('success'))
            <div style="background: #2ecc71; color: white; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                {{ session('success') }}
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
                        <th style="padding: 15px; color: #34495e;">Salle</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reservations as $res)
                        <tr style="border-bottom: 1px solid #ecf0f1;">
                            {{-- Date de l'action de réservation --}}
                            <td style="padding: 15px;">{{ \Carbon\Carbon::parse($res->DateDeRes)->format('d/m/Y') }}</td>

                            {{-- Titre du film --}}
                            <td style="padding: 15px; font-weight: bold;">
                                {{ $res->details->film->TitreFilm ?? 'Film introuvable' }}
                            </td>

                            {{-- Date et heure de la séance --}}
                            <td style="padding: 15px;">
                                @if(isset($res->details))
                                    Le {{ \Carbon\Carbon::parse($res->details->DateProg)->format('d/m/Y') }}
                                    à {{ $res->details->HeureProg }}
                                @else
                                    N/A
                                @endif
                            </td>

                            {{-- Numéro de la salle --}}
                            <td style="padding: 15px;">
                                n°{{ $res->details->salle->NumSalle ?? 'N/A' }}
                            </td>

                            <td style="padding: 15px;">
                                <strong>{{ $res->details->salle->cinema->VilleCine ?? 'N/A' }}</strong><br>
                                <strong>{{ $res->details->salle->cinema->AdresseCine ?? 'N/A' }}</strong><br>
                                <span style="font-size: 0.9em; color: #7f8c8d;">Salle n°{{ $res->details->salle->NumSalle ?? 'N/A' }}</span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
