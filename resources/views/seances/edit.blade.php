<x-app-layout>
    <div class="max-w-xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Modifier la séance</h1>

        <div class="bg-white shadow rounded-lg p-6">
            <form method="POST" action="{{ route('seances.update', $seance->id) }}">
                @csrf
                @method('PATCH')

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

                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Modifier
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
