<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Créer un film</title>
</head>
<body>
<h1>Créer un film</h1>
<form action="/films" method="POST">
    @csrf
    <input @error('titre') style="border-color: red" @enderror type="text" name="titre" placeholder="Titre" value="{{ old('titre') }}"><br>
    @error('titre')
    <p style="color: red">{{ $message }}</p>
    @enderror
    <br><br>

    <input type="number" name="longueur" placeholder="Durée du film" value="{{ old('longueur') }}">
    @error('longueur')
    <p style="color: red">{{ $message }}</p>
    @enderror
    <br><br>

    <input type="date" name="datedesortie" placeholder="Date de sortie" value="{{ old('datedesortie') }}">
    @error('datedesortie')
    <p style="color: red">{{ $message }}</p>
    @enderror
    <br><br>

    <textarea placeholder="Résumé" @error('resume') style="border-color: red" @enderror name="resume">{{ old('resume') }}</textarea><br>
    @error('resume')
    <p style="color: red">{{ $message }}</p>
    @enderror
    <br><br>

    <input type="text" name="langue" placeholder="Langue" value="{{ old('langue') }}">
    @error('langue')
    <p style="color: red">{{ $message }}</p>
    @enderror
    <br><br>

    <input type="checkbox" name="troisD" value="1" {{ old('troisD') ? 'checked' : '' }}> 3D ?
    @error('troisD')
    <p style="color: red">{{ $message }}</p>
    @enderror
    <br><br>

    <input type="text" name="affiche" placeholder="Affiche (URL)" value="{{ old('affiche') }}">
    @error('affiche')
    <p style="color: red">{{ $message }}</p>
    @enderror
    <br><br>

    <input type="number" name="genre" placeholder="Genre (ID)" value="{{ old('genre') }}">
    @error('genre')
    <p style="color: red">{{ $message }}</p>
    @enderror
    <br><br>

    <button name="btnCreate" type="submit">Créer</button>
</form>
</body>
</html>
