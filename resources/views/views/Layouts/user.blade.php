<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineForAll - Espace Utilisateur</title>
    <link rel="stylesheet" href="{{ asset('Css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
</head>
<body>

<header class="main-header">
    <div class="logo-container">
        <a href="{{ url('/') }}"><img src="{{ asset('img/logo.jpeg') }}" alt="Logo CineForAll" class="logo"></a>
    </div>
    <nav class="main-nav">
        <ul>

            <h2 style="color: #991917; border-bottom: 2px solid #f4f4f4; padding-bottom: 10px;">
                Utilisateur connecté -  {{ Auth::user()->LoginUti }}
            </h2>

            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li><a href="{{ url('/films') }}">Films</a></li>
            <li><a href="{{ url('/mes-reservations') }}" class="btn-menu-uniforme">Réservations</a></li>

            @if(Auth::check() && Auth::user()->IdTypeRoleUti == 1)
                <li><a href="{{ url('/admin') }}" class="btn-menu-uniforme">Administration</a></li>
            @endif

            <li>
                <form action="{{ url('/logout') }}" method="POST" style="display: inline; margin: 0; padding: 0;">
                    @csrf
                    <button type="submit" class="btn-menu-uniforme">
                        Déconnexion
                    </button>
                </form>
            </li>
        </ul>
    </nav>
</header>

<main>
    @yield('content')
</main>

<footer>
    <p>© 2026 CineForAll - Tous droits réservés.</p>
    <p style="margin-top: 10px;">
        <a href="{{ url('/termes') }}" style="color: white; text-decoration: underline; font-size: 0.9em;">Termes & Conditions</a>
    </p>
</footer>

</body>
</html>