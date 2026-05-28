@extends('Layouts.user')

@section('content')
    <div class="films-section" style="padding: 40px 20px;">
        <h2>Nos Cinémas</h2>

        @auth
            @if(Auth::user()->IdTypeRoleUti == 1)
                <div style="text-align: center; margin-bottom: 20px;">
                    <a href="{{ route('cinemas.create') }}" class="btn-submit" style="display: inline-block; padding: 10px 20px; text-decoration: none;">Ajouter un cinéma</a>
                </div>
            @endif
        @endauth

        <div class="table-container">
            <table class="custom-table">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Code Postal</th>
                    <th>Ville</th>
                    <th style="text-align: center;">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cinemas as $cinema)
                    <tr>
                        <td>{{ $cinema->NomCinema }}</td>
                        <td>{{ $cinema->AdresseCine }}</td>
                        <td>{{ $cinema->CodPostCine }}</td>
                        <td>{{ $cinema->VilleCine }}</td>
                        <td>
                            <div class="table-actions">
                                <!-- Route dynamique pour VOIR -->
                                <a href="{{ route('cinemas.show', $cinema->IdCinema) }}" class="btn-menu-uniforme" style="padding: 6px 12px; font-size: 0.9em; background-color: var(--blue-btn);">Voir</a>

                                @auth
                                    @if(Auth::user()->IdTypeRoleUti == 1)
                                        <!-- Route dynamique pour MODIFIER -->
                                        <a href="{{ route('cinemas.edit', $cinema->IdCinema) }}" class="btn-menu-uniforme" style="padding: 6px 12px; font-size: 0.9em; background-color: var(--blue-btn);">Modifier</a>

                                        <!-- Route dynamique pour SUPPRIMER -->
                                        <form action="{{ route('cinemas.destroy', $cinema->IdCinema) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce cinéma ?');" style="margin: 0;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-menu-uniforme" style="padding: 6px 12px; font-size: 0.9em; background-color: var(--red-btn);">Supprimer</button>
                                        </form>
                                    @endif
                                @endauth
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
