<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tous les Films - CineForAll</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
</head>
<body>

<header class="main-header">
    <div class="logo-container">
        <a href="/">
            <img src="{{ asset('img/logo.jpeg') }}" alt="Logo CineForAll">
        </a>
    </div>
    <nav class="main-nav">
        <ul>
            <li><a href="/films">Les Films</a></li>
            <li><a href="/films/create">Ajouter un film</a></li>
        </ul>
    </nav>
</header>

<main>
    <section class="films-section">
        <h1>Tous les Films</h1>

        <div style="margin-bottom: 30px; text-align: center;">
            <a href="/films/create" style="text-decoration: none;">
                <button type="button" class="btn-connexion" style="width: auto; padding: 10px 25px; cursor: pointer;">
                    + Créer un nouveau film
                </button>
            </a>
        </div>

        <div class="film-list">
            @if($films->isEmpty())
                <p>Aucun film disponible pour le moment.</p>
            @else
                @foreach($films as $f)
                    <div class="film-card">
                        <img src="{{ $f->AfficheFilm }}" alt="Affiche de {{ $f->TitreFilm }}">

                        <h3>{{ $f->TitreFilm }}</h3>

                        <div style="text-align: left; font-size: 0.9em; margin-top: 10px;">
                            <p><strong>Genre :</strong> {{ $f->IdGenreFilm }}</p>
                            <p><strong>Durée :</strong> {{ $f->LongueurFilm }} min</p>
                            <p><strong>Langue :</strong> {{ $f->LangueFilm }}</p>
                            <p><strong>Sortie :</strong> {{ $f->DateSortieFilm }}</p>
                        </div>

                        @if($f->TroisDOuNon)
                            <div style="margin-top: 10px; background-color: #ffd700; color: #000; padding: 5px; border-radius: 4px; font-weight: bold; display: inline-block;">
                                ★ En 3D
                            </div>
                        @endif
                    </div>
                @endforeach
            @endif
        </div>
    </section>
</main>

<footer>
    <p>CineForAll - Tous droits réservés</p>
</footer>

</body>
</html>
