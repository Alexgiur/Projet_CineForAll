@extends('Layouts.admin')

@section('content')
    <div class="create-section">
        <div class="form-container">
            <h1>Créer un Cinéma</h1>

            <!-- La route d'enregistrement était déjà bonne (cinemas.store) -->
            <form action="{{ route('cinemas.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="NomCinema">Nom</label>
                    <input type="text" id="NomCinema" name="NomCinema" placeholder="Saisir le nom" required>
                </div>

                <div class="form-group">
                    <label for="AdresseCine">Adresse</label>
                    <input type="text" id="AdresseCine" name="AdresseCine" placeholder="Saisir l'adresse" required>
                </div>

                <div class="form-group">
                    <label for="CodPostCine">Code Postal</label>
                    <input type="text" id="CodPostCine" name="CodPostCine" placeholder="Saisir le code postal" required>
                </div>

                <div class="form-group">
                    <label for="VilleCine">Ville</label>
                    <input type="text" id="VilleCine" name="VilleCine" placeholder="Saisir la ville" required>
                </div>

                <button type="submit" class="btn-submit">Créer le cinéma</button>

                <!-- Route dynamique pour ANNULER -->
                <a href="{{ route('cinemas.index') }}" style="display:block; text-align:center; margin-top:15px; color:#777; text-decoration:none;">Annuler</a>
            </form>
        </div>
    </div>
@endsection
