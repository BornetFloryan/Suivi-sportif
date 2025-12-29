<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Suivi Sportif</title>
    @vite(['resources/css/app.css'])
</head>
<body class="font-sans antialiased bg-gray-100">

<div class="min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-md rounded-lg p-10 text-center w-full max-w-md">
        <h1 class="text-3xl font-bold mb-4">Suivi Sportif</h1>

        <p class="text-gray-600 mb-6">
            Application de gestion et de suivi de vos séances d'entraînement.
        </p>

        <div class="flex justify-center gap-4">
            <a href="{{ route('login') }}"
               class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Connexion
            </a>

            <a href="{{ route('register') }}"
               class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">
                Inscription
            </a>
        </div>
    </div>
</div>

</body>
</html>
