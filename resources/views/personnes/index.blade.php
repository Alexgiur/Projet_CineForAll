<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineForAll - Liste des Personnes</title>
    <link rel="stylesheet" href="{{ asset('Css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <style>
        .search-container { margin-bottom: 20px; display: flex; gap: 10px; }
        .search-input { padding: 10px; border-radius: 5px; border: 1px solid #ccc; flex-grow: 1; }
        .custom-pagination { display: flex; gap: 5px; margin-top: 20px; justify-content: center; }
        .page-link { padding: 8px 12px; background: #eee; text-decoration: none; color: black; border-radius: 4px; }
        .page-link.active { background: var(--primary-color, #ff0000); color: white; }
    </style>
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
            @guest
                <li><a href="/login" class="cta-login">Connexion</a></li>
            @endguest
            @auth
                <li>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="cta-login" style="border: none; cursor: pointer; font-family: inherit; font-size: inherit;">
                            Déconnexion
                        </button>
                    </form>
                </li>
            @endauth
        </ul>
    </nav>
</header>

<main class="admin-dashboard">
    <h1>Gestion des Personnes</h1>

    <div class="admin-toolbar" style="display: flex; justify-content: space-between; align-items: center;">
        <form action="/personnes" method="GET" class="search-container" style="flex-grow: 1; margin-right: 20px;">
            <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Rechercher par nom ou prénom..." class="search-input">
            <button type="submit" class="btn-edit" style="background-color: var(--primary-color);">Rechercher</button>
            @if($search)
                <a href="/personnes" class="btn-edit" style="background-color: #6c757d; text-decoration: none; display: flex; align-items: center;">Réinitialiser</a>
            @endif
        </form>

        @auth
            @if(Auth::user()->IdTypeRoleUti == 1)
                <a href="/personnes/create" class="btn-edit" style="background-color: var(--green-btn); white-space: nowrap;">+ Ajouter une personne</a>
            @endif
        @endauth
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
                    @auth
                        @if(Auth::user()->IdTypeRoleUti == 1)
                            <a href="/personnes/{{ $personne->Idper }}/edit" class="btn-edit">Modifier</a>
                            <form action="/personnes/{{ $personne->Idper }}" method="POST" onsubmit="return confirm('Supprimer ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete-action">Supprimer</button>
                            </form>
                        @endif
                    @endauth
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @if($totalPages > 1)
        <div class="custom-pagination">
            @if($currentPage > 1)
                <a href="?page={{ $currentPage - 1 }}&search={{ $search }}" class="page-link">Précédent</a>
            @endif

            @for($i = 1; $i <= $totalPages; $i++)
                <a href="?page={{ $i }}&search={{ $search }}" class="page-link {{ $i == $currentPage ? 'active' : '' }}">
                    {{ $i }}
                </a>
            @endfor

            @if($currentPage < $totalPages)
                <a href="?page={{ $currentPage + 1 }}&search={{ $search }}" class="page-link">Suivant</a>
            @endif
        </div>
    @endif
</main>
</body>
</html>
