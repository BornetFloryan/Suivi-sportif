<x-app-layout>
    <div class="max-w-xl mx-auto py-8 space-y-6">

        <h1 class="text-2xl font-bold">
            Modifier la séance
        </h1>

        <div class="bg-white shadow rounded-lg p-6">
            <form method="POST" action="{{ route('seances.update', $seance->id) }}" class="space-y-4">
                @csrf
                @method('PATCH')

                <div>
                    <label class="block font-medium mb-1">Titre</label>
                    <input type="text"
                           name="title"
                           value="{{ $seance->title }}"
                           class="w-full border rounded px-3 py-2"
                           required>
                </div>

                <div>
                    <label class="block font-medium mb-1">Date</label>
                    <input type="date"
                           name="date"
                           value="{{ $seance->date }}"
                           class="w-full border rounded px-3 py-2"
                           required>
                </div>

                <div>
                    <label class="block font-medium mb-1">Note</label>
                    <textarea name="note"
                              class="w-full border rounded px-3 py-2"
                              rows="3">{{ $seance->note }}</textarea>
                </div>

                <div class="flex gap-3">
                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Enregistrer
                    </button>

                    <a href="{{ route('seances.show', $seance->id) }}"
                       class="px-4 py-2 border rounded hover:bg-gray-50">
                        Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
