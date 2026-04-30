@extends('Layouts.admin')

@section('title', 'CineForAll - Ajouter un genre')

@section('content')
    <style>
        .genre-form-container {
            max-width: 500px;
            margin: 60px auto;
            padding: 40px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .genre-form-container h1 {
            color: var(--primary-color);
            font-size: 2em;
            margin-bottom: 30px;
        }
        .form-group { margin-bottom: 20px; }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }
        .form-group input {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1em;
            box-sizing: border-box;
        }
        .form-group input:focus {
            outline: none;
            border-color: var(--primary-color, #e50914);
        }
        .error-message {
            color: #c0392b;
            font-size: 0.85em;
            margin-top: 5px;
        }
        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
        }
    </style>

    <div class="genre-form-container">
        <h1>Ajouter un genre</h1>

        <!-- La route est déjà dynamique -->
        <form method="POST" action="{{ route('genre_film.store') }}">
            @csrf
            <div class="form-group">
                <label for="LibGenreFilm">Libellé du genre</label>
                <input type="text" id="LibGenreFilm" name="LibGenreFilm"
                       value="{{ old('LibGenreFilm') }}" placeholder="Ex : Action, Comédie...">
                @error('LibGenreFilm')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-actions">
                <a href="{{ route('genre_film.index') }}" style="color: #555; text-decoration: underline;">
                    ← Annuler
                </a>
                <button type="submit" class="btn-menu-uniforme">Enregistrer</button>
            </div>
        </form>
    </div>
@endsection
