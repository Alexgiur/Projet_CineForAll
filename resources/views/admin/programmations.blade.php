<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineForAll - Gestion Programmation</title>
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

            <h2 style="color: #991917; border-bottom: 2px solid #f4f4f4; padding-bottom: 10px;">
                {{-- Affiche le nom/login de l'utilisateur connecté --}}
                Utilisateur connecté -  {{ Auth::user()->LoginUti }}
            </h2>


            <li><a href="/">Accueil</a></li>
            <li><a href="{{ route('films.index') }}">Films</a></li>
            <li><a href="{{ route('admin.dashboard') }}" class="btn-menu-uniforme">Administration</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn-menu-uniforme">Déconnexion</button>
                </form>
            </li>
        </ul>
    </nav>
</header>

<main class="admin-dashboard" style="padding: 20px;">
    <h1 style="color: var(--primary-color); font-size: 2.5em; margin-bottom: 30px;">Gestion des Séances</h1>

    @if ($errors->any())
        <div style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
            <ul style="margin: 0;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <section style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 40px;">
        <h2 style="color: var(--primary-color); margin-bottom: 20px;">Programmer une nouvelle séance</h2>
        <form action="{{ route('admin.programmations.store') }}" method="POST" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; align-items: end;">
            @csrf
            <div>
                <label style="font-weight: bold;">Film :</label>
                <select name="IdFilm" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
                    <option value="">-- Sélectionner un film --</option>
                    @foreach($films as $film)
                        <option value="{{ $film->IdFilm }}">{{ $film->TitreFilm }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label style="font-weight: bold;">Salle :</label>
                {{--<select name="NumSalle" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
                    <option value="">-- Sélectionner une salle --</option>
                    @foreach($salles as $salle)
                        <option value="{{ $salle->NumSalle }}">Salle n°{{ $salle->NumSalle }} ({{ $salle->Capacite }} places)</option>
                    @endforeach
                </select>--}}
            </div>

            <div>
                <label style="font-weight: bold;">Date :</label>
                <input type="date" name="DateProg" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
            </div>

            <div>
                <label style="font-weight: bold;">Heure :</label>
                <input type="time" name="HeureProg" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
            </div>

            <button type="submit" class="btn-menu-uniforme" style="width: 100%; height: 42px;">Ajouter la séance</button>
        </form>
    </section>

    <section style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
        <table style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead>
            <tr style="background: #f8f9fa; border-bottom: 2px solid #eee;">
                <th style="padding: 15px;">Film</th>
                <th style="padding: 15px;">Salle</th>
                <th style="padding: 15px;">Date</th>
                <th style="padding: 15px;">Heure</th>
                <th style="padding: 15px;">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($programmations as $prog)
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 15px; font-weight: bold;">{{ $prog->film->TitreFilm ?? 'Inconnu' }}</td>
                    <td style="padding: 15px;">Salle n°{{ $prog->salle->NumSalle ?? 'N/A' }}</td>
                    <td style="padding: 15px;">{{ \Carbon\Carbon::parse($prog->DateProg)->format('d/m/Y') }}</td>
                    <td style="padding: 15px;">{{ $prog->HeureProg }}</td>
                    <td style="padding: 15px;">
                        <form action="{{ route('admin.programmations.destroy', $prog->IdProg) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" style="color: #dc3545; border: none; background: none; cursor: pointer; text-decoration: underline;">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
</main>
</body>
</html>
