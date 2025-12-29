<x-app-layout>
    <div class="max-w-xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Créer une séance</h1>

        <div class="bg-white shadow rounded-lg p-6">
            <form method="POST" action="{{ route('seances.store') }}">
                @csrf

                <div class="mb-4">
                    <label class="block font-medium mb-1" for="title">Titre</label>
                    <input type="text" name="title"
                           class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-4">
                    <label class="block font-medium mb-1" for="date">Date</label>
                    <input type="date" name="date"
                           class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-4">
                    <label class="block font-medium mb-1" for="note">Note</label>
                    <textarea name="note"
                              class="w-full border rounded px-3 py-2"></textarea>
                </div>

                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Créer
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
