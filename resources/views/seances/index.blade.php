<x-app-layout>
    <h1>Mes séances</h1>

    <a href="{{ route('seances.create') }}">Nouvelle séance</a>

    <ul>
        @foreach ($seances as $seance)
            <li>
                {{ $seance->title }} - {{ $seance->date }}

                <a href="{{ route('seances.edit', $seance->id) }}">Modifier</a>

                <form method="POST" action="{{ route('seances.destroy', $seance->id) }}" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>

</x-app-layout>
