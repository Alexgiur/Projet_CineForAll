@extends('layout')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Css/style.css">
    <title>Tous les films</title>
</head>
<body>
<h1>Tous les Films</h1>
<table class="table table-striped">
    <tr>
        <th>Title</th>
        <th>Longueur</th>
        <th>Date de sortie</th>
        <th>Résumé</th>
        <th>Langue film</th>
        <th>3D ou pas</th>
        <th>Affiche film</th>
        <th>Genre</th>
    </tr>
@foreach($films as $f)
    <tr>
        <td>{{$f->TitreFilm}}</td>
        <td>{{$f->LongueurFilm}}</td>
        <td>{{$f->DateSortieFilm}}</td>
        <td>{{$f->ResumeFilm}}</td>
        <td>{{$f->LangueFilm}}</td>
        <td>{{$f->TroisDOuNon}}</td>
        <td><img src="{{$f->AfficheFilm}}" width="100" height="150"></td>
        <td>{{$f->IdGenreFilm}}</td>
    </tr>
@endforeach
</body>
</html>
