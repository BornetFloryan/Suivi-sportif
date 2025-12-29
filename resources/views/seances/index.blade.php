<x-app-layout>
    <div class="max-w-4xl mx-auto py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Mes séances</h1>

            <a href="{{ route('seances.create') }}"
               class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Nouvelle séance
            </a>
        </div>

        <div class="bg-white shadow rounded-lg">
            <ul class="divide-y">
                @foreach ($seances as $seance)
                    <li class="p-4 flex justify-between items-center">
                        <div>
                            <div class="font-semibold">{{ $seance->title }}</div>
                            <div class="text-sm text-gray-500">{{ $seance->date }}</div>
                        </div>

                        <div class="flex gap-2">
                            <a href="{{ route('seances.edit', $seance->id) }}"
                               class="text-blue-600 hover:underline">
                                Modifier
                            </a>

                            <form method="POST"
                                  action="{{ route('seances.destroy', $seance->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-red-600 hover:underline">
                                    Supprimer
                                </button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
