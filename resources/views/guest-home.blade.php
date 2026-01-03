<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Suivi Sportif</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-100 text-gray-900">

<header class="bg-white border-b">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <a href="/" class="font-semibold text-lg">
            Suivi Sportif
        </a>

        <div class="flex gap-2">
            <a href="{{ route('login') }}"
               class="px-4 py-2 text-sm rounded-lg hover:bg-gray-100">
                Connexion
            </a>
            <a href="{{ route('register') }}"
               class="px-4 py-2 text-sm rounded-lg bg-gray-900 text-white hover:bg-gray-800">
                Inscription
            </a>
        </div>
    </div>
</header>

<main class="max-w-7xl mx-auto px-6 py-10 space-y-12">

    <section class="max-w-3xl">
        <h1 class="text-3xl font-bold">
            Application de suivi sportif
        </h1>

        <p class="mt-4 text-gray-600">
            Cette application permet aux utilisateurs de gérer leurs séances
            d’entraînement et les exercices associés.
            L’ensemble des fonctionnalités est accessible uniquement après connexion.
        </p>

        <div class="mt-6 flex gap-3">
            <a href="{{ route('register') }}"
               class="px-5 py-3 rounded-lg bg-blue-600 text-white text-sm font-semibold hover:bg-blue-700">
                Créer un compte
            </a>

            <a href="{{ route('login') }}"
               class="px-5 py-3 rounded-lg border text-sm font-semibold hover:bg-gray-50">
                Se connecter
            </a>
        </div>
    </section>

    <section>
        <h2 class="text-xl font-semibold mb-4">
            Exemple de séances
        </h2>

        <p class="text-sm text-gray-500 mb-4">
            Aperçu fictif de séances et d’exercices visibles après connexion.
        </p>

        @php
            $demoSeances = [
                [
                    'title' => 'Séance jambes',
                    'date' => '2025-03-12',
                    'note' => 'Travail de force',
                    'exercices' => ['Squats', 'Fentes', 'Presse']
                ],
                [
                    'title' => 'Cardio',
                    'date' => '2025-03-14',
                    'note' => 'Endurance',
                    'exercices' => ['Course 30 min']
                ],
                [
                    'title' => 'Haut du corps',
                    'date' => '2025-03-16',
                    'note' => 'Renforcement',
                    'exercices' => ['Développé couché', 'Tirage']
                ],
            ];
        @endphp

        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
            @foreach($demoSeances as $seance)
                <div class="bg-white border rounded-lg p-5 shadow-sm">
                    <div class="font-semibold">
                        {{ $seance['title'] }}
                    </div>

                    <div class="text-sm text-gray-500 mt-1">
                        {{ $seance['date'] }} – {{ $seance['note'] }}
                    </div>

                    <ul class="mt-3 text-sm text-gray-600 list-disc list-inside">
                        @foreach($seance['exercices'] as $exercice)
                            <li>{{ $exercice }}</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </section>

    <section>
        <h2 class="text-xl font-semibold mb-4">
            Fonctionnalités principales
        </h2>

        <div class="grid gap-4 md:grid-cols-3">
            <div class="bg-white border rounded-lg p-5">
                <div class="font-semibold">Gestion des séances</div>
                <p class="text-sm text-gray-600 mt-2">
                    Créer, modifier, consulter et supprimer des séances.
                </p>
            </div>

            <div class="bg-white border rounded-lg p-5">
                <div class="font-semibold">Gestion des exercices</div>
                <p class="text-sm text-gray-600 mt-2">
                    Ajouter des exercices avec séries, répétitions et poids.
                </p>
            </div>

            <div class="bg-white border rounded-lg p-5">
                <div class="font-semibold">Historique personnel</div>
                <p class="text-sm text-gray-600 mt-2">
                    Consulter l’ensemble de ses séances passées.
                </p>
            </div>
        </div>
    </section>

    <section class="border-t pt-8">
        <div class="max-w-3xl">
            <h2 class="text-xl font-semibold">
                Accéder à l’application
            </h2>

            <p class="mt-3 text-gray-600">
                L’inscription permet d’accéder à toutes les fonctionnalités
                de gestion des séances et des exercices.
            </p>

            <div class="mt-5 flex gap-3">
                <a href="{{ route('register') }}"
                   class="px-5 py-3 rounded-lg bg-gray-900 text-white text-sm font-semibold hover:bg-gray-800">
                    Créer un compte
                </a>

                <a href="{{ route('login') }}"
                   class="px-5 py-3 rounded-lg border text-sm font-semibold hover:bg-gray-50">
                    Se connecter
                </a>
            </div>
        </div>
    </section>

</main>

</body>
</html>
