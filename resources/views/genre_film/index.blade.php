<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineForAll - Genres de film</title>
    <link rel="stylesheet" href="{{ asset('Css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <style>
        .genre-table-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
        }
        .genre-table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        .genre-table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .genre-table thead {
            background-color: var(--primary-color, #e50914);
            color: #fff;
        }
        .genre-table th,
        .genre-table td {
            padding: 14px 20px;
            text-align: left;
        }
        .genre-table tbody tr { border-bottom: 1px solid #eee; }
        .genre-table tbody tr:last-child { border-bottom: none; }
        .genre-table tbody tr:hover { background-color: #f9f9f9; }
        .genre-actions { display: flex; gap: 10px; }
        .btn-edit {
            padding: 6px 14px;
            background-color: #555;
            color: #fff;
            border-radius: 4px;
            text-decoration: none;
            font-size: 0.9em;
        }
        .btn-edit:hover { background-color: #333; }
        .btn-delete {
            padding: 6px 14px;
            background-color: #c0392b;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 0.9em;
            cursor: pointer;
        }
        .btn-delete:hover { background-color: #a93226; }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            padding: 12px 20px;
            border-radius: 6px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
        }
        .empty-message {
            text-align: center;
            padding: 30px;
            color: #888;
            font-style: italic;
        }
    </style>
</head>
<body>

<header class="main-header">
    <div class="logo-container">
        <a href="/"><img src="{{ asset('img/logo.jpeg') }}" alt="Logo CineForAll" class="logo"></a>
    </div>
    <nav class="main-nav">
        <ul>
            <li><a href="/">Accueil</a></li>
            <li><a href="{{ route('films.index') }}">Films</a></li>
            <li><a href="#" class="btn-menu-uniforme">Réservation</a></li>
            <li><a href="{{ route('admin.dashboard') }}" class="btn-menu-uniforme">Administration</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST" style="display: inline; margin: 0; padding: 0;">
                    @csrf
                    <button type="submit" class="btn-menu-uniforme">Déconnexion</button>
                </form>
            </li>
        </ul>
    </nav>
</header>

<main>
    <div class="genre-table-container">

        <div class="genre-table-header">
            <h1 style="color: var(--primary-color); font-size: 2.5em;">Genres de film</h1>
            <a href="{{ route('genre_film.create') }}" class="btn-menu-uniforme">+ Ajouter un genre</a>
        </div>

        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <table class="genre-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Libellé</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($genres as $genre)
                <tr>
                    <td>{{ $genre->IdGenreFilm }}</td>
                    <td>{{ $genre->LibGenreFilm }}</td>
                    <td>
                        <div class="genre-actions">
                            <a href="{{ route('genre_film.edit', $genre) }}" class="btn-edit">Modifier</a>
                            <form action="{{ route('genre_film.destroy', $genre) }}" method="POST"
                                  onsubmit="return confirm('Supprimer le genre « {{ $genre->LibGenreFilm }} » ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="empty-message">Aucun genre de film enregistré.</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div style="margin-top: 25px;">
            <a href="{{ route('admin.dashboard') }}" style="color: #555; text-decoration: underline; font-size: 0.95em;">
                ← Retour au tableau de bord
            </a>
        </div>

    </div>
</main>

<footer>
    <p>© 2025 CineForAll - Tous droits réservés.</p>
</footer>

</body>
</html>
