
<?php use App\Http\Controllers\FilmController; ?>


    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Un film</title>
</head>
<body>
<h1>Le film {{$film->IdFilm}}</h1>
<p>Title : {{$film->TitreFilm}}</p>
<p>Longueur :{{$film->LongueurFilm}}</p>
<p>Date de sortie :{{$film->DateSortieFilm}}</p>
<p>Résumé :{{$film->ResumeFilm}}</p>
<p>Langue film :{{$film->LangueFilm}}</p>
<p>3D ou pas :{{$film->TroisDOuNon}}</p>
<p>Affiche film :<img src="{{$film->AfficheFilm}}" width="100" height="150"></p>
<p>Genre :{{$film->IdGenreFilm}}</p>
</body>
</html>
