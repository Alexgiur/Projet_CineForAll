<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Modifier une personne</title>
    <style>
        .error-message {
            color: red;
            font-size: 0.9em;
        }
        .error-input {
            border: 2px solid red;
        }
    </style>
</head>
<body>

<h1>Modifier une personne</h1>

<form action="{{ route('personnes.update', $personne) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text"
           id="prenom"
           name="prenom"
           placeholder="Prénom de la personne"
           value="{{ old('prenom', $personne->PrePer) }}"
           @error('prenom') class="error-input" @enderror>
    @error('prenom')
    <span class="error-message">{{ $message }}</span>
    @enderror
    <br><br>

    <input type="text"
           name="nom"
           placeholder="Nom de la personne"
           value="{{ old('nom', $personne->NomPer) }}"
           @error('nom') class="error-input" @enderror>
    @error('nom')
    <span class="error-message">{{ $message }}</span>
    @enderror
    <br><br>

    <input type="date"
           name="datedenaissance"
           value="{{ old('datedenaissance', $personne->DateNaissancePer) }}"
           @error('datedenaissance') class="error-input" @enderror>
    @error('datedenaissance')
    <span class="error-message">{{ $message }}</span>
    @enderror
    <br><br>

    <input type="text"
           name="nationalite"
           placeholder="Nationalité de la personne"
           value="{{ old('nationalite', $personne->NationalitePer) }}"
           @error('nationalite') class="error-input" @enderror>
    @error('nationalite')
    <span class="error-message">{{ $message }}</span>
    @enderror
    <br><br>

    <p>Biographie de la personne</p>
    <textarea name="biographie"
              @error('biographie') class="error-input" @enderror>{{ old('biographie', $personne->BiographiePer) }}</textarea>
    @error('biographie')
    <span class="error-message">{{ $message }}</span>
    @enderror
    <br><br>

    <button type="submit">Modifier</button>
    <a href="{{ route('personnes.show', $personne) }}">Annuler</a>
</form>

</body>
</html>
