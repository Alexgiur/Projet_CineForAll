<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - CineForAll</title>
    <link rel="stylesheet" href="{{ asset('Css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
</head>
<body>

<div class="container-connexion">
    <div class="bloc-branding">
        <img src="{{ asset('img/logo.jpeg') }}" alt="Logo" class="logo-connexion">
        <h1>CineForAll</h1>
        <p>Heureux de vous revoir ! Connectez-vous pour gérer vos réservations.</p>
    </div>

    <div class="bloc-formulaire">
        <h2>Connexion</h2>
        <a href="/" style="font-size: 0.9em; color: var(--primary-color); margin-bottom: 20px; display: block;">
            &larr; Retour à l'accueil
        </a>

        @if($errors->any())
            <div style="color: red; background: #fee; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
                <strong>Erreur :</strong> {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email ou Login :</label>
                <input type="text" id="email" name="email" value="{{ old('email') }}" placeholder="votre@email.com" required autofocus>
                @error('email') <span style="color: red; font-size: 0.8em;">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" placeholder="••••••••" required>
                @error('password') <span style="color: red; font-size: 0.8em;">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn-connexion">Se connecter</button>
        </form>

        <p style="margin-top: 20px; text-align: center;">
        <p>Pas encore de compte ? <a href="{{ route('register') }}" style="color: var(--primary-color); font-weight: bold;">Créer un compte</a></p>
        </p>
    </div>
</div>

</body>
</html>
