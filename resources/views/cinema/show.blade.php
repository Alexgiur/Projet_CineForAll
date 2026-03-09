<strong>Adresse</strong>
<span>{{ $cinema->AdresseCine }}</span>

<strong>Code Postal</strong>
<span>{{ $cinema->CodPostCine }}</span>

<strong>Ville</strong>
<span>{{ $cinema->VilleCine }}</span>

<div class="action-buttons">
    <a href="/cinemas" class="btn-back">Retour</a>
    <a href="/cinemas/{{ $cinema->IdCinema }}/edit" class="btn-edit">Modifier</a>
</div>
