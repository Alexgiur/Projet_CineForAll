<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails de {{ $personne->PrePer }}</title>
    <link rel="stylesheet" href="{{ asset('Css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
</head>
<body>
<header class="main-header">
    <div class="logo-container"><a href="/"><img src="{{ asset('img/logo.jpeg') }}" class="logo"></a></div>
</header>

<main class="show-section">
    <div class="film-details-card" style="flex-direction: column; padding: 40px;">
        <h1 class="film-title-hero">{{ $personne->PrePer }} {{ $personne->NomPer }}</h1>

        <div class="film-meta-grid">
            <div class="meta-item">
                <strong>Nationalité</strong>
                <span>{{ $personne->NationalitePer ?? 'Non renseignée' }}</span>
            </div>
            <div class="meta-item">
                <strong>Né(e) le</strong>
                <span>{{ $personne->DateNaissancePer ?? 'Inconnue' }}</span>
            </div>
        </div>

        <div class="synopsis-section">
            <h3>Biographie</h3>
            <p class="synopsis-content">{{ $personne->BiographiePer ?? 'Aucune biographie.' }}</p>
        </div>

        <div class="action-buttons">
            <a href="/personnes" class="btn-back">Retour</a>
            <a href="/personnes/{{ $personne->Idper }}/edit" class="btn-edit">Modifier</a>
        </div>
    </div>
</main>
</body>
</html>
