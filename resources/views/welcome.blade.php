<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} — Installation Phase 1</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-neutral-100 min-h-screen flex items-center justify-center">
    <div class="card p-10 max-w-lg text-center">
        <h1 class="text-2xl font-bold text-primary-dark mb-2">🌴 Elaeis Prestige</h1>
        <p class="text-gray-600 mb-6">
            Phase 1 terminee : Laravel, Tailwind et la connexion MySQL sont configures.
        </p>
        <p class="text-sm text-gray-400">
            La page d'accueil definitive sera construite en Phase 5.
        </p>
        <a href="#" class="btn-primary mt-6 inline-block">Exemple de bouton (Tailwind actif)</a>
    </div>
</body>
</html>
