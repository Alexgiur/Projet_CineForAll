<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineForAll - Nos Films</title>
    <link rel="stylesheet" href="{{ asset('Css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
</head>
<body>

<header class="main-header">
    <div class="logo-container">
        <a href="/">
            <img src="{{ asset('img/logo.jpeg') }}" alt="Logo CineForAll" class="logo">
        </a>
    </div>
    <nav class="main-nav">
        <ul>
            <li><a href="/">Accueil</a></li>
            <li><a href="{{ route('films.index') }}">Films</a></li>
            <li><a href="#" class="btn-menu-uniforme">Réservation</a></li>

            @if(Auth::check() && Auth::user()->IdTypeRoleUti == 1)
                <li><a href="{{ route('admin.dashboard') }}" class="btn-menu-uniforme">Administration</a></li>
            @endif

            @auth
                <li>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline; margin: 0; padding: 0;">
                        @csrf
                        <button type="submit" class="btn-menu-uniforme">Déconnexion</button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}" class="btn-menu-uniforme">Connexion</a></li>
            @endauth
        </ul>
    </nav>
</header>

<main class="films-section">
    <h2>Notre Catalogue</h2>

    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Rechercher un film..." onkeyup="filterFilms()">
    </div>

    <div class="film-list" id="filmList">
        @foreach($films as $film)
            <div class="film-card"
                 data-title="{{ strtolower($film->TitreFilm) }}"
                 onclick="openModal(
                    '{{ $film->IdFilm }}',
                    '{{ addslashes($film->TitreFilm) }}',
                    '{{ addslashes($film->ResumeFilm) }}',
                    '{{ asset($film->AfficheFilm) }}',
                    '{{ $film->DateSortieFilm }}',
                    '{{ $film->LongueurFilm }}',
                    '{{ $film->LangueFilm }}',
                    '{{ $film->genre->NomGenre ?? 'Inconnu' }}',
                    {{ $film->TroisDOuNon ? 'true' : 'false' }},
                    {{ (Auth::check() && Auth::user()->IdTypeRoleUti == 1) ? 'true' : 'false' }}
                 )">
                <img src="{{ asset($film->AfficheFilm) }}" alt="Affiche {{ $film->TitreFilm }}">
                <h3>{{ $film->TitreFilm }}</h3>
                <p>Genre : {{ $film->genre_film->LibGenreFilm ?? 'N/A' }}</p>
                <button class="details-link">Voir détails</button>
            </div>
        @endforeach
    </div>
</main>

<div class="modal-overlay" id="modalOverlay">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal()">&times;</span>
        <div class="modal-body" id="modalBody">
        </div>
    </div>
</div>

<footer>
    <p>© 2025 CineForAll - Tous droits réservés.</p>
</footer>

<script>
    function openModal(id, titre, resume, affiche, date, duree, langue, genre, is3D, isAdmin) {
        const modalOverlay = document.getElementById('modalOverlay');
        const modalBody = document.getElementById('modalBody');

        let badge3D = is3D ? '<span class="badge badge-3d">★ Disponible en 3D</span>' : '';

        let adminButtons = '';
        if (isAdmin) {
            adminButtons = `
            <div style="margin-top: 20px; display: flex; gap: 10px; justify-content: center;">
                <a href="/films/${id}/edit" class="btn-menu-uniforme" style="background-color: var(--blue-btn) !important;">Modifier</a>
                <form action="{{route('films.destroy')}}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce film ?');" style="display:inline;">
                    @csrf
            @method('DELETE')
                <input hidden name="id" value="${id}">
            <button type="submit" class="btn-menu-uniforme" style="background-color: var(--red-btn) !important;">Supprimer</button>
        </form>
    </div>
`;
        }

        modalBody.innerHTML = `
        <div class="film-details-modal" style="display: flex; gap: 30px; text-align: left;">
            <img src="${affiche}" alt="${titre}" style="width: 250px; border-radius: 8px; box-shadow: 0 5px 15px rgba(0,0,0,0.3);">
            <div style="flex: 1;">
                <h2 style="color: var(--primary-color); font-family: 'Lilita One'; font-size: 2.5em; margin-bottom: 10px;">${titre}</h2>

                <div style="margin-bottom: 20px; display: flex; gap: 10px;">
                    <span class="badge badge-genre">${genre}</span>
                    ${badge3D}
                </div>

                <div class="film-meta-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 15px;">
                    <div><strong>Sortie :</strong> ${date}</div>
                    <div><strong>Durée :</strong> ${duree} min</div>
                    <div><strong>Langue :</strong> ${langue}</div>
                </div>

                <h3 style="font-family: 'Lilita One'; color: var(--primary-dark);">Synopsis</h3>
                <p style="line-height: 1.6; margin-bottom: 25px;">${resume}</p>

                <div style="text-align: center;">
                    <a href="#" class="btn-menu-uniforme" style="padding: 12px 30px; font-size: 1.1em;">Réserver ma place</a>
                    ${adminButtons}
                </div>
            </div>
        </div>
    `;

        modalOverlay.classList.add('active');
    }

    function closeModal() {
        document.getElementById('modalOverlay').classList.remove('active');
    }

    window.onclick = function(event) {
        if (event.target == document.getElementById('modalOverlay')) closeModal();
    }
</script>

<script src="{{ asset('Js/filter.js') }}"></script>

</body>
</html>
