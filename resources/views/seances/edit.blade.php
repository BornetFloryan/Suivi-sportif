<x-app-layout>
    <h1>Modifier la séance</h1>

    <form method="POST" action="{{ route('seances.update', $seance->id) }}">
        @csrf
        @method('PATCH')

        <div>
            <label for="title">Titre</label>
            <input type="text" name="title" value="{{ $seance->title }}">
        </div>

        <div>
            <label for="date">Date</label>
            <input type="date" name="date" value="{{ $seance->date }}">
        </div>

        <div>
            <label for="name">Note</label>
            <textarea name="note">{{ $seance->note }}</textarea>
        </div>

        <button type="submit">Modifier</button>
    </form>
</x-app-layout>
