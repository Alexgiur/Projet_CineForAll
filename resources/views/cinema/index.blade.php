<table>
    <thead>
        <tr>
            <th>Adresse</th>
            <th>Code Postale</th>
            <th>ville</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($cinema as $cinema)
            <tr>
                <td>{{ $cinema->AdresseCine }}</td>
                <td>{{ $cinema->CodPostCine }}</td>
                <td>{{ $cinema->VilleCine }}</td>
                <td>
                    <a href="/cinemas/{{$cinema->IdCinema}}">Voir</a>
                    @auth
                        @if(Auth::user()->IdTypeRoleUti == 1)
                            <a href="/cinemas/{{ $cinema->IdCinema }}/edit" class="btn-edit">Modifier</a>
                            <form action="/cinemas/{{ $cinema->IdCinema }}" method="POST" onsubmit="return confirm('Supprimer ?');">
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
