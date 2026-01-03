<x-app-layout>
    <div class="max-w-xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Modifier la séance</h1>

        <div class="bg-white shadow rounded-lg p-6">
            <form method="POST" action="{{ route('seances.update', $seance->id) }}">
                @csrf
                @method('PATCH')

                {{-- Séance --}}
                <div class="mb-4">
                    <label for="title" class="block font-medium mb-1">Titre</label>
                    <input type="text" name="title" id="title"
                           value="{{ $seance->title }}"
                           class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-4">
                    <label for="date" class="block font-medium mb-1">Date</label>
                    <input type="date" name="date" id="date"
                           value="{{ $seance->date }}"
                           class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-4">
                    <label for="note" class="block font-medium mb-1">Note</label>
                    <textarea name="note" id="note"
                              class="w-full border rounded px-3 py-2">{{ $seance->note }}</textarea>
                </div>

                <hr class="my-6">

                {{-- Exercices --}}
                <h2 class="text-lg font-semibold mb-3">Exercices</h2>

                <div id="exercices-container">
                    @foreach($seance->exercices as $i => $exercice)
                        <div class="mb-4 border rounded p-3">
                            <input type="hidden" name="exercices[{{ $i }}][id]" value="{{ $exercice->id }}">
                            <div class="mb-2">
                                <input type="text" name="exercices[{{ $i }}][name]"
                                    value="{{ $exercice->name }}"
                                    placeholder="Nom de l'exercice"
                                    class="w-full border rounded px-3 py-2">
                            </div>
                            <div class="mb-2">
                                <input type="number" name="exercices[{{ $i }}][sets]"
                                    value="{{ $exercice->sets }}"
                                    placeholder="Séries"
                                    class="w-full border rounded px-3 py-2">
                            </div>
                            <div class="mb-2">
                                <input type="number" name="exercices[{{ $i }}][reps]"
                                    value="{{ $exercice->reps }}"
                                    placeholder="Répétitions"
                                    class="w-full border rounded px-3 py-2">
                            </div>
                            <div class="mb-2">
                                <input type="number" name="exercices[{{ $i }}][weight]"
                                    value="{{ $exercice->weight }}"
                                    placeholder="Poids (kg)"
                                    class="w-full border rounded px-3 py-2">
                            </div>

                            <button type="button"
                                    onclick="this.parentElement.remove()"
                                    class="text-red-600 text-sm">
                                Supprimer l'exercice
                            </button>
                        </div>
                    @endforeach
                </div>

                {{-- Bouton ajouter exercice --}}
                <button type="button"
                        onclick="addExercice()"
                        class="mb-6 px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">
                    + Ajouter un exercice
                </button>

                {{-- Bouton modifier séance --}}
                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Modifier
                </button>
            </form>
        </div>
    </div>

    <script>
        let index = {{ $seance->exercices->count() }};

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
