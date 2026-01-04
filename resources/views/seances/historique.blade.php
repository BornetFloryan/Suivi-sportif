<x-app-layout>
    <div class="max-w-4xl mx-auto py-8">

        <h1 class="text-2xl font-bold mb-6">
            Historique de mes séances
        </h1>

        <div class="bg-white shadow rounded-lg p-4 mb-6">
            <form method="GET" class="flex flex-wrap gap-3">

                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Rechercher par titre"
                       class="border rounded px-3 py-2 text-sm flex-1">

                <input type="date"
                       name="date"
                       value="{{ request('date') }}"
                       class="border rounded px-3 py-2 text-sm">

                <select name="order"
                        class="border rounded px-3 py-2 text-sm">
                    <option value="desc" {{ request('order') === 'desc' ? 'selected' : '' }}>
                        Plus récentes
                    </option>
                    <option value="asc" {{ request('order') === 'asc' ? 'selected' : '' }}>
                        Plus anciennes
                    </option>
                </select>

                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm">
                    Filtrer
                </button>

            </form>
        </div>

        @if($seances->isEmpty())
            <div class="bg-white shadow rounded-lg p-6 text-gray-600">
                Aucune séance enregistrée pour le moment.
            </div>
        @else
            <div class="bg-white shadow rounded-lg">
                <ul class="divide-y">
                    @foreach ($seances as $seance)
                        <li class="p-4 flex justify-between items-center">
                            <div>
                                <div class="font-semibold">
                                    {{ $seance->title }}
                                </div>

                                <div class="text-sm text-gray-500">
                                    {{ $seance->date }}
                                </div>

                                @if($seance->note)
                                    <div class="text-sm text-gray-600 mt-1">
                                        {{ $seance->note }}
                                    </div>
                                @endif
                            </div>

                            <a href="{{ route('seances.show', $seance->id) }}"
                               class="text-blue-600 hover:underline">
                                Voir le détail
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>
</x-app-layout>
