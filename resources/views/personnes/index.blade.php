@extends('Layouts.admin')

@section('title', 'CineForAll - Liste des Personnes')

@section('content')
    <style>
        .search-container { margin-bottom: 20px; display: flex; gap: 10px; }
        .search-input { padding: 10px; border-radius: 5px; border: 1px solid #ccc; flex-grow: 1; }
        .custom-pagination { display: flex; gap: 5px; margin-top: 20px; justify-content: center; }
        .page-link { padding: 8px 12px; background: #eee; text-decoration: none; color: black; border-radius: 4px; }
        .page-link.active { background: var(--primary-color, #ff0000); color: white; }
    </style>

    <div class="admin-dashboard">
        <h1>Gestion des Personnes</h1>

        <div class="admin-toolbar" style="display: flex; justify-content: space-between; align-items: center;">
            <form action="{{ route('personnes.index') }}" method="GET" class="search-container" style="flex-grow: 1; margin-right: 20px;">
                <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Rechercher par nom ou prénom..." class="search-input">
                <button type="submit" class="btn-edit" style="background-color: var(--primary-color);">Rechercher</button>
                @if($search)
                    <a href="{{ route('personnes.index') }}" class="btn-edit" style="background-color: #6c757d; text-decoration: none; display: flex; align-items: center;">Réinitialiser</a>
                @endif
            </form>

            @auth
                @if(Auth::user()->IdTypeRoleUti == 1)
                    <a href="{{ route('personnes.create') }}" class="btn-edit" style="background-color: var(--green-btn); white-space: nowrap;">+ Ajouter une personne</a>
                @endif
            @endauth
        </div>

        <table class="admin-table">
            <thead>
            <tr>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Nationalité</th>
                <th>Role</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($personnes as $personne)
                <tr>
                    <td>{{ $personne->PrePer }}</td>
                    <td>{{ $personne->NomPer }}</td>
                    <td>{{ $personne->NationalitePer }}</td>
                    <td>
                        @if($personne->roles->isNotEmpty())
                            {{ $personne->roles->pluck('LibRolePer')->join(', ') }}
                        @else
                            <span style="color: #aaa; font-style: italic;">Non renseigné</span>
                        @endif
                    </td>
                    <td style="display: flex; gap: 10px; justify-content: center;">
                        <a href="{{ route('personnes.show', $personne->Idper) }}" class="details-link" style="margin:0;">Voir</a>
                        @auth
                            @if(Auth::user()->IdTypeRoleUti == 1)
                                <a href="{{ route('personnes.edit', $personne->Idper) }}" class="btn-edit">Modifier</a>
                                <form action="{{ route('personnes.destroy', $personne->Idper) }}" method="POST" onsubmit="return confirm('Supprimer ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete-action">Supprimer</button>
                                </form>
                            @endif
                        @endauth
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        @if($totalPages > 1)
            <div class="custom-pagination">
                @if($currentPage > 1)
                    <a href="?page={{ $currentPage - 1 }}&search={{ $search }}" class="page-link">Précédent</a>
                @endif

                @for($i = 1; $i <= $totalPages; $i++)
                    <a href="?page={{ $i }}&search={{ $search }}" class="page-link {{ $i == $currentPage ? 'active' : '' }}">
                        {{ $i }}
                    </a>
                @endfor

                @if($currentPage < $totalPages)
                    <a href="?page={{ $currentPage + 1 }}&search={{ $search }}" class="page-link">Suivant</a>
                @endif
            </div>
        @endif
    </div>
@endsection
