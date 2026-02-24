{{-- On choisit le layout dynamiquement selon le rôle et l'état de connexion
@extends(
    Auth::check()
        ? (Auth::user()->IdTypeRoleUti == 1 ? 'layouts.admin' : 'layouts.user')
        : 'layouts.guest'
)
 --}}
@extends('layouts.user')
@section('content')

    <main class="show-section">
        <div class="film-details-card">

            <div class="film-poster-side">
                @if($film->AfficheFilm)
                    <img src="{{ Str::startsWith($film->AfficheFilm, 'http') ? $film->AfficheFilm : asset($film->AfficheFilm) }}"
                         alt="Affiche {{ $film->TitreFilm }}">
                @else
                    <div style="height: 100%; display:flex; align-items:center; justify-content:center; background:#ddd; color:#777;">
                        Pas d'affiche
                    </div>
                @endif
            </div>

            <div class="film-info-side">

                <h1 class="film-title-hero">{{ $film->TitreFilm }}</h1>

                <div class="badges-container">
                    <span class="badge badge-genre">Genre : {{ $film->genre_film->LibGenreFilm ?? 'N/A' }}</span>

                    @if($film->TroisDOuNon)
                        <span class="badge badge-3d">★ Disponible en 3D</span>
                    @endif
                </div>

                <div class="film-meta-grid">
                    <div class="meta-item">
                        <strong>Date de sortie</strong>
                        <span>{{ $film->DateSortieFilm }}</span>
                    </div>
                    <div class="meta-item">
                        <strong>Durée</strong>
                        <span>{{ $film->LongueurFilm }} min</span>
                    </div>
                    <div class="meta-item">
                        <strong>Langue</strong>
                        <span>{{ $film->LangueFilm }}</span>
                    </div>
                </div>

                <div class="synopsis-section">
                    <h3>Synopsis</h3>
                    <p class="synopsis-content">
                        {{ $film->ResumeFilm }}
                    </p>
                </div>

                <div class="action-buttons">
                    <a href="{{ route('films.index') }}" class="btn-back">← Retour aux films</a>

                    {{-- On gère l'affichage des boutons selon qui regarde la page --}}
                    @auth
                        @if(Auth::user()->IdTypeRoleUti == 1)
                            {{-- Boutons pour l'ADMINISTRATEUR --}}
                            <a href="{{route('films.edit', ["id" => $film->IdFilm])}}" class="btn-edit">Modifier</a>
                            <form action="{{route('films.destroy')}}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce film ?');" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete-action">Supprimer</button>
                            </form>
                        @else
                            {{-- Bouton pour l'UTILISATEUR NORMAL --}}
                            <a href="#" class="btn-reservation" style="background-color: #f39c12; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold; margin-left: 10px;">Réserver une place</a>
                        @endif
                    @else
                        {{-- Bouton pour le VISITEUR NON CONNECTÉ --}}
                        <a href="{{ route('login') }}" class="btn-reservation" style="background-color: #f39c12; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold; margin-left: 10px;">Connectez-vous pour réserver</a>
                    @endauth

                </div>

            </div>
        </div>
    </main>
@endsection
