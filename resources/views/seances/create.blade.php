<x-app-layout>
    <h1>Créer une séance</h1>

    <form method="POST" action="{{ route('seances.store') }}">
        @csrf

        <div>
            <label for="title">Titre</label>
            <input type="text" name="title">
        </div>

        <div>
            <label for="date">Date</label>
            <input type="date" name="date">
        </div>

        <div>
            <label for="note">Note</label>
            <textarea name="note"></textarea>
        </div>

        <button type="submit">Créer</button>
    </form>
</x-app-layout>
