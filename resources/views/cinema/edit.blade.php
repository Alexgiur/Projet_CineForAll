<h1>Modifier le Cinema</h1>
<form action="/cinemas/{{ $cinema->IdCinema }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Adresse</label>
        <input type="text" name="adresse" value="{{ $cinema->AdresseCine }}" required>
    </div>
    <div class="form-group">
        <label>Code Postal</label>
        <input type="text" name="code postal" value="{{ $cinema->CodPostCine }}" required>
    </div>
    <div class="form-group">
        <label>Ville</label>
        <input type="text" name="ville" value="{{ $cinema->VilleCine }}" required>
    </div>
</div>
<button type="submit" class="btn-submit" style="background-color: var(--blue-btn);">Mettre à jour</button>
<a href="/cinemas" style="display:block; text-align:center; margin-top:15px; color:#777;">Annuler</a>
</form>
