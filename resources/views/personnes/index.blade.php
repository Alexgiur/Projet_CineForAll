<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Toutes les peronnes</title>
</head>
<body>

<h1>Toutes les personnes</h1>

<table class="tableper">
    <tr>
        <th>Prénom</th>
        <th>Nom</th>
        <th>Date de Naissance</th>
        <th>Nationalite</th>
        <th>Biographie</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
    @foreach($personnes as $personne)
        <tr>
            <td>{{ $personne->PrePer }}</td>
            <td>{{ $personne->NomPer }}</td>
            <td>{{ $personne->DateNaissancePer }}</td>
            <td> {{$personne->NationalitePer }}</td>
            <td>{{ $personne->BiographiePer }}</td>
            <td><a href="/personnes/{{ $personne->Idper }}/edit">Modifier</a></td>
            <td><form action="/personnes/{{ $personne->Idper }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form></td>
        </tr>
    @endforeach
</table>



</body>
</html>
