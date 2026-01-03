<x-app-layout>
    <div class="max-w-xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Créer une séance</h1>

        <div class="bg-white shadow rounded-lg p-6">
            <form method="POST" action="{{ route('seances.store') }}">
                @csrf

                {{-- Séance --}}
                <div class="mb-4">
                    <label class="block font-medium mb-1">Titre</label>
                    <input type="text" name="title"
                           class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-4">
                    <label class="block font-medium mb-1">Date</label>
                    <input type="date" name="date"
                           class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-6">
                    <label class="block font-medium mb-1">Note</label>
                    <textarea name="note"
                              class="w-full border rounded px-3 py-2"></textarea>
                </div>

                <hr class="my-6">

                {{-- Exercices --}}
                <h2 class="text-lg font-semibold mb-3">Exercices</h2>

                <div id="exercices-container"></div>

                <button type="button"
                        onclick="addExercice()"
                        class="mb-6 px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">
                    + Ajouter un exercice
                </button>

                {{-- Bouton créer --}}
                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Créer
                </button>
            </form>
        </div>
    </div>

    <script>
        let index = 0;

        function addExercice() {
            const container = document.getElementById('exercices-container');

            const div = document.createElement('div');
            div.className = 'mb-4 border rounded p-3';

            div.innerHTML = `
                <div class="mb-2">
                    <input type="text" name="exercices[${index}][name]"
                           placeholder="Nom de l'exercice"
                           class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-2">
                    <input type="number" name="exercices[${index}][sets]"
                           placeholder="Séries"
                           class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-2">
                    <input type="number" name="exercices[${index}][reps]"
                           placeholder="Répétitions"
                           class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-2">
                    <input type="number" name="exercices[${index}][weight]"
                           placeholder="Poids (kg)"
                           class="w-full border rounded px-3 py-2">
                </div>

                <button type="button"
                        onclick="this.parentElement.remove()"
                        class="text-red-600 text-sm">
                    Supprimer l'exercice
                </button>
            `;

            container.appendChild(div);
            index++;
        }
    </script>
</x-app-layout>
