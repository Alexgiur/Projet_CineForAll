<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineForAll - Nos Cinémas</title>
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
            <li><a href="{{ route('cinemas.index') }}" style="color:var(--primary-color);">Cinémas</a></li>

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

<main class="films-section" style="padding: 40px 20px;">
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
                <th>Adresse</th>
                <th>Code Postal</th>
                <th>Ville</th>
                <th style="text-align: center;">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cinemas as $cinema)
                <tr>
                    <td>{{ $cinema->AdresseCine }}</td>
                    <td>{{ $cinema->CodPostCine }}</td>
                    <td>{{ $cinema->VilleCine }}</td>
                    <td>
                        <div class="table-actions">
                            <a href="/cinemas/{{$cinema->IdCinema}}" class="btn-menu-uniforme" style="padding: 6px 12px; font-size: 0.9em; background-color: var(--blue-btn);">Voir</a>
                            @auth
                                @if(Auth::user()->IdTypeRoleUti == 1)
                                    <a href="/cinemas/{{ $cinema->IdCinema }}/edit" class="btn-menu-uniforme" style="padding: 6px 12px; font-size: 0.9em; background-color: var(--blue-btn);">Modifier</a>
                                    <form action="/cinemas/{{ $cinema->IdCinema }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce cinéma ?');" style="margin: 0;">
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
</main>

<footer>
    <p>© 2025 CineForAll - Tous droits réservés.</p>
</footer>

</body>
</html>
