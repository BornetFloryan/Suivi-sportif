<x-app-layout>
    <div class="max-w-4xl mx-auto py-8">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Mes exercices</h1>

            <a href="{{ route('exercices.create') }}"
               class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Nouvel exercice
            </a>
        </div>

        @if($exercices->isEmpty())
            <div class="bg-white shadow rounded-lg p-6 text-gray-600">
                Aucun exercice enregistré.
            </div>
        @else
            <div class="bg-white shadow rounded-lg">
                <ul class="divide-y">
                    @foreach ($exercices as $exercice)
                        <li class="p-4 flex justify-between items-center">
                            <div>
                                <div class="font-semibold">
                                    {{ $exercice->name }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ $exercice->sets }} × {{ $exercice->reps }}
                                    @if($exercice->weight)
                                        – {{ $exercice->weight }} kg
                                    @endif
                                    <span class="mx-1">•</span>
                                    {{ $exercice->seance->title }}
                                </div>
                            </div>

                            <div class="flex gap-2">
                                <a href="{{ route('exercices.edit', $exercice->id) }}"
                                   class="text-blue-600 hover:underline">
                                    Modifier
                                </a>

                                <form method="POST"
                                      action="{{ route('exercices.destroy', $exercice->id) }}">
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
        @endif

    </div>
</x-app-layout>
