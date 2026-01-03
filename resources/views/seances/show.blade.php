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

            <div class="text-sm text-gray-500">
                Les exercices associés à cette séance seront affichés ici.
            </div>

        </div>

    </div>
</x-app-layout>
