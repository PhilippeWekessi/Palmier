<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen items-center justify-center bg-neutral-100 px-4">
    <div class="card max-w-lg p-10 text-center">
        <h1 class="mb-2 text-2xl font-bold text-primary-dark">🌴 Elaeis Prestige</h1>
        <p class="mb-6 text-gray-600">Phase 3 : authentification et rôles en place.</p>

        @auth
            <p class="mb-4 text-sm text-gray-600">
                Connecté : <strong>{{ auth()->user()->name }}</strong> ({{ auth()->user()->role }})
            </p>
            <div class="flex flex-col gap-3">
                <a href="{{ route('account') }}" class="btn-primary">Mon compte</a>
                @if (auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="btn-gold">Administration</a>
                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-outline w-full">Se déconnecter</button>
                </form>
            </div>
        @else
            <div class="flex flex-col gap-3 sm:flex-row sm:justify-center">
                <a href="{{ route('login') }}" class="btn-primary">Connexion</a>
                <a href="{{ route('register') }}" class="btn-outline">Inscription</a>
            </div>
        @endauth

        <p class="mt-6 text-xs text-gray-400">La vraie page d'accueil sera construite en Phase 5.</p>
    </div>
</body>
</html>