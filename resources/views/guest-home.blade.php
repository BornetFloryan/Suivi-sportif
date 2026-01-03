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
        <a href="/" class="font-semibold text-lg hover:underline">
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
    <h2 class="text-sm text-gray-500 uppercase tracking-wide">
        Page publique
    </h2>

    <section class="max-w-3xl">
        <h1 class="text-3xl font-bold">
            Application de suivi des séances d’entraînement
        </h1>

        <p class="mt-4 text-gray-600">
            Cette application permet de gérer simplement ses séances de sport.
            L’accès aux fonctionnalités est réservé aux utilisateurs connectés.
            Cette page présente un aperçu de l’application avant inscription.
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
            Aperçu fictif de séances visibles après connexion.
        </p>

        @php
            $demoSeances = [
                [
                    'title' => 'Séance jambes',
                    'date' => '2025-03-12',
                    'note' => 'Squats, fentes et presse.'
                ],
                [
                    'title' => 'Cardio',
                    'date' => '2025-03-14',
                    'note' => 'Course à pied 30 minutes.'
                ],
                [
                    'title' => 'Haut du corps',
                    'date' => '2025-03-16',
                    'note' => 'Développé couché et tirage.'
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
                        {{ $seance['date'] }}
                    </div>

                    <p class="text-sm text-gray-600 mt-3">
                        {{ $seance['note'] }}
                    </p>
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
                    Création, modification et suppression de séances.
                </p>
            </div>

            <div class="bg-white border rounded-lg p-5">
                <div class="font-semibold">Données sécurisées</div>
                <p class="text-sm text-gray-600 mt-2">
                    Chaque utilisateur accède uniquement à ses propres données.
                </p>
            </div>

            <div class="bg-white border rounded-lg p-5">
                <div class="font-semibold">Interface simple</div>
                <p class="text-sm text-gray-600 mt-2">
                    Navigation claire et design cohérent.
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
                Pour créer et gérer vos propres séances, vous devez disposer d’un compte.
                Une fois connecté, vous accédez à l’ensemble des fonctionnalités.
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
