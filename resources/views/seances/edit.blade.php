<x-app-layout>
    <div class="max-w-xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Modifier la séance</h1>

        <div class="bg-white shadow rounded-lg p-6">
            <form method="POST" action="{{ route('seances.update', $seance->id) }}">
                @csrf
                @method('PATCH')

                {{-- Séance --}}
                <div class="mb-4">
                    <label class="block font-medium mb-1">Titre</label>
                    <input type="text"
                           name="title"
                           value="{{ old('title', $seance->title) }}"
                           class="w-full border rounded px-3 py-2"
                           required>
                </div>

                <div class="mb-4">
                    <label class="block font-medium mb-1">Date</label>
                    <input type="date"
                           name="date"
                           value="{{ old('date', $seance->date) }}"
                           class="w-full border rounded px-3 py-2"
                           required>
                </div>

                <div class="mb-6">
                    <label class="block font-medium mb-1">Note</label>
                    <textarea name="note"
                              class="w-full border rounded px-3 py-2">{{ old('note', $seance->note) }}</textarea>
                </div>

                <hr class="my-6">

                @php
                    $exercices = old('exercices', $seance->exercices->toArray());
                @endphp

                {{-- Titre --}}
                <h2 id="exercices-title"
                    class="text-lg font-semibold mb-3 {{ count($exercices) === 0 ? 'hidden' : '' }}">
                    Exercices
                </h2>

                {{-- Exercices --}}
                <div id="exercices-container"
                     class="{{ count($exercices) === 0 ? 'hidden' : '' }}">

                    @foreach($exercices as $i => $exercice)
                        <div class="exercise-block mb-4 border rounded p-3">
                            @if(isset($exercice['id']))
                                <input type="hidden"
                                       name="exercices[{{ $i }}][id]"
                                       value="{{ $exercice['id'] }}">
                            @endif

                            <input type="text"
                                   name="exercices[{{ $i }}][name]"
                                   value="{{ $exercice['name'] ?? '' }}"
                                   placeholder="Nom"
                                   class="w-full border rounded px-3 py-2 mb-2"
                                   required>

                            <input type="number"
                                   name="exercices[{{ $i }}][sets]"
                                   value="{{ $exercice['sets'] ?? '' }}"
                                   placeholder="Séries"
                                   class="w-full border rounded px-3 py-2 mb-2"
                                   required>

                            <input type="number"
                                   name="exercices[{{ $i }}][reps]"
                                   value="{{ $exercice['reps'] ?? '' }}"
                                   placeholder="Répétitions"
                                   class="w-full border rounded px-3 py-2 mb-2"
                                   required>

                            <input type="number"
                                   name="exercices[{{ $i }}][weight]"
                                   value="{{ $exercice['weight'] ?? '' }}"
                                   placeholder="Poids (kg)"
                                   class="w-full border rounded px-3 py-2 mb-2">

                            <button type="button"
                                    class="remove-exercise text-red-600 text-sm">
                                Supprimer l'exercice
                            </button>
                        </div>
                    @endforeach
                </div>

                {{-- Ajouter --}}
                <button type="button"
                        id="add-exercise"
                        class="mb-6 px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">
                    + Ajouter un exercice
                </button>

                {{-- Submit --}}
                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Modifier
                </button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const container = document.getElementById('exercices-container');
            const title = document.getElementById('exercices-title');
            const addBtn = document.getElementById('add-exercise');

            function showExercices() {
                container.classList.remove('hidden');
                title.classList.remove('hidden');
            }

            function hideExercicesIfEmpty() {
                if (container.children.length === 0) {
                    container.classList.add('hidden');
                    title.classList.add('hidden');
                }
            }

            function bindRemove(button) {
                button.addEventListener('click', e => {
                    e.target.closest('.exercise-block').remove();
                    hideExercicesIfEmpty();
                });
            }

            document.querySelectorAll('.remove-exercise').forEach(bindRemove);

            addBtn.addEventListener('click', () => {
                showExercices();

                const index = container.children.length;
                const block = document.createElement('div');
                block.className = 'exercise-block mb-4 border rounded p-3';

                block.innerHTML = `
            <input type="text" name="exercices[${index}][name]"
                placeholder="Nom"
                class="w-full border rounded px-3 py-2 mb-2" required>

            <input type="number" name="exercices[${index}][sets]"
                placeholder="Séries"
                class="w-full border rounded px-3 py-2 mb-2" required>

            <input type="number" name="exercices[${index}][reps]"
                placeholder="Répétitions"
                class="w-full border rounded px-3 py-2 mb-2" required>

            <input type="number" name="exercices[${index}][weight]"
                placeholder="Poids (kg)"
                class="w-full border rounded px-3 py-2 mb-2">

            <button type="button"
                class="remove-exercise text-red-600 text-sm">
                Supprimer l'exercice
            </button>
        `;

                container.appendChild(block);
                bindRemove(block.querySelector('.remove-exercise'));
            });
        });
    </script>
</x-app-layout>
