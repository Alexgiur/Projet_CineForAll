<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $film->TitreFilm }} - Détails</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
</head>
<body>

<header class="main-header">
    <div class="logo-container">
        <a href="/films">
            <img src="{{ asset('img/logo.jpeg') }}" alt="CineForAll Logo">
        </a>
    </div>
    <nav class="main-nav">
        <ul>
            <li><a href="/films">Accueil Films</a></li>
            <li><a href="/films/create">Ajouter un film</a></li>
        </ul>
    </nav>
</header>

<main>
    <form action="/films/{{ $film->IdFilm }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">Supprimer</button>
    </form>
    <div style="max-width: 800px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); display: flex; gap: 30px; align-items: flex-start;">

        <div style="flex: 1;">
            @if($film->AfficheFilm)
                <img src="{{ $film->AfficheFilm }}" alt="Affiche {{ $film->TitreFilm }}" style="width: 100%; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
            @else
                <div style="width: 100%; height: 300px; background: #eee; display: flex; align-items: center; justify-content: center; border-radius: 8px;">
                    <span style="color: #999;">Pas d'affiche</span>
                </div>
            @endif
        </div>

        <div style="flex: 2;">
            <h1 style="text-align: left; margin-bottom: 10px;">{{ $film->TitreFilm }}</h1>

            <div style="margin-bottom: 20px;">
                @if($film->TroisDOuNon)
                    <span style="background-color: #ffd700; color: #000; padding: 5px 10px; border-radius: 20px; font-weight: bold; font-size: 0.9em;">★ En 3D</span>
                @endif
            </div>

            <p style="margin-bottom: 10px;"><strong>Date de sortie :</strong> {{ $film->DateSortieFilm }}</p>
            <p style="margin-bottom: 10px;"><strong>Durée :</strong> {{ $film->LongueurFilm }} minutes</p>
            <p style="margin-bottom: 10px;"><strong>Langue :</strong> {{ $film->LangueFilm }}</p>
            <p style="margin-bottom: 10px;"><strong>Genre (ID) :</strong> {{ $film->IdGenreFilm }}</p>

            <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #eee;">
                <h3 style="font-family: var(--font-family-body); color: #333; margin-bottom: 10px;">Résumé</h3>
                <p style="line-height: 1.6; color: #555;">
                    {{ $film->ResumeFilm }}
                </p>
            </div>

            <div style="margin-top: 30px;">
                <a href="/films" class="btn-primary" style="text-decoration: none; background-color: #555;">
                    ← Retour à la liste
                </a>
            </div>
        </div>

    </div>
</main>

<footer>
    <p>2024 CineForAll - Tous droits réservés</p>
</footer>

</body>
</html>
