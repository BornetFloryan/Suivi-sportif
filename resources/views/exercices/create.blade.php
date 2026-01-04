<x-app-layout>
    <div class="max-w-xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Créer un exercice</h1>

        <div class="bg-white shadow rounded-lg p-6">
            <form method="POST" action="{{ route('exercices.store') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block font-medium mb-1">Nom</label>
                    <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="grid grid-cols-3 gap-4">
                    <input type="number" name="sets" placeholder="Séries" class="border rounded px-3 py-2" required>
                    <input type="number" name="reps" placeholder="Répétitions" class="border rounded px-3 py-2" required>
                    <input type="number" name="weight" placeholder="Poids (kg)" class="border rounded px-3 py-2">
                </div>

                <div>
                    <label class="block font-medium mb-1">Séance</label>
                    <select name="seance_id" class="w-full border rounded px-3 py-2" required>
                        <option value="">— Choisir une séance —</option>
                        @foreach($seances as $seance)
                            <option value="{{ $seance->id }}">
                                {{ $seance->title }} ({{ $seance->date }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Créer
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
