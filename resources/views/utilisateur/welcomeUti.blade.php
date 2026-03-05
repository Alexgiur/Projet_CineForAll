@extends('layouts.user')

@section('content')
    <section class="hero-section">
        <div class="hero-content">
            <h1>Bienvenue sur CineForAll</h1>
            <p>Réservez vos places de cinéma en un clic.</p>
        </div>
    </section>

    <section class="films-section" id="films-semaine">
        <h2>Films de la semaine</h2>
        <div class="film-list">
            @foreach($filmsSemaine as $film)
                <div class="film-card">
                    <img src="{{ asset('storage/' . $film->AfficheFilm) }}" alt="{{ $film->TitreFilm }}">
                    <h3>{{ $film->TitreFilm }}</h3>
                    <p>Genre: {{ $film->genre_film->LibGenreFilm ?? 'Non spécifié' }}</p>
                    <a href="{{ route('films.show', $film->IdFilm) }}" class="details-link">Réserver</a>
                </div>
            @endforeach
        </div>
    </section>

    <section class="films-section" id="films-avenir">
        <h2>Prochainement</h2>
        <div class="film-list">
            @foreach($filmsAvenir as $film)
                <div class="film-card">
                    @if($film->AfficheFilm)
                        <img src="{{ asset('storage/' . $film->AfficheFilm) }}" alt="{{ $film->TitreFilm }}">
                    @endif
                    <h3>{{ $film->TitreFilm }}</h3>
                </div>
            @endforeach
        </div>
    </section>
@endsection
