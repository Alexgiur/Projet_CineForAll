@extends('Layouts.admin')

@section('title', 'Détails de ' . $personne->PrePer)

@section('content')
    <div class="show-section">
        <div class="film-details-card" style="flex-direction: column; padding: 40px;">
            <h1 class="film-title-hero">{{ $personne->PrePer }} {{ $personne->NomPer }}</h1>

            <div class="film-meta-grid">
                <div class="meta-item">
                    <strong>Nationalité</strong>
                    <span>{{ $personne->NationalitePer ?? 'Non renseignée' }}</span>
                </div>
                <div class="meta-item">
                    <strong>Né(e) le</strong>
                    <span>{{ $personne->DateNaissancePer ?? 'Inconnue' }}</span>
                </div>
                <div class="meta-item">
                    <strong>Rôle</strong>
                    <span>
            @if($personne->roles->isNotEmpty())
                            {{ $personne->roles->pluck('LibRolePer')->join(', ') }}
                        @else
                            <em style="color: #aaa;">Non renseigné</em>
                        @endif
                </span>
                </div>
            </div>

            <div class="synopsis-section">
                <h3>Biographie</h3>
                <p class="synopsis-content">{{ $personne->BiographiePer ?? 'Aucune biographie.' }}</p>
            </div>

            <div class="action-buttons">
                <a href="{{ route('personnes.index') }}" class="btn-back">Retour</a>
                <a href="{{ route('personnes.edit', $personne->Idper) }}" class="btn-edit">Modifier</a>
            </div>
        </div>
    </div>
@endsection
