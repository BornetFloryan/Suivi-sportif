<x-app-layout>
    <div class="max-w-4xl mx-auto py-8">

        <div class="bg-white shadow rounded-lg p-6">

            <h1 class="text-2xl font-bold">
                {{ $seance->title }}
            </h1>

            <div class="text-sm text-gray-500 mt-1 mb-4">
                {{ $seance->date }}
            </div>

            @if($seance->note)
                <p class="text-gray-700 mb-6">
                    {{ $seance->note }}
                </p>
            @endif

            <hr class="my-6">

            <h2 class="text-xl font-semibold mb-4">Exercices</h2>

            @if($seance->exercices->count() > 0)
                <div class="space-y-3">
                    @foreach($seance->exercices as $exercice)
                        <div class="flex justify-between items-center border p-3 rounded">
                            <div>
                                <strong>{{ $exercice->name }}</strong><br>
                                Séries: {{ $exercice->sets }}, 
                                Répétitions: {{ $exercice->reps }}, 
                                Poids: {{ $exercice->weight }} kg
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500">Aucun exercice ajouté pour cette séance.</p>
            @endif

        </div>

    </div>
</x-app-layout>
