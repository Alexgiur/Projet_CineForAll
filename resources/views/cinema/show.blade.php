<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineForAll - Détails du cinéma</title>
    <link rel="stylesheet" href="{{ asset('Css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
</head>
<body>

<header class="main-header">
    <div class="logo-container">
        <a href="/">
            <img src="{{ asset('img/logo.jpeg') }}" alt="Logo CineForAll" class="logo">
        </a>
    </div>
    <nav class="main-nav">
        <ul>
            <li><a href="/">Accueil</a></li>
            <li><a href="{{ route('films.index') }}">Films</a></li>
            <li><a href="{{ route('reservations.index') }}" class="btn-menu-uniforme">Réservation</a></li>

            @auth
                @if(Auth::user()->IdTypeRoleUti != 1)
                    <li><a href="{{ route('reservations.index') }}" class="btn-menu-uniforme">Réservations</a></li>
                @endif
            @endauth

            @if(Auth::check() && Auth::user()->IdTypeRoleUti == 1)
                <li><a href="{{ route('admin.dashboard') }}" class="btn-menu-uniforme">Administration</a></li>
            @endif

            @auth
                <li>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline; margin: 0; padding: 0;">
                        @csrf
                        <button type="submit" class="btn-menu-uniforme">Déconnexion</button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}" class="btn-menu-uniforme">Connexion</a></li>
            @endauth
        </ul>
    </nav>
</header>

<main class="create-section" style="padding: 60px 20px; display: flex; justify-content: center; align-items: center;">
    <div class="table-container" style="max-width: 600px; width: 100%; text-align: center; padding: 40px;">
        <h1 style="color: var(--primary-color); font-family: 'Lilita One', sans-serif; font-size: 2.5em; margin-bottom: 30px;">Détails du Cinéma</h1>

        <div style="font-size: 1.2em; color: #444; margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 15px;">
            <strong style="color: #222;">Adresse :</strong> {{ $cinema->AdresseCine }}
        </div>

        <div style="font-size: 1.2em; color: #444; margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 15px;">
            <strong style="color: #222;">Code Postal :</strong> {{ $cinema->CodPostCine }}
        </div>

        <div style="font-size: 1.2em; color: #444; margin-bottom: 40px;">
            <strong style="color: #222;">Ville :</strong> {{ $cinema->VilleCine }}
        </div>

        <div class="table-actions" style="margin-top: 20px; flex-wrap: wrap;">
            <a href="{{ route('cinemas.index') }}" class="btn-menu-uniforme" style="padding: 10px 20px; font-size: 1em; text-decoration: none; background-color: #6c757d;">Retour à la liste</a>

            @auth
                @if(Auth::user()->IdTypeRoleUti == 1)
                    <a href="/cinemas/{{ $cinema->IdCinema }}/edit" class="btn-menu-uniforme" style="padding: 10px 20px; font-size: 1em; text-decoration: none; background-color: var(--blue-btn);">Modifier</a>
                    <form action="/cinemas/{{ $cinema->IdCinema }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce cinéma ?');" style="margin: 0;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-menu-uniforme" style="padding: 10px 20px; font-size: 1em; background-color: var(--red-btn);">Supprimer</button>
                    </form>
                @endif
            @endauth
        </div>
    </div>
</main>

<footer>
    <p>© 2025 CineForAll - Tous droits réservés.</p>
</footer>

</body>
</html>
