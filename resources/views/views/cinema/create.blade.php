<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineForAll - Ajouter un cinéma</title>
    <link rel="stylesheet" href="{{ asset('Css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
</head>
<body>

<header class="main-header">
    <div class="logo-container">
        <a href="{{ url('/') }}">
            <img src="{{ asset('img/logo.jpeg') }}" alt="Logo CineForAll" class="logo">
        </a>
    </div>
    <nav class="main-nav">
        <ul>
            <li><a href="{{ url('/') }}">Accueil</a></li>
            <li><a href="{{ url('/films') }}">Films</a></li>
            <li><a href="{{ url('/cinemas') }}" style="color:var(--primary-color);">Cinémas</a></li>

            @auth
                <li>
                    <form action="{{ url('/logout') }}" method="POST" style="display: inline; margin: 0; padding: 0;">
                        @csrf
                        <button type="submit" class="btn-menu-uniforme">Déconnexion</button>
                    </form>
                </li>
            @else
                <li><a href="{{ url('/login') }}" class="btn-menu-uniforme">Connexion</a></li>
            @endauth
        </ul>
    </nav>
</header>

<main class="create-section">
    <div class="form-container">
        <h1>Créer un Cinéma</h1>

        {{-- CE BLOC AFFICHERA L'ERREUR DE VALIDATION QUI T'EMPÊCHAIT DE CRÉER LE CINÉMA --}}
        @if ($errors->any())
            <div style="background: #e74c3c; color: white; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/cinemas') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="NomCinema">Nom</label>
                <input type="text" id="NomCinema" name="NomCinema" value="{{ old('NomCinema') }}" placeholder="Saisir le nom" required>
            </div>

            <div class="form-group">
                <label for="AdresseCine">Adresse</label>
                <input type="text" id="AdresseCine" name="AdresseCine" value="{{ old('AdresseCine') }}" placeholder="Saisir l'adresse" required>
            </div>

            <div class="form-group">
                <label for="CodPostCine">Code Postal</label>
                <input type="text" id="CodPostCine" name="CodPostCine" value="{{ old('CodPostCine') }}" placeholder="Saisir le code postal" required>
            </div>

            <div class="form-group">
                <label for="VilleCine">Ville</label>
                <input type="text" id="VilleCine" name="VilleCine" value="{{ old('VilleCine') }}" placeholder="Saisir la ville" required>
            </div>

            <button type="submit" class="btn-submit">Créer le cinéma</button>
            <a href="{{ url('/cinemas') }}" style="display:block; text-align:center; margin-top:15px; color:#777; text-decoration:none;">Annuler</a>
        </form>
    </div>
</main>

<footer>
    <p>© 2025 CineForAll - Tous droits réservés.</p>
</footer>

</body>
</html>