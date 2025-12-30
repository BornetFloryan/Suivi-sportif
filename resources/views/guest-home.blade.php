<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Suivi Sportif</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-50 text-gray-900">
<header class="border-b bg-white">
    <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-4">
        <a href="/" class="flex items-center gap-3">
            <span class="grid h-10 w-10 place-items-center rounded-xl bg-gray-900 text-white font-bold">SS</span>
            <div class="leading-tight">
                <div class="font-semibold">Suivi Sportif</div>
                <div class="text-xs text-gray-500">Suivi simple de tes séances</div>
            </div>
        </a>

        <nav class="flex items-center gap-2">
            <a href="{{ route('login') }}"
               class="rounded-xl px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100">
                Se connecter
            </a>
            <a href="{{ route('register') }}"
               class="rounded-xl bg-gray-900 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-800">
                S’inscrire
            </a>
        </nav>
    </div>
</header>

<main>
    <section class="mx-auto max-w-6xl px-4 py-12">
        <div class="grid items-center gap-10 md:grid-cols-2">
            <div>

                <h1 class="mt-4 text-4xl font-bold tracking-tight md:text-5xl">
                    Gère tes séances.<br class="hidden md:block">
                    Suis tes progrès.
                </h1>

                <p class="mt-4 text-base text-gray-600 md:text-lg">
                    Crée, consulte, modifie et supprime tes séances d’entraînement.
                    Tout est sécurisé par utilisateur, avec une interface claire.
                </p>

                <div class="mt-6 flex items-center gap-4">
                    <a href="{{ route('register') }}"
                       class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition
              hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Commencer gratuitement
                    </a>

                    <a href="{{ route('login') }}"
                       class="text-sm font-medium text-gray-600 hover:text-gray-900">
                        J’ai déjà un compte →
                    </a>
                </div>


                <div class="mt-8 grid grid-cols-3 gap-3 max-w-xl">
                    <div class="rounded-2xl border border-gray-200 bg-white p-4">
                        <div class="text-xs text-gray-500">Fonction</div>
                        <div class="mt-1 font-semibold">CRUD</div>
                    </div>
                    <div class="rounded-2xl border border-gray-200 bg-white p-4">
                        <div class="text-xs text-gray-500">Accès</div>
                        <div class="mt-1 font-semibold">Sécurisé</div>
                    </div>
                    <div class="rounded-2xl border border-gray-200 bg-white p-4">
                        <div class="text-xs text-gray-500">Style</div>
                        <div class="mt-1 font-semibold">Simple</div>
                    </div>
                </div>
            </div>

            <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-sm font-semibold">Aperçu</div>
                        <div class="text-xs text-gray-500">Exemples de séances</div>
                    </div>
                    <span class="rounded-full bg-green-50 px-3 py-1 text-xs font-semibold text-green-700">
                        Actif
                    </span>
                </div>

                @php
                    $demo = [
                        ['title' => 'Haut du corps', 'meta' => '45 min • Force', 'day' => 'Lun'],
                        ['title' => 'Cardio', 'meta' => '30 min • Endurance', 'day' => 'Mer'],
                        ['title' => 'Jambes', 'meta' => '50 min • Force', 'day' => 'Ven'],
                    ];
                @endphp

                <div class="mt-5 space-y-3">
                    @foreach($demo as $s)
                        <div class="flex items-center justify-between rounded-2xl border border-gray-200 bg-gray-50 p-4">
                            <div>
                                <div class="font-semibold">{{ $s['title'] }}</div>
                                <div class="text-sm text-gray-600">{{ $s['meta'] }}</div>
                            </div>
                            <span class="rounded-full border border-gray-200 bg-white px-3 py-1 text-xs text-gray-600">
                                {{ $s['day'] }}
                            </span>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6 rounded-2xl border border-gray-200 bg-white p-4">
                    <div class="text-sm font-semibold">Pourquoi c’est utile ?</div>
                    <p class="mt-1 text-sm text-gray-600">
                        Tu gardes un historique clair de tes entraînements, et tu peux ajuster tes séances au fil du temps.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-6xl px-4 pb-14">
        <div class="grid gap-4 md:grid-cols-3">
            <div class="rounded-2xl border border-gray-200 bg-white p-6">
                <h3 class="font-semibold"> CRUD des séances</h3>
                <p class="mt-2 text-sm text-gray-600">Crée, modifie, supprime et consulte tes séances.</p>
            </div>
            <div class="rounded-2xl border border-gray-200 bg-white p-6">
                <h3 class="font-semibold"> Par utilisateur</h3>
                <p class="mt-2 text-sm text-gray-600">Chaque utilisateur ne voit que ses données.</p>
            </div>
            <div class="rounded-2xl border border-gray-200 bg-white p-6">
                <h3 class="font-semibold"> Simple & cohérent</h3>
                <p class="mt-2 text-sm text-gray-600">Une interface propre, sans surcharge.</p>
            </div>
        </div>

        <div class="mt-10 flex flex-wrap items-center justify-between gap-4 rounded-3xl border border-gray-200 bg-white p-6">
            <div>
                <div class="text-lg font-bold">Prêt à commencer ?</div>
                <div class="text-sm text-gray-600">Crée un compte et ajoute ta première séance.</div>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('register') }}"
                   class="rounded-xl bg-gray-900 px-5 py-3 text-sm font-semibold text-white hover:bg-gray-800">
                    S’inscrire
                </a>
                <a href="{{ route('login') }}"
                   class="rounded-xl border border-gray-200 bg-white px-5 py-3 text-sm font-semibold hover:bg-gray-50">
                    Se connecter
                </a>
            </div>
        </div>
    </section>
</main>

<footer class="border-t bg-white">
    <div class="mx-auto max-w-6xl px-4 py-6 text-sm text-gray-500">
        © {{ date('Y') }} Suivi Sportif
    </div>
</footer>
</body>
</html>
