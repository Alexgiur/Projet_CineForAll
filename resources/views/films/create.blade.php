@extends('Layouts.admin')

@section('title', 'CineForAll - Ajouter un film')

@section('content')
    <div class="create-section">
        <div class="form-container">
            <h1>Ajouter un Film</h1>

            <!-- La route est déjà correcte -->
            <form action="{{ route('films.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="titre">Titre du film</label>
                    <input type="text" id="titre" name="titre" placeholder="Ex: Avatar 2" value="{{ old('titre') }}"
                           @error('titre') style="border-color: var(--primary-color);" @enderror>
                    @error('titre')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="longueur">Durée (en minutes)</label>
                    <input type="number" id="longueur" name="longueur" placeholder="Ex: 120" value="{{ old('longueur') }}">
                    @error('longueur')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="datedesortie">Date de sortie</label>
                    <input type="date" id="datedesortie" name="datedesortie" value="{{ old('datedesortie') }}">
                    @error('datedesortie')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="resume">Synopsis</label>
                    <textarea id="resume" name="resume" placeholder="Résumé du film..."
                              @error('resume') style="border-color: var(--primary-color);" @enderror>{{ old('resume') }}</textarea>
                    @error('resume')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="langue">Langue originale</label>
                    <input type="text" id="langue" name="langue" placeholder="Ex: Anglais" value="{{ old('langue') }}">
                    @error('langue')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="affiche">Affiche du film</label>
                    <input type="file" id="affiche" name="affiche" accept="image/*">
                    @error('affiche')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="genre">Identifiant du Genre</label>
                    <select id="genre" name="genre">
                        <option value="">--Veuillez choisir une option--</option>
                        @foreach($genres as $genre)
                            <option value="{{ $genre->IdGenreFilm }}" {{ old('genre') == $genre->IdGenreFilm ? 'selected' : '' }}>{{ $genre->LibGenreFilm }}</option>
                        @endforeach
                    </select>
                    @error('genre')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group checkbox-group">
                    <input type="checkbox" id="troisD" name="troisD" value="1" {{ old('troisD') ? 'checked' : '' }}>
                    <label for="troisD" style="margin-bottom: 0; font-weight: normal;">Ce film est disponible en 3D</label>
                </div>
                @error('troisD')
                <span class="error-message">{{ $message }}</span>
                @enderror

                <button name="btnCreate" type="submit" class="btn-submit">Créer le film</button>
                <a href="{{ route('films.index') }}" style="display:block; text-align:center; margin-top:15px; color:#777; text-decoration:none;">Annuler</a>
            </form>
        </div>
    </div>
@endsection
