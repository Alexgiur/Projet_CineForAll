<h1>Mettre à jour un film {{ $film-> IdFilm }}</h1>

<form action="/films/{{ $film->IdFilm }}" method="POST">
    @csrf
    @method('PATCH')

    <input @error('titre') style="border-color: red" @enderror type="text" name="titre" placeholder="Titre" value="{{ old('titre', $film->TitreFilm) }}"><br>
    @error('titre')
    <p style="color: red">{{ $message }}</p>
    @enderror
    <br><br>

    <input type="number" name="longueur" placeholder="Durée du film" value="{{ old('longueur', $film->LongueurFilm) }}">
    @error('longueur')
    <p style="color: red">{{ $message }}</p>
    @enderror
    <br><br>

    <input type="date" name="datedesortie" placeholder="Date de sortie" value="{{ old('datedesortie', $film->DateSortieFilm) }}">
    @error('datedesortie')
    <p style="color: red">{{ $message }}</p>
    @enderror
    <br><br>

    <textarea placeholder="Résumé" @error('resume') style="border-color: red" @enderror name="resume">{{ old('resume', $film->ResumeFilm) }}</textarea><br>
    @error('resume')
    <p style="color: red">{{ $message }}</p>
    @enderror
    <br><br>

    <input type="text" name="langue" placeholder="Langue" value="{{ old('langue', $film->LangueFilm) }}">
    @error('langue')
    <p style="color: red">{{ $message }}</p>
    @enderror
    <br><br>

    <input type="checkbox" name="troisD" value="1" {{ old('troisD', $film->TroisDOuNon) ? 'checked' : '' }}> 3D ?
    @error('troisD')
    <p style="color: red">{{ $message }}</p>
    @enderror
    <br><br>

    <input type="text" name="affiche" placeholder="Affiche (URL)" value="{{ old('affiche', $film->AfficheFilm) }}">
    @error('affiche')
    <p style="color: red">{{ $message }}</p>
    @enderror
    <br><br>

    <input type="number" name="genre" placeholder="Genre (ID)" value="{{ old('genre', $film->IdGenreFilm) }}">
    @error('genre')
    <p style="color: red">{{ $message }}</p>
    @enderror
    <br><br>

    <button name="btnUpdate" type="submit">Mettre à jour</button>
</form>
