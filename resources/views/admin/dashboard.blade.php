<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - CineForAll</title>
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
            <li><a href="/">Retour au site</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="cta-login" style="border: none; cursor: pointer; font-family: inherit; font-size: inherit;">
                        Déconnexion
                    </button>
                </form>
            </li>
        </ul>
    </nav>
</header>

<main style="text-align: center; padding: 50px; min-height: 60vh;">
    <h1>Panneau d'administration</h1>

    <div style="display: flex; justify-content: center; gap: 20px; margin-top: 40px;">
        <a href="{{ route('personnes.index') }}" style="padding: 20px; background: #333; color: white; text-decoration: none; border-radius: 5px; font-weight: bold;">
            Gérer les Personnes
        </a>

        <a href="{{ route('personnes.index', ['filtre' => 'acteurs']) }}" style="padding: 20px; background: #333; color: white; text-decoration: none; border-radius: 5px; font-weight: bold;">
            Gérer les Acteurs
        </a>
    </div>
</main>

<footer>
    <p>© 2025 CineForAll - Tous droits réservés.</p>
</footer>

</body>
</html>
