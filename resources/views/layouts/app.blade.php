@inject('site', 'App\Services\SettingsService')
<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @php
        $siteName = $site->get('company_name');
        $pageTitle = trim($__env->yieldContent('title'));
        $fullTitle = $pageTitle !== '' ? $pageTitle.' — '.$siteName : $siteName.' — Plants de palmier à huile au Bénin';
        $description = trim($__env->yieldContent('meta_description'))
            ?: 'Elaeis Prestige : vente de plants de palmier à huile sélectionnés pour les agriculteurs et producteurs du Bénin. Commandez en ligne et faites-vous livrer.';
    @endphp

    <title>{{ $fullTitle }}</title>
    <meta name="description" content="{{ $description }}">
    <link rel="canonical" href="{{ url()->current() }}">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ $siteName }}">
    <meta property="og:title" content="{{ $fullTitle }}">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:locale" content="fr_FR">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>[x-cloak] { display: none !important; }</style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen flex-col bg-white font-sans text-gray-800 antialiased">

    <a href="#contenu" class="sr-only focus:not-sr-only focus:absolute focus:left-2 focus:top-2 focus:z-50 focus:rounded focus:bg-white focus:px-3 focus:py-2">
        Aller au contenu
    </a>

    <x-navbar />

    @if (session('status') || session('error'))
        <div class="mx-auto w-full max-w-7xl px-4 pt-4 sm:px-6 lg:px-8">
            @if (session('status'))
                <x-alert>{{ session('status') }}</x-alert>
            @endif
            @if (session('error'))
                <x-alert type="error">{{ session('error') }}</x-alert>
            @endif
        </div>
    @endif

    <main id="contenu" class="flex-1">
        @yield('content')
    </main>

    <x-footer />
    <x-whatsapp-button />

</body>
</html>