@inject('site', 'App\Services\SettingsService')
@php
    $links = [
        ['route' => 'home', 'label' => 'Accueil', 'active' => 'home'],
        ['route' => 'products.index', 'label' => 'Nos plants', 'active' => 'products.*'],
        ['route' => 'about', 'label' => 'À propos', 'active' => 'about'],
        ['route' => 'posts.index', 'label' => 'Conseils', 'active' => 'posts.*'],
        ['route' => 'contact', 'label' => 'Contact', 'active' => 'contact'],
    ];

    $user = auth()->user();
    $accountUrl = $user ? ($user->isAdmin() ? route('admin.dashboard') : route('account')) : route('login');
    $accountLabel = $user ? 'Mon compte' : 'Connexion';
    $iconBtn = 'inline-flex h-11 w-11 items-center justify-center rounded-lg text-gray-600 transition hover:bg-neutral-100 hover:text-primary';
@endphp

<header x-data="{ open: false, search: false }"
        @keydown.escape.window="open = false; search = false"
        class="sticky top-0 z-40 border-b border-neutral-100 bg-white/95 backdrop-blur">

    <div class="mx-auto flex h-16 max-w-7xl items-center justify-between gap-4 px-4 sm:px-6 lg:px-8">

        {{-- Logo --}}
        <a href="{{ route('home') }}" class="flex items-center gap-2 text-lg font-bold text-primary-dark">
            <span aria-hidden="true">🌴</span>
            <span>{{ $site->get('company_name') }}</span>
        </a>

        {{-- Navigation desktop --}}
        <nav class="hidden items-center gap-1 lg:flex" aria-label="Navigation principale">
            @foreach ($links as $link)
                <a href="{{ route($link['route']) }}" @class([
                    'rounded-lg px-3 py-2 text-sm font-medium transition',
                    'bg-primary/5 text-primary' => request()->routeIs($link['active']),
                    'text-gray-600 hover:bg-neutral-100 hover:text-primary' => ! request()->routeIs($link['active']),
                ])>{{ $link['label'] }}</a>
            @endforeach
        </nav>

        {{-- Actions --}}
        <div class="flex items-center gap-1 sm:gap-2">

            {{-- Rechercher (desktop) --}}
            <button type="button" class="{{ $iconBtn }} hidden lg:inline-flex" aria-label="Rechercher"
                    @click="search = !search; $nextTick(() => $refs.q && $refs.q.focus())">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg>
            </button>

            {{-- Panier --}}
            <a href="{{ route('cart.index') }}" class="{{ $iconBtn }}" aria-label="Panier">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"/></svg>
            </a>

            {{-- Compte (desktop) --}}
            <a href="{{ $accountUrl }}" class="{{ $iconBtn }} hidden lg:inline-flex" aria-label="{{ $accountLabel }}" title="{{ $accountLabel }}">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
            </a>

            <a href="{{ route('products.index') }}" class="btn-gold hidden px-5 py-2 lg:inline-flex">Commander</a>

            {{-- Menu hamburger (mobile / tablette) --}}
            <button type="button" class="{{ $iconBtn }} lg:hidden" aria-label="Ouvrir le menu"
                    :aria-expanded="open.toString()" @click="open = !open">
                <svg x-show="!open" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/></svg>
                <svg x-show="open" x-cloak class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </div>

    {{-- Barre de recherche (desktop) --}}
    <div x-show="search" x-cloak x-transition class="hidden border-t border-neutral-100 bg-white lg:block">
        <form action="{{ route('products.index') }}" method="GET" class="mx-auto flex max-w-7xl gap-2 px-8 py-3">
            <input x-ref="q" type="search" name="q" placeholder="Rechercher un plant (variété, âge…)"
                   class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:border-primary-light focus:outline-none focus:ring-2 focus:ring-primary-light/30">
            <button type="submit" class="btn-primary">Rechercher</button>
        </form>
    </div>

    {{-- Menu mobile --}}
    <div x-show="open" x-cloak x-transition class="border-t border-neutral-100 bg-white lg:hidden">
        <div class="space-y-1 px-4 py-4">

            <form action="{{ route('products.index') }}" method="GET" class="mb-3 flex gap-2">
                <input type="search" name="q" placeholder="Rechercher un plant…"
                       class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-base focus:border-primary-light focus:outline-none focus:ring-2 focus:ring-primary-light/30">
                <button type="submit" class="btn-primary px-4" aria-label="Rechercher">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg>
                </button>
            </form>

            @foreach ($links as $link)
                <a href="{{ route($link['route']) }}" @class([
                    'block rounded-lg px-3 py-3 text-base font-medium',
                    'bg-primary/5 text-primary' => request()->routeIs($link['active']),
                    'text-gray-700 hover:bg-neutral-100' => ! request()->routeIs($link['active']),
                ])>{{ $link['label'] }}</a>
            @endforeach

            <div class="my-2 border-t border-neutral-100"></div>

            <a href="{{ $accountUrl }}" class="block rounded-lg px-3 py-3 text-base font-medium text-gray-700 hover:bg-neutral-100">{{ $accountLabel }}</a>

            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full rounded-lg px-3 py-3 text-left text-base font-medium text-gray-700 hover:bg-neutral-100">Se déconnecter</button>
                </form>
            @else
                <a href="{{ route('register') }}" class="block rounded-lg px-3 py-3 text-base font-medium text-gray-700 hover:bg-neutral-100">Créer un compte</a>
            @endauth

            <a href="{{ route('products.index') }}" class="btn-gold mt-3 w-full py-3">Commander</a>
        </div>
    </div>
</header>