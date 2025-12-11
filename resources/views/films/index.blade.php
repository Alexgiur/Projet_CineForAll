<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Tous les Films</h1>
@foreach($films as $f)
    <p>Titre {{$f->TitreFilm}}</p>
    <p>Longueur du film :{{$f->LongueurFilm}}</p>
    <p>Date de sortie :{{$f->DateSortieFilm}}</p>
    <p>Resumé du film :{{$f->ResumeFilm}}</p>
    <p>Langue du film :{{$f->LangueFilm}}</p>
    <p>3D :{{$f->TroisDOuNon}}</p>
    <p>Affiche :<img src="{{$f-> AfficheFilm }}"></p>
    <p>Genre :{{$f->IdGenreFilm}}</p>
@endforeach
</body>
</html>
