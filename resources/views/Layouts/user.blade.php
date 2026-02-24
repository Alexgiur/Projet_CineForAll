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
        <img src="{{ asset('img/logo.jpeg') }}" alt="Logo CineForAll" class="logo">
    </div>
    <nav class="main-nav">
        <ul>
            <li><a href="/">Accueil</a></li>
            <li><a href="{{ route('films.index') }}">Films</a></li>

            {{-- Tous les boutons utilisent maintenant la même classe CSS btn-menu-uniforme --}}
            <li><a href="#" class="btn-menu-uniforme">Mes Réservations</a></li>
            <li><a href="#" class="btn-menu-uniforme">Mon Compte</a></li>

            <li>
                <form action="{{ route('logout') }}" method="POST" style="display: inline; margin: 0; padding: 0;">
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
    <p>© 2025 CineForAll - Tous droits réservés.</p>
</footer>

</body>
</html>
