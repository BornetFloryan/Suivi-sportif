<x-app-layout>
    <div class="max-w-xl mx-auto py-8 space-y-6">

        <h1 class="text-2xl font-bold">
            Modifier l’exercice
        </h1>

        <div class="bg-white shadow rounded-lg p-6">
            <form method="POST"
                  action="{{ route('exercices.update', $exercice->id) }}"
                  class="space-y-4">
                @csrf
                @method('PATCH')

                <div>
                    <label class="block font-medium mb-1">Nom de l’exercice</label>
                    <input type="text"
                           name="name"
                           value="{{ $exercice->name }}"
                           class="w-full border rounded px-3 py-2"
                           required>
                </div>

                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <label class="block font-medium mb-1">Séries</label>
                        <input type="number"
                               name="sets"
                               value="{{ $exercice->sets }}"
                               class="w-full border rounded px-3 py-2"
                               required>
                    </div>

                    <div>
                        <label class="block font-medium mb-1">Répétitions</label>
                        <input type="number"
                               name="reps"
                               value="{{ $exercice->reps }}"
                               class="w-full border rounded px-3 py-2"
                               required>
                    </div>

                    <div>
                        <label class="block font-medium mb-1">Poids (kg)</label>
                        <input type="number"
                               name="weight"
                               value="{{ $exercice->weight }}"
                               class="w-full border rounded px-3 py-2">
                    </div>
                </div>

                <div class="flex gap-3">
                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Enregistrer
                    </button>

                    <a href="{{ route('exercices.index') }}"
                       class="px-4 py-2 border rounded hover:bg-gray-50">
                        Annuler
                    </a>
                </div>
            </form>
        </div>

    </div>
</x-app-layout>
