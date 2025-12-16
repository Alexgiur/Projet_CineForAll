<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - CineForAll</title>
</head>
<body>

<h1>Connexion - CineForAll</h1>

<a href="/">Retour à l'accueil</a>

<br><br>

@if($errors->any())
    <div style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 20px;">
        <strong>Erreur :</strong> {{ $errors->first() }}
    </div>
@endif

<form action="{{ route('login.submit') }}" method="POST">
    @csrf

    <label for="email">Email ou Login :</label><br>
    <input
        type="text"
        id="email"
        name="email"
        placeholder="Entrez votre email"
        value="{{ old('email') }}"
        required
        autofocus>
    @error('email')
    <span style="color: red;">{{ $message }}</span>
    @enderror

    <br><br>

    <label for="password">Mot de passe :</label><br>
    <input
        type="password"
        id="password"
        name="password"
        placeholder="Entrez votre mot de passe"
        required>
    @error('password')
    <span style="color: red;">{{ $message }}</span>
    @enderror

    <br><br>
    <br><br>

    <button type="submit">Se connecter</button>
</form>

<br><br>

<p>Pas encore de compte ? <a href="#">Créer un compte</a></p>

</body>
</html>
