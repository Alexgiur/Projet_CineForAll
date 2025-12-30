<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineForAll - Liste des Personnes</title>
    <link rel="stylesheet" href="{{ asset('Css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
</head>
<body>
<header class="main-header">
    <div class="logo-container">
        <a href="/"><img src="{{ asset('img/logo.jpeg') }}" alt="Logo" class="logo"></a>
    </div>
    <nav class="main-nav">
        <ul>
            <li><a href="/">Accueil</a></li>
            <li><a href="/films">Films</a></li>
            <li><a href="/personnes" style="color:var(--primary-color);">Personnes</a></li>
            <li><a href="/login" class="cta-login">Connexion</a></li>
        </ul>
    </nav>
</header>

<main class="admin-dashboard">
    <h1>Gestion des Personnes</h1>
    <div class="admin-toolbar">
        <a href="/personnes/create" class="btn-edit" style="background-color: var(--green-btn);">+ Ajouter une personne</a>
    </div>

    <table class="admin-table">
        <thead>
        <tr>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Nationalité</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($personnes as $personne)
            <tr>
                <td>{{ $personne->PrePer }}</td>
                <td>{{ $personne->NomPer }}</td>
                <td>{{ $personne->NationalitePer }}</td>
                <td style="display: flex; gap: 10px; justify-content: center;">
                    <a href="/personnes/{{ $personne->Idper }}" class="details-link" style="margin:0;">Voir</a>
                    <a href="/personnes/{{ $personne->Idper }}/edit" class="btn-edit">Modifier</a>
                    <form action="/personnes/{{ $personne->Idper }}" method="POST" onsubmit="return confirm('Supprimer ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete-action">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</main>
</body>
</html>
