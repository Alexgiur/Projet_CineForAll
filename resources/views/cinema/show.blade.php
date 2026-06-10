@extends('Layouts.user')

@section('content')
    <div class="create-section" style="padding: 60px 20px; display: flex; justify-content: center; align-items: center;">
        <div class="table-container" style="max-width: 600px; width: 100%; text-align: center; padding: 40px;">
            <h1 style="color: var(--primary-color); font-family: 'Lilita One', sans-serif; font-size: 2.5em; margin-bottom: 30px;">Détails du Cinéma</h1>

            <div style="font-size: 1.2em; color: #444; margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 15px;">
                <strong style="color: #222;">Nom :</strong> {{ $cinema->NomCinema }}
            </div>

            <div style="font-size: 1.2em; color: #444; margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 15px;">
                <strong style="color: #222;">Adresse :</strong> {{ $cinema->AdresseCine }}
            </div>

            <div style="font-size: 1.2em; color: #444; margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 15px;">
                <strong style="color: #222;">Code Postal :</strong> {{ $cinema->CodPostCine }}
            </div>

            <div style="font-size: 1.2em; color: #444; margin-bottom: 40px;">
                <strong style="color: #222;">Ville :</strong> {{ $cinema->VilleCine }}
            </div>

            <div class="table-actions" style="margin-top: 20px; flex-wrap: wrap;">
                <!-- Route dynamique pour le RETOUR -->
                <a href="{{ route('cinemas.index') }}" class="btn-menu-uniforme" style="padding: 10px 20px; font-size: 1em; text-decoration: none; background-color: #6c757d;">Retour à la liste</a>

                @auth
                    @if(Auth::user()->IdTypeRoleUti == 1)
                        <!-- Route dynamique pour MODIFIER -->
                        <a href="{{ route('cinemas.edit', $cinema->IdCinema) }}" class="btn-menu-uniforme" style="padding: 10px 20px; font-size: 1em; text-decoration: none; background-color: var(--blue-btn);">Modifier</a>

                        <!-- Route dynamique pour SUPPRIMER -->
                        <form action="{{ route('cinemas.destroy', $cinema->IdCinema) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce cinéma ?');" style="margin: 0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-menu-uniforme" style="padding: 10px 20px; font-size: 1em; background-color: var(--red-btn);">Supprimer</button>
                        </form>
                    @endif
                @endauth
            </div>
        </div>
    </div>
@endsection
