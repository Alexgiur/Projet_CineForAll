<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - CineForAll</title>
    <link rel="stylesheet" href="{{ asset('Css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
</head>
<body style="background-color: var(--couleur-fond-body); display: flex; justify-content: center; align-items: center; min-height: 100vh;">

<div class="container-connexion">
    <div class="bloc-branding">
        <img src="{{ asset('img/logo.jpeg') }}" alt="Logo" class="logo-connexion">
        <h1>Rejoignez CineForAll</h1>
        <p>Créez votre compte pour réserver vos billets en un clic.</p>
    </div>

    <div class="bloc-formulaire">
        <h2>Inscription</h2>

        <form action="{{ route('register.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="login">Identifiant :</label>
                <input type="text" name="login" id="login" value="{{ old('login') }}" required placeholder="Pseudo">
                @error('login') <span style="color:red">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" name="password" id="password" required placeholder="••••••••">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmer le mot de passe :</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required placeholder="••••••••">
            </div>

            <button type="submit" class="btn-connexion">S'inscrire</button>
        </form>

        <p style="margin-top: 15px; text-align: center;">
            Déjà un compte ? <a href="{{ route('login') }}" style="color: var(--primary-color); font-weight: bold;">Se connecter</a>
        </p>
    </div>
</div>

</body>
</html>
