{{-- On choisit le layout dynamiquement selon le rôle et l'état de connexion --}}
@extends(
    Auth::check()
        ? (Auth::user()->IdTypeRoleUti == 1 ? 'Layouts.admin' : 'Layouts.user')
        : 'Layouts.guest'
)

@section('content')
    <main class="show-section">
        <div class="film-details-card">

            {{-- Côté Affiche --}}
            <div class="film-poster-side">
                @if($film->AfficheFilm)
                    <img src="{{ Str::startsWith($film->AfficheFilm, 'http') ? $film->AfficheFilm : asset('storage/' . $film->AfficheFilm) }}"
                         alt="Affiche {{ $film->TitreFilm }}">
                @else
                    <div style="height: 100%; display:flex; align-items:center; justify-content:center; background:#ddd; color:#777; border-radius: 12px;">
                        Pas d'affiche
                    </div>
                @endif
            </div>

            {{-- Côté Informations --}}
            <div class="film-info-side">
                <h1 class="film-title-hero">{{ $film->TitreFilm }}</h1>

                <div class="badges-container">
                    <span class="badge badge-genre">Genre : {{ $film->genre_film->LibGenreFilm ?? 'N/A' }}</span>
                    @if($film->TroisDOuNon)
                        <span class="badge badge-3d" style="background-color: #3498db; color: white; padding: 4px 8px; border-radius: 4px; font-size: 0.8em;">★ Disponible en 3D</span>
                    @endif
                </div>

                <div class="film-meta-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px; margin: 20px 0;">
                    <div class="meta-item">
                        <strong style="display: block; font-size: 0.8em; color: #888;">Date de sortie</strong>
                        <span>{{ \Carbon\Carbon::parse($film->DateSortieFilm)->format('d/m/Y') }}</span>
                    </div>
                    <div class="meta-item">
                        <strong style="display: block; font-size: 0.8em; color: #888;">Durée</strong>
                        <span>{{ $film->LongueurFilm }} min</span>
                    </div>
                    <div class="meta-item">
                        <strong style="display: block; font-size: 0.8em; color: #888;">Langue</strong>
                        <span>{{ $film->LangueFilm }}</span>
                    </div>
                </div>

                <div class="synopsis-section">
                    <h3 style="border-bottom: 2px solid var(--primary-color); display: inline-block; margin-bottom: 10px;">Synopsis</h3>
                    <p class="synopsis-content" style="line-height: 1.6; color: #444;">
                        {{ $film->ResumeFilm }}
                    </p>
                </div>

                {{-- SECTION : SEANCES DISPONIBLES (C'est cette partie qui manquait !) --}}
                <div class="seances-section" id="seances-dispo" style="margin-top: 30px; border-top: 1px solid #eee; padding-top: 20px;">
                    <h3 style="margin-bottom: 15px;">Séances disponibles</h3>

                    @if($film->programmations && $film->programmations->count() > 0)
                        <div class="seances-list" style="display: flex; flex-direction: column; gap: 10px;">
                            @foreach($film->programmations as $seance)
                                <div class="seance-item" style="background: #f8f9fa; padding: 15px; border-radius: 8px; display: flex; justify-content: space-between; align-items: center; border: 1px solid #e9ecef;">
                                    <div>
                                        <span style="font-weight: bold; color: #2c3e50;">
                                            {{ \Carbon\Carbon::parse($seance->DateProg)->format('d/m/Y') }}
                                        </span> à
                                        <span style="font-weight: bold; color: #e67e22;">{{ $seance->HeureProg }}</span>
                                        <br>
                                        <small style="color: #666;">
                                            Salle n°{{ $seance->salle->NumSalle ?? 'N/A' }}
                                            @if(isset($seance->salle->Capacite))
                                                ({{ $seance->salle->Capacite }} places)
                                            @endif
                                        </small>
                                    </div>

                                    @auth
                                        @if(Auth::user()->IdTypeRoleUti != 1)
                                            <a href="{{ route('reservations.create', $seance->IdProg) }}" class="btn-reservation" style="background-color: #f39c12; color: #fff; padding: 8px 15px; text-decoration: none; border-radius: 5px; font-weight: bold; transition: 0.3s;">Réserver</a>
                                        @else
                                            <span style="color: #7f8c8d; font-size: 0.8em; font-style: italic;">Mode Admin</span>
                                        @endif
                                    @else
                                        <a href="{{ route('login') }}" class="btn-reservation" style="background-color: #34495e; color: #fff; padding: 8px 15px; text-decoration: none; border-radius: 5px; font-size: 0.9em;">Connectez-vous pour réserver</a>
                                    @endauth
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p style="color: #999; font-style: italic; background: #fff3cd; padding: 10px; border-radius: 5px;">Aucune séance prévue pour le moment.</p>
                    @endif
                </div>

                {{-- Boutons d'Action --}}
                <div class="action-buttons" style="margin-top: 40px; display: flex; gap: 10px;">
                    <a href="{{ route('films.index') }}" class="btn-back" style="padding: 10px 20px; border: 1px solid #ccc; border-radius: 5px; text-decoration: none; color: #333;">← Retour aux films</a>

                    @auth
                        @if(Auth::user()->IdTypeRoleUti == 1)
                            <a href="{{ route('films.edit', $film->IdFilm) }}" class="btn-edit" style="padding: 10px 20px; background: #3498db; color: white; border-radius: 5px; text-decoration: none;">Modifier le film</a>

                            <form action="{{ route('films.destroy', $film->IdFilm) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce film ?');" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete-action" style="padding: 10px 20px; background: #e74c3c; color: white; border: none; border-radius: 5px; cursor: pointer;">Supprimer</button>
                            </form>
                        @endif
                    @endauth
                </div>

            </div>
        </div>
    </main>
@endsection
