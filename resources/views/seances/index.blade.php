<x-app-layout>
    <h1>Mes séances</h1>

    <a href="{{ route('seances.create') }}">Nouvelle séance</a>

    <ul>
        @foreach ($seances as $seance)
            <li>
                {{ $seance->title }} - {{ $seance->date }}
            </li>
        @endforeach
    </ul>
</x-app-layout>
