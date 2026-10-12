@inject('site', 'App\Services\SettingsService')
<!DOCTYPE html>
<html lang="fr" class="h-full bg-neutral-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Administration') — {{ $site->get('company_name') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>[x-cloak] { display: none !important; }</style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full font-sans text-gray-800 antialiased">
    <div class="flex min-h-screen">
        {{-- Sidebar admin --}}
        <x-admin-sidebar />

        {{-- Contenu principal avec barre supérieure --}}
        <div class="flex flex-1 flex-col overflow-hidden">
            <x-admin-navbar />

            {{-- Alertes de session --}}
            @if (session('status') || session('error'))
                <div class="px-6 pt-4">
                    @if (session('status'))
                        <x-alert>{{ session('status') }}</x-alert>
                    @endif
                    @if (session('error'))
                        <x-alert type="error">{{ session('error') }}</x-alert>
                    @endif
                </div>
            @endif

            <main class="flex-1 overflow-y-auto p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
