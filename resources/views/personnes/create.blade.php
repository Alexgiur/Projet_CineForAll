@extends('Layouts.admin')

@section('title', 'CineForAll - Ajouter une Personne')

@section('content')
    <div class="create-section">
        <div class="form-container">
            <h1>Nouvelle Personne</h1>

            @if ($errors->any())
                <div style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('personnes.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Prénom</label>
                    <input type="text" name="prenom" value="{{ old('prenom') }}" required>
                </div>
                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" name="nom" value="{{ old('nom') }}" required>
                </div>
                <div class="form-group">
                    <label>Date de Naissance</label>
                    <input type="date" name="datedenaissance" value="{{ old('datedenaissance') }}" required
                           style="width:100%; padding:12px; border:1px solid #ccc; border-radius:5px;">
                </div>
                <div class="form-group">
                    <label>Nationalité</label>
                    <input type="text" name="nationalite" value="{{ old('nationalite') }}" required>
                </div>
                <div class="form-group">
                    <label>Biographie</label>
                    <textarea name="biographie" required placeholder="Minimum 5 caractères...">{{ old('biographie') }}</textarea>
                </div>
                <div class="form-group">
                    <label>Rôles</label>
                    @foreach($roles as $role)
                        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
                            <input
                                type="checkbox"
                                name="roles[]"
                                id="role_{{ $role->IdRoleper }}"
                                value="{{ $role->IdRoleper }}"
                                {{ in_array($role->IdRoleper, old('roles', [])) ? 'checked' : '' }}
                            >
                            <label for="role_{{ $role->IdRoleper }}" style="margin-bottom: 0; font-weight: normal;">
                                {{ $role->LibRolePer }}
                            </label>
                        </div>
                    @endforeach
                    @error('roles')
                    <p style="color: #c0392b; font-size: 0.85em; margin-top: 5px;">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn-submit">Enregistrer la personne</button>
                <a href="{{ route('personnes.index') }}" style="display:block; text-align:center; margin-top:15px; color:#777;">Retour à la liste</a>
            </form>
        </div>
    </div>
@endsection
